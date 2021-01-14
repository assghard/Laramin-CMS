<?php

if (! function_exists('locale')) {
    function locale($locale = null)
    {
        if (is_null($locale)) {
            return app()->getLocale();
        }

        app()->setLocale($locale);

        return app()->getLocale();
    }
}

if (function_exists('number_separator') === false) {
    /**
     * Decorates number value
     * 
     * @param float $number - Number value
     * @param int $decimals - Decimals quantity
     * @param string $decPoint - Decimal point/separator
     * @param string $separator - Thousand separator
     * 
     * @return string
     */
    function number_separator($number, $decimals = 0, $decPoint = '.', $separator = " ") {
        return number_format($number, $decimals, $decPoint, $separator);
    }
}

if (! function_exists('getCookie')) {
    function getCookie($name){
        if(isset($_COOKIE[$name])){
            return $_COOKIE[$name];
        }

        return false;
    }
}

// if (!function_exists('adminDump')) {
//     function adminDump($obj) {
//         $user = \Auth::user();
//         if (!empty($user) && $user->is_admin == 1) {
//             dd($obj);
//         }
//     }
// }