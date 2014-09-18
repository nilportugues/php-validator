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
     * @return bool
     */
    public static function isBetween($value, $min, $max, $inclusive = false)
    {
        $value = (float) $value;
        $min = (float) $min;
        $max = (float) $max;

        if (false === $inclusive) {
            return (($min < $value) && ($value < $max));
        }

        return (($min <= $value) && ($value <= $max));
    }    
}
