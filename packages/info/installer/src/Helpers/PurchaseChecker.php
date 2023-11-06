<?php
namespace Info\Installer\Helpers;

use Info\Installer\Interfaces\PurchaseInterface;
use Info\Installer\Interfaces\CurlRequestInterface;
class PurchaseChecker implements PurchaseInterface {

	protected $curlRequest;

    public function __construct(CurlRequestInterface $curlRequest) {
        $this->curlRequest = $curlRequest;
    }

	public function getPurchaseStatus($domainName, $domainIp, $envatoPurchaseCode, $envatoUsername)
    {
    	$data = array(
            'domain_name'        => $domainName,
            'domain_ip'          => $domainIp,
            'envatopurchasecode' => $envatoPurchaseCode,
            'envatoUsername'     => $envatoUsername,
            'item_id'            => config('installer.item_id') ?? ''
        );

        return $this->curlRequest->send($data);

    }
}
