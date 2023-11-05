<?php

namespace Info\Installer;

use Illuminate\Routing\Router;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Info\Installer\Http\Middleware\CheckInstalled;


class InstallerServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'Info\Installer\Interfaces\PurchaseInterface',
            'Info\Installer\Helpers\PurchaseChecker'
        );

        $this->app->bind(
            'Info\Installer\Interfaces\CurlRequestInterface',
            'Info\Installer\Http\Requests\CurlRequest'
        );
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // Get namespace
        $nameSpace = $this->app->getNamespace();

        $router = $this->app->make(Router::class);
        $router->aliasMiddleware('installed', CheckInstalled::class);

        // Set namespace aliases for Controllers
        AliasLoader::getInstance()->alias('AppController', $nameSpace . 'Http\Controllers\Controller');

        // Routes
        require __DIR__ . '/Http/routes/web.php';

        // Views
        $this->publishes([__DIR__ . '/../views' => resource_path('views/vendor/installer'),], 'installer');

        // Configuration
        $this->publishes([__DIR__ . '/../config/installer.php' => config_path('installer.php'),], 'installer');
    }
}
