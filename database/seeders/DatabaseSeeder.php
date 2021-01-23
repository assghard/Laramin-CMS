<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Page\Database\Seeders\PageDatabaseSeeder;
use Modules\Dashboard\Database\Seeders\DashboardDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call(PageDatabaseSeeder::class);
        $this->call(DashboardDatabaseSeeder::class);
    }
}
