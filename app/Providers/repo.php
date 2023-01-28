<?php

namespace App\Providers;

use App\repo\classes\goodstore;
use App\repo\classes\account;
use App\repo\classes\awscloud;
use App\repo\classes\banner;
use App\repo\classes\category;
use App\repo\classes\currency;
use App\repo\classes\employee;
use App\repo\classes\experiece;
use App\repo\classes\good;
use App\repo\classes\job;
use App\repo\classes\resturant;
use App\repo\classes\role;
use App\repo\classes\slider;
use App\repo\classes\storehouse;
use App\repo\classes\table;
use App\repo\classes\tabletype;
use App\repo\interfaces\accountinterface;
use App\repo\interfaces\bannerinterface;
use App\repo\interfaces\categoryinterface;
use App\repo\interfaces\cloudinterface;
use App\repo\interfaces\currencyinterface;
use App\repo\interfaces\employeeinterface;
use App\repo\interfaces\experieceinterface;
use App\repo\interfaces\goodinterface;
use App\repo\interfaces\goodstoreinterface;
use App\repo\interfaces\jobinterface;
use App\repo\interfaces\resturantinterface;
use App\repo\interfaces\roleinterface;
use App\repo\interfaces\sliderinterface;
use App\repo\interfaces\storehouseinterface;
use App\repo\interfaces\tableinterface;
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
        $this->app->bind(goodinterface::class,good::class);
        $this->app->bind(tableinterface::class,table::class);
        $this->app->bind(goodstoreinterface::class,goodstore::class);
        $this->app->bind(jobinterface::class,job::class);
        $this->app->bind(experieceinterface::class,experiece::class);
        $this->app->bind(employeeinterface::class,employee::class);
        $this->app->bind(categoryinterface::class,category::class);
        $this->app->bind(sliderinterface::class,slider::class);
        $this->app->bind(bannerinterface::class,banner::class);

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
