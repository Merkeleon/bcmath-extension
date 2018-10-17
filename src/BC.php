<?php


namespace Merkeleon\BCMath;


/**
 * Class BC
 * @method static add(string $left_operand, string $right_operand, int $scale = 0)
 * @method static sub(string $left_operand, string $right_operand, int $scale = 0)
 * @method static mul(string $left_operand, string $right_operand, int $scale = 0)
 * @method static div(string $dividend, string $divisor, int $scale = 0)
 * @method static pow(string $base, string $exponent, int $scale = 0)
 * @method static sqrt(string $operand, int $scale = 0)
 * @method static mod(string $dividend, string $divisor, int $scale = 0)
 * @method static powmod(string $base, string $exponent, string $modulus, int $scale = 0)
 * @method static scale(int $scale)
 * @method static comp(string $left_operand, string $right_operand, int $scale = 0)
 */
class BC
{
    /**
     * @param $method
     * @param $arguments
     * @return mixed
     * @throws BCNotFoundException
     */
    public static function __callStatic($method, $arguments)
    {
        $method = 'bc' . strtolower($method);
        if (function_exists($method))
        {
            return $method(...$arguments);
        }
        throw new BCNotFoundException(sprintf('Method "%s" not exist', $method));
    }

    public static function hexdec($hex)
    {
        $hex = (string)$hex;
        if (starts_with($hex, ['0x', '0X']))
        {
            $hex = substr($hex, 2);
        }
        $dec = 0;
        $len = strlen($hex);
        for ($i = 1; $i <= $len; $i++)
        {
            $dec = BC::add($dec, BC::mul((string)hexdec($hex[$i - 1]), BC::pow('16', (string)($len - $i))));
        }

        return $dec;
    }

    public static function dechex($dec)
    {
        $hex = '';
        do
        {
            $last = BC::mod($dec, 16);
            $hex  = dechex($last) . $hex;
            $dec  = BC::div(BC::sub($dec, $last), 16);
        } while ($dec > 0);

        return $hex;
    }
}
