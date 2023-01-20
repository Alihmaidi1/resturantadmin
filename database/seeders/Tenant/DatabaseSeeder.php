<?php

namespace Database\Seeders\Tenant;

use Database\Seeders\changeprovider;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            superadmin::class,
            changeprovider::class
        ]);


    }
}
