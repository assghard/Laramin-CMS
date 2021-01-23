<?php

namespace Modules\Dashboard\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Str;

class DashboardDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        \DB::table('dashboard__settings')->insert([
            'name' => 'REGISTER_ROUTES_ENABLED',
            'value' => 0,
            'description' => 'Customers will be able to sign up via frontend routes'
        ]);
        \DB::table('users')->insert([
            'email' => 'admin@cms.com',
            'email_verified_at' => now(),
            'password' => User::makePassword('Admin12345!'),
            'api_token' => Str::random(60), // for auth:api middleware
            'is_admin' => 1,
            'created_at' => now()
        ]);
        \DB::table('users')->insert([
            'email' => 'client@cms.com',
            'email_verified_at' => now(),
            'password' => User::makePassword('Client12345!'),
            'api_token' => Str::random(60), // for auth:api middleware
            'created_at' => now()
        ]);
    }
}
