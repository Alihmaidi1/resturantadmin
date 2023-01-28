<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;

use App\Models\admin;
use App\Models\banner;
use App\Models\category;
use App\Models\chat;
use App\Models\currency_resturant;
use App\Models\food;
use App\Models\goodstore;
use App\Models\role;
use App\Models\setting;
use App\Models\slider;
use App\Policies\adminPolicy;
use App\Policies\bannerPolicy;
use App\Policies\categoryPolicy;
use App\Policies\chatPolicy;
use App\Policies\foodPolicy;
use App\Policies\goodstorePolicy;
use App\Policies\rolePolicy;
use App\Policies\settingPolicy;
use App\Policies\sliderPolicy;
use Carbon\Carbon;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Config;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',

        currency_resturant::class=>currencyPolicy::class,
        admin::class=>adminPolicy::class,
        category::class=>categoryPolicy::class,
        goodstore::class=>goodstorePolicy::class,
        slider::class=>sliderPolicy::class,
        banner::class=>bannerPolicy::class,
        food::class=>foodPolicy::class,
        setting::class=>settingPolicy::class,
        chat::class=>chatPolicy::class,
        role::class=>rolePolicy::class,



    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define("isadmin",function(admin $admin){

            if($admin->resturant_id==null){

                return true;
            }else{

                return false;
            }

        });

        Gate::define("currency", function () {

            return true;

        });
        foreach(Config::get("global.adminPermssion") as $name=>$value){

            Gate::define($name, function (admin $admin) use ($name) {

                $permissions=$admin->role->permssions;
                foreach($permissions as $permission){

                    if($permission==$name){

                        return true;
                    }

                }

                return false;

            });

            }


            foreach(Config::get("global.permssion") as $name=>$value){

                Gate::define($name, function (admin $admin) use ($name) {
    
                    $permissions=$admin->role->permssions;
                    foreach($permissions as $permission){
    
                        if($permission==$name){
    
                            return true;
                        }
    
                    }
    
                    return false;
    
                });
    
                }
    


        Passport::tokensExpireIn(Carbon::now()->addMinutes(60));
        Passport::refreshTokensExpireIn(Carbon::now()->addDays(5));
    }
}
