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

if (!function_exists('bcround'))
{
    function bcround($base, $scale)
    {
        return BC::round($base, $scale, 5);
    }
}

if (!function_exists('bcceil'))
{
    function bcceil($base, $scale)
    {
        return BC::round($base, $scale, 9);
    }
}

if (!function_exists('bcfloor'))
{
    function bcfloor($base, $scale)
    {
        return BC::round($base, $scale, 0);
    }
}
