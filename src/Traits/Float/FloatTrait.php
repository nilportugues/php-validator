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
        settype($value, 'float');

        return 0 != $value;
    }

    /**
     * @param double $value
     *
     * @return bool
     */
    public static function isPositiveOrZero($value)
    {
        settype($value, 'float');

        return 0 <= $value;
    }

    /**
     * @param double $value
     *
     * @return bool
     */
    public static function isPositive($value)
    {
        settype($value, 'float');

        return 0 < $value;
    }

    /**
     * @param double $value
     *
     * @return bool
     */
    public static function isNegativeOrZero($value)
    {
        settype($value, 'float');

        return 0 >= $value;
    }

    /**
     * @param double $value
     *
     * @return bool
     */
    public static function isNegative($value)
    {
        settype($value, 'float');

        return 0 > $value;
    }

    /**
     * @param double $value
     * @param double $min
     * @param double $max
     * @param bool   $inclusive
     *
     * @throws \InvalidArgumentException
     * @return bool
     */
    public static function isBetween($value, $min, $max, $inclusive = false)
    {
        settype($value, 'float');
        settype($min, 'float');
        settype($max, 'float');

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
        settype($value, 'int');

        return 1 == ($value % 2);
    }

    /**
     * @param float $value
     *
     * @return bool
     */
    public static function isEven($value)
    {
        settype($value, 'int');

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
        settype($value, 'float');
        settype($multiple, 'float');

        return (float) 0 == fmod($value, $multiple);
    }
}
