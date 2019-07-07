<?php

namespace App\Providers;

use App\Uploader\FancyFileUploaderHelper;
use Illuminate\Support\ServiceProvider;

class UploaderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('FancyFileUploaderHelper', function () {
            return new FancyFileUploaderHelper;
        });
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
