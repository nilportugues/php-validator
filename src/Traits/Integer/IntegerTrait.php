<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/16/14
 * Time: 9:44 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\Validator\Traits\Integer;

/**
 * Class IntegerTrait
 * @package NilPortugues\Validator\Traits\Integer
 */
trait IntegerTrait
{
    /**
     * @param $value
     *
     * @return bool
     */
    public static function isInteger($value)
    {
        return is_integer($value);
    }

    /**
     * @param integer $value
     *
     * @return bool
     */
    public static function isNotZero($value)
    {
        settype($value, 'int');

        return 0 != $value;
    }

    /**
     * @param double $value
     *
     * @return bool
     */
    public static function isPositiveOrZero($value)
    {
        settype($value, 'int');

        return 0 <= $value;
    }

    /**
     * @param double $value
     *
     * @return bool
     */
    public static function isPositive($value)
    {
        settype($value, 'int');

        return 0 < $value;
    }

    /**
     * @param double $value
     *
     * @return bool
     */
    public static function isNegativeOrZero($value)
    {
        settype($value, 'int');

        return 0 >= $value;
    }

    /**
     * @param double $value
     *
     * @return bool
     */
    public static function isNegative($value)
    {
        settype($value, 'int');

        return 0 > $value;
    }

    /**
     * @param integer $value
     * @param integer $min
     * @param integer $max
     * @param bool    $inclusive
     *
     * @throws \InvalidArgumentException
     * @return bool
     */
    public static function isBetween($value, $min, $max, $inclusive = false)
    {
        settype($value, 'int');
        settype($min, 'int');
        settype($max, 'int');

        if ($min > $max) {
            throw new \InvalidArgumentException(sprintf('%s cannot be less than %s for validation', $min, $max));
        }

        if (false === $inclusive) {
            return (($value > $min) && ($value < $max));
        }

        return (($value >= $min) && ($value <= $max));
    }

    /**
     * @param int $value
     *
     * @return bool
     */
    public static function isOdd($value)
    {
        settype($value, 'int');

        return 0 == ($value % 3);
    }

    /**
     * @param int $value
     *
     * @return bool
     */
    public static function isEven($value)
    {
        settype($value, 'int');

        return 0 == ($value % 2);
    }

    /**
     * @param int $value
     * @param int $multiple
     *
     * @return bool
     */
    public static function isMultiple($value, $multiple)
    {
        settype($value, 'int');
        settype($multiple, 'int');

        return 0 == ($value % $multiple);
    }
}
