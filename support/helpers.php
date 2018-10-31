<?php

use Merkeleon\BCMath\BC;

if (!function_exists('bchexdec'))
{
    function bchexdec($hex)
    {
        return BC::hexdec($hex);
    }
}

if (!function_exists('bcdechex'))
{
    function bcdechex($dec)
    {
        return BC::dechex($dec);
    }
}
