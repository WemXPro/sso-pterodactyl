<?php

namespace WemX\Sso;

use Illuminate\Support\ServiceProvider;

class SsoServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Registration of the configuration filess
        $this->publishes([
            __DIR__ . '/config/sso.php' => config_path('sso.php'),
        ], 'sso');

        // Registration of routes
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
    }

    public function register()
    {
        // Download configuration file
        $this->mergeConfigFrom(
            __DIR__ . '/config/sso.php',
            'sso'
        );
    }
}
