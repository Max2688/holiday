<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HolidayCheckServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('holidayCheck','App\Service\HolidayBase');
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
