<?php

use Modules\Dashboard\Entities\Setting;

if (!function_exists('system_setting')) {
    function system_setting($name)
    {
        try {
            return Setting::getValueByName($name);
        } catch (\Throwable $th) {
        }
    }
}

if (!function_exists('technical_break_config')) {
    function technical_break_config()
    {
        $filename = base_path('technical-break.txt');

        try {
            return unserialize(file_get_contents($filename));
        } catch (\Throwable $th) {
            return [
                'enabled' => false,
                'accessable_ip_addresses' => []
            ];
        }
    }
}

if (!function_exists('technical_break_enable')) {
    function technical_break_enable()
    {
        $filename = base_path('technical-break.txt');

        try {
            $config = unserialize(file_get_contents($filename));
            $config['enabled'] = true;

            file_put_contents($filename, serialize($config));
        } catch (\Throwable $th) {
        }
    }
}

if (!function_exists('technical_break_disable')) {
    function technical_break_disable()
    {
        $filename = base_path('technical-break.txt');

        try {
            $config = unserialize(file_get_contents($filename));
            $config['enabled'] = false;

            file_put_contents($filename, serialize($config));
        } catch (\Throwable $th) {
        }
    }
}