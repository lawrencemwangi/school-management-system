<?php

if (!function_exists('hasUserLevel')) {
    function hasUserLevel($level)
    {
        return auth()->check() && auth()->user()->user_level == $level;
    }
}
