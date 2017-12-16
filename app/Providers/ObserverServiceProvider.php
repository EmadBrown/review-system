<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Admin;
use App\Observers\AdminObserver;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Admin::observe(AdminObserver::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
