<?php

namespace App\Providers;

use App\repo\classes\account;
use App\repo\classes\awscloud;
use App\repo\classes\resturant;
use App\repo\classes\role;
use App\repo\interfaces\accountinterface;
use App\repo\interfaces\cloudinterface;
use App\repo\interfaces\resturantinterface;
use App\repo\interfaces\roleinterface;
use Illuminate\Support\ServiceProvider;

class repo extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(accountinterface::class, account::class);
        $this->app->bind(cloudinterface::class, awscloud::class);
        $this->app->bind(resturantinterface::class, resturant::class);
        $this->app->bind(roleinterface::class, role::class);

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