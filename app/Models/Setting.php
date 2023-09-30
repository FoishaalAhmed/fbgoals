<?php

namespace App\Models;

use DB, Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'value', 'type'
    ];

    public static $validateRule = [
        'name' => ['required', 'string', 'max:190'],
        'email' => ['nullable', 'email', 'string', 'max:190'],
        'phone' => ['nullable', 'string', 'max:190'],
        'address' => ['nullable', 'string', 'max:190'],
        'large_logo' => ['nullable', 'mimes:jpeg,jpg,png,gif,webp', 'max:2000'],
        'small_logo' => ['nullable', 'mimes:jpeg,jpg,png,gif,webp', 'max:2000'],
        'favicon' => ['nullable', 'mimes:jpeg,jpg,png,gif,webp', 'max:2000'],
    ];

    public function storeSetting(Object $request)
    {
        try {
            DB::beginTransaction();

            $largeLogoOld = Setting::where(['name' => 'large_logo', 'type' => 'General'])->first()->value;
            $largeLogo = $request->file('large_logo');

            if ($largeLogo) {
                $response = uploadImage($largeLogo, 'public/images/settings/', 'large_logo', $largeLogoOld);

                if (!$response['status']) {
                    DB::rollBack();
                    return [
                        'alert' => 'error',
                        'message' => $response['message']
                    ];
                }

                Setting::where(['name' => 'large_logo', 'type' => 'General'])->update(['value' => 'public/images/settings/' . $response['file_name']]);
            }

            $smallLogoOld = Setting::where(['name' => 'small_logo', 'type' => 'General'])->first()->value;
            $smallLogo = $request->file('small_logo');

            if ($smallLogo) {
                $response = uploadImage($smallLogo, 'public/images/settings/', 'small_logo', '22*22', $smallLogoOld);
                if (!$response['status']) {
                    DB::rollBack();
                    return [
                        'alert' => 'error',
                        'message' => $response['message']
                    ];
                }

                Setting::where(['name' => 'small_logo', 'type' => 'General'])->update(['value' => 'public/images/settings/' . $response['file_name']]);
            }

            $favIconOld = Setting::where(['name' => 'favicon', 'type' => 'General'])->first()->value;
            $favIcon = $request->file('favicon');

            if ($favIcon) {
                $response = uploadImage($favIcon, 'public/images/settings/', 'favicon', '22*22', $favIconOld);
                if (!$response['status']) {
                    DB::rollBack();
                    return [
                        'alert' => 'error',
                        'message' => $response['message']
                    ];
                }

                Setting::where(['name' => 'favicon', 'type' => 'General'])->update(['value' => 'public/images/settings/' . $response['file_name']]);
            }

            Setting::where(['name' => 'name', 'type' => 'General'])->update(['value' => $request->name]);
            Setting::where(['name' => 'email', 'type' => 'General'])->update(['value' => $request->email]);
            Setting::where(['name' => 'phone', 'type' => 'General'])->update(['value' => $request->phone]);
            Setting::where(['name' => 'address', 'type' => 'General'])->update(['value' => $request->address]);

            DB::commit();

            return [
                'alert' => 'success',
                'message' => __('Setting Updated Successfully.')
            ];
        } catch (Exception $e) {
            DB::rollBack();
            return [
                'alert' => 'error',
                'message' => $e->getMessage()
            ];
        }
    }
}
