<?php

namespace App\Providers;

use App\repo\classes\account;
use App\repo\classes\awscloud;
use App\repo\classes\currency;
use App\repo\classes\resturant;
use App\repo\classes\role;
use App\repo\classes\storehouse;
use App\repo\classes\tabletype;
use App\repo\interfaces\accountinterface;
use App\repo\interfaces\cloudinterface;
use App\repo\interfaces\currencyinterface;
use App\repo\interfaces\resturantinterface;
use App\repo\interfaces\roleinterface;
use App\repo\interfaces\storehouseinterface;
use App\repo\interfaces\tabletypeinterface;
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
        $this->app->bind(currencyinterface::class,currency::class);
        $this->app->bind(tabletypeinterface::class,tabletype::class);
        $this->app->bind(storehouseinterface::class,storehouse::class);

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
