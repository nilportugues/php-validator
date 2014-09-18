<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/16/14
 * Time: 10:19 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\Validator\Traits\Float;

/**
 * Class FloatTrait
 * @package NilPortugues\Validator\Traits\Float
 */
trait FloatTrait
{
    /**
     * @param $value
     *
     * @return bool
     */
    public static function isFloat($value)
    {
        return is_float($value);
    }

    /**
     * @param $value
     *
     * @return bool
     */
    public static function isNotZero($value)
    {
        return 0 != (float) $value;
    }

    /**
     * @param $value
     *
     * @return bool
     */
    public static function isPositive($value)
    {
        return 0 <= (float) $value;
    }

    /**
     * @param $value
     *
     * @return bool
     */
    public static function isNegative($value)
    {
        return 0 >= (float) $value;
    }

    /**
     * @param      $value
     * @param      $min
     * @param      $max
     * @param bool $inclusive
     *
     * @throws \InvalidArgumentException
     * @return bool
     */
    public static function isBetween($value, $min, $max, $inclusive = false)
    {
        $value = (float) $value;
        $min = (float) $min;
        $max = (float) $max;

        if ($min > $max) {
            throw new \InvalidArgumentException(sprintf('%s cannot be less than  %s for validation', $min, $max));
        }

        if (false === $inclusive) {
            return (($min < $value) && ($value < $max));
        }

        return (($min <= $value) && ($value <= $max));
    }

    /**
     * @param float $value
     *
     * @return bool
     */
    public static function isOdd($value)
    {
        $value = (float) $value;

        return 0 == ($value % 3);
    }

    /**
     * @param float $value
     *
     * @return bool
     */
    public static function isEven($value)
    {
        $value = (float) $value;

        return 0 == ($value % 2);
    }

    /**
     * @param float $value
     * @param float $multiple
     *
     * @return bool
     */
    public static function isMultiple($value, $multiple)
    {
        $multiple = (float) $multiple;
        $value = (float) $value;

        return 0 == ($value % $multiple);
    }
}
