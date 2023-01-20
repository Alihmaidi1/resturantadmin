<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class createResturantJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public $timeout = 1200000;
    public $resturant;
    public function __construct($resturant)
    {

        $this->resturant = $resturant;

    }
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {



            Artisan::call("tenant:migrate ".$this->resturant->database_name);            
            Artisan::call("passport:client --password --name=default --provider=admins");
            Artisan::call("passport:install");
            Artisan::call("db:seed --class=Database\\\\Seeders\\\\Tenant\\\\DatabaseSeeder");
            Artisan::call("passport:client --personal --name=default");
            DB::purge("tenant");
            DB::reconnect("system");
            DB::setDefaultConnection("system");
            return true;


    }
}
