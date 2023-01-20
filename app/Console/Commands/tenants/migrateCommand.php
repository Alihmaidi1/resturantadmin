<?php

namespace App\Console\Commands\tenants;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use \App\Models\resturant;

class migrateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenant:migrate {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate to tenant connection';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->argument("name");
        changeDatabaseConnection($name);
        Artisan::call("migrate --path=database/migrations/tenant --database=tenant");
        return Command::SUCCESS;
    }
}
