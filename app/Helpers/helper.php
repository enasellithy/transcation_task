<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('aurl')) {
    function aurl($url = null) {
        return url($url);
    }
}

if (!function_exists('active_link')) {
    function active_link($link)
    {
        if (request()->is($link)) {
            return 'active';
        }
    }
}

if (!function_exists('sub_menu')) {
    function sub_menu($link){
        if (request()->is($link)) {
            return 'active open';
        }
    }
}
