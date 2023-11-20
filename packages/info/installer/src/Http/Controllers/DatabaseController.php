<?php

namespace Info\Installer\Http\Controllers;

use Illuminate\Http\Request;
use AppController, Artisan, Exception;
use Info\Installer\Repositories\EnvironmentRepository;

class DatabaseController extends AppController
{
    /**
     * Show form.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data = [
            'host'     => env('DB_HOST'),
            'port'     => env('DB_PORT'),
            'database' => env('DB_DATABASE'),
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD')
        ];

        return view('vendor.installer.database', $data);
    }

    /**
     * Manage form submission.
     *
     * @param  Illuminate\Http\Request                               $request
     * @param  Infoamin\Installer\Repositories\EnvironmentRepository $environmentRepository
     * @return redirection
     */
    public function store(Request $request, EnvironmentRepository $environmentRepository)
    {
        // Set config for migrations and seeds
        $connection = config('database.default');
        config([
            'database.connections.' . $connection . '.host'     => $request->host,
			'database.connections.' . $connection . '.port'     => $request->port,
            'database.connections.' . $connection . '.database' => $request->dbname,
            'database.connections.' . $connection . '.password' => $request->password,
            'database.connections.' . $connection . '.username' => $request->username,
        ]);

        // Update .env file
        $environmentRepository->SetDatabaseSetting($request);

        return redirect()->route('installers.database.seed');
    }

    public function seedMigrate()
    {
        // Migrations and seeds
        try {
            ini_set('max_execution_time', 300);
            \DB::statement('SET FOREIGN_KEY_CHECKS=0;');

            Artisan::call('migrate');
            Artisan::call('db:seed');

            \DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        } catch (Exception $e) {

            dd();

            return view('vendor.installer.database-error', ['error' => $e->getMessage()]);
        }

        if (config('installer.administrator')) {
            return redirect()->route('installers.user.create');
        }

        return redirect('install/finish');
    }
}
