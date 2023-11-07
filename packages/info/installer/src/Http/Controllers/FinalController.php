<?php

namespace Info\Installer\Http\Controllers;

use Artisan;
use AppController;

class FinalController extends AppController
{
    /**
     * Complete the installation
     *
     * @return \Illuminate\View\View
     */
    public function finish()
    {
        changeEnvironmentVariable('APP_DEBUG', false);
        changeEnvironmentVariable('APP_INSTALL', 'true');

        // Change key in .env
        Artisan::call('key:generate');
        Artisan::call('config:clear');
        Artisan::call('view:clear');

        return view('vendor.installer.finish');
    }
}
