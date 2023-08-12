<?php

if (!function_exists('pre')) {
    function pre($str)
    {
        echo '<pre>';
        print_r($str);
        echo '</pre>';
    }
}

if (!function_exists('prea')) {
    function prea($str)
    {
        echo '<pre>';
        print_r($str->toArray());
        echo '</pre>';
    }
}

if (!function_exists('pred')) {
    function pred($str)
    {
        echo '<pre>';
        print_r($str);
        echo '</pre>';
        die;
    }
}

if (!function_exists('pread')) {
    function pread($str)
    {
        echo '<pre>';
        print_r($str->toArray());
        echo '</pre>';
        die;
    }
}
