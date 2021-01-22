<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (!\App::runningInConsole()) {
            $ipAddress = (array_key_exists('REMOTE_ADDR', $_SERVER)) ? $_SERVER['REMOTE_ADDR'] : NULL;
            $technicalBreak = technical_break_config();
            if (env('TECHNICAL_BREAK') == true || $technicalBreak['enabled'] == true) {
                if (empty($ipAddress) || !in_array($ipAddress, $technicalBreak['accessable_ip_addresses'])) { // only admin IP s have access
                    echo view('layouts.technical-break');
                    die;
                }
            }
            
        }
    }
}
