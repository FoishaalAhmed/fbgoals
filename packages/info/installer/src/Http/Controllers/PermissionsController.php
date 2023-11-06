<?php

namespace Info\Installer\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Info\Installer\Helpers\PermissionsChecker;
use Info\Installer\Helpers\RequirementsChecker;
use Info\Installer\Interfaces\PurchaseInterface;

class PermissionsController extends PermissionsChecker
{

    /**
     * @var PermissionsChecker
     * @var RequirementsChecker
     */
    protected $permissions, $requirements;

    /**
     * @param PermissionsChecker $checker && @param RequirementsChecker $requirementsChecker
     */
    public function __construct(PermissionsChecker $checker, RequirementsChecker $requirementsChecker)
    {
        $this->permissions  = $checker;
        $this->requirements = $requirementsChecker;
    }

    /**
     * Display the permissions check page.
     *
     * @return \Illuminate\View\View
     */
    public function checkPermissions()
    {
        $phpSupportInfo = $this->requirements->checkPHPversion(config('installer.core.minimumPhpVersion'));
        $requirements   = $this->requirements->check(config('installer.requirements'));
        $permissions    = $this->permissions->checkPermission(config('installer.permissions'));

        if (!isset($requirements['errors']) && $phpSupportInfo['supported']) {
            return view('vendor.installer.permissions', compact('permissions'));
        } else {
            return redirect('install/requirements');
        }
    }

    /**
     * Display the purchase code verification page.
     *
     * @return \Illuminate\View\View
     */
    public function verifyPurchaseCode(Request $request, PurchaseInterface $purchaseChecker)
    {
        $this->isInstalled();

        if (!$request->isMethod('POST')) {
            return view('vendor.installer.purchase-code', ['old' => $request->old]);
        }

        $validator = Validator::make($request->all(), [
            'envato_purchase_code' => 'required',
            'envato_username' => 'required'
        ]);
        $validator->setAttributeNames([
            'envato_purchase_code' => 'Purchase code',
            'envato_username' => 'Envato Username'
        ]);

        if ($validator->fails()) {
            return view('vendor.installer.purchase-code', ['errors' => $validator->errors()]);
        }

        $domainName = str_replace(
            ['https://www.', 'http://www.', 'https://', 'http://', 'www.'],
            '',
            request()->getHttpHost()
        );
        $domainIp = request()->ip();

        $purchaseData = $purchaseChecker->getPurchaseStatus($domainName, $domainIp, $request->envato_purchase_code, $request->envato_username);

        if ($purchaseData->status) {
            changeEnvironmentVariable(base64_decode('SU5TVEFMTF9BUFBfU0VDUkVU'), $purchaseData->data);
            return redirect()->route('installers.database.create');
        } else {
            return view('vendor.installer.purchase-code', ['responseError' => $purchaseData->data]);
        }
    }

    public function isInstalled()
    {
        if (base64_decode('SU5TVEFMTF9BUFBfU0VDUkVU') && env('APP_INSTALL')) {
            return view('vendor.installer.purchase-code', ['responseError' => 'App is already installed']);
        }
    }

    public function clearCache(Request $request)
    {
        if ($request->cache == env(base64_decode('SU5TVEFMTF9BUFBfU0VDUkVU'))) {
            changeEnvironmentVariable(base64_decode('SU5TVEFMTF9BUFBfU0VDUkVU'), 'clear');
            Cache::forget('a_s_k');
            return true;
        }
        return false;
    }
}
