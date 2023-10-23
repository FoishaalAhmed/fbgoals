<?php

if (!function_exists('uploadImage')) {

    /**
     * upload Image file
     *
     * @param string $file [original source]
     * @param string $location [file path where to upload]
     * @param string $size [optional - for resizing the main file]
     * @param string $old [optional - delete the old file(pass only name with extension)]
     * @param string $thumb [optional - thumb size (70*70) ]
     *
     * @return Array
     */
    function uploadImage($file, $location, $name, $size = null, $old = null)
    {
        $response = [
            'status' => true,
            'message' => __('File uploaded successfully.')
        ];

        $path = makeDirectory($location);

        if (!$path) {
            $response = [
                'status' => false,
                'message' => __('Directory could not been created.'),
            ];
        }

        if (!empty($old)) {
            removeFile($old);
        }

        try {

                $filename = $name . '_' . time() . '.' . strtolower($file->extension());
                $file->move($location, $filename);
                $response['file_name'] = $filename;
        } catch (\Exception $e) {
            $response = [
                'status' => false,
                'message' => $e->getMessage()
            ];
        }
        return $response;
    }
}

if (!function_exists('makeDirectory')) {
    /**
     * making directory
     *
     * @param string $path
     * @param int $permission
     *
     * @return bool
     */
    function makeDirectory($path, $permission = null)
    {
        if (file_exists($path)) {
            return true;
        }

        $permission = !empty($permission) ? $permission : config('file_permission', 0755);
        return mkdir($path, $permission, true);
    }
}

if (!function_exists('removeFile')) {
    /**
     * making directory
     *
     * @param string $path
     *
     * @return bool
     */
    function removeFile($path)
    {
        return file_exists($path) && is_file($path) ? @unlink($path) : false;
    }
}

if (!function_exists('settings')) {

    /**
     * Get settings values
     *
     * @param string $field [return specific value, if don't match provide type values]
     *
     * @return string
     * @return array
     */
    function settings($field = null)
    {
        $setting = new \App\Models\Setting();

        if (is_null($field)) {
            return $setting->all()->pluck('value', 'name')->toArray();
        }

        $settings = $setting->all()->pluck('value', 'name')->toArray();

        if (array_key_exists($field, $settings)) {
            $result = $settings[$field];
        } else {
            $result = $setting->all()->where('type', $field)->pluck('value', 'name')->toArray();
        }

        return $result;
    }
}

if (!function_exists('darkLogo')) {

    /**
     * Get system dark logo
     *
     * @return string
     */

    function darkLogo()
    {
        return !empty(settings('dark_logo')) && file_exists(settings('dark_logo')) ? settings('dark_logo') : 'public/images/dummy/logo-light.png';
    }
}

if (!function_exists('lightLogo')) {

    /**
     * Get system light logo
     *
     * @return string
     */

    function lightLogo()
    {
        return !empty(settings('light_logo')) && file_exists(settings('light_logo')) ? settings('light_logo') : 'public/images/dummy/logo-light.png';
    }
}

if (!function_exists('smallLogo')) {

    /**
     * Get system small logo
     *
     * @return string
     */
    function smallLogo()
    {
        return !empty(settings('small_logo')) && file_exists(settings('small_logo')) ? settings('small_logo') : 'public/images/dummy/logo-sm.png';
    }
}

if (!function_exists('getFavIcon')) {

    /**
     * Get system favicon
     *
     * @return string
     */
    function getFavIcon()
    {
        return !empty(settings('favicon')) && file_exists(settings('favicon')) ? settings('favicon') : 'public/images/dummy/logo-sm.png';
    }
}