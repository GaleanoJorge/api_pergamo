<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CertificateServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        require_once app_path() . '/Http/Helpers/Certificates/Certificates.php';
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
