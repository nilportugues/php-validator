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
     * @param $value
     *
     * @return bool
     */
    public static function isNotZero($value)
    {
        return 0 != (int) $value;
    }

    /**
     * @param $value
     *
     * @return bool
     */
    public static function isPositive($value)
    {
        return 0 <= (int) $value;
    }

    /**
     * @param $value
     *
     * @return bool
     */
    public static function isNegative($value)
    {
        return 0 >= (int) $value;
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
        $value = (int) $value;
        $min = (int) $min;
        $max = (int) $max;

        if ($min > $max) {
            throw new \InvalidArgumentException(sprintf('%s cannot be less than  %s for validation', $min, $max));
        }

        if (false === $inclusive) {
            return (($value > $min) && ($value < $max));
        }

        return (($value >= $min) && ($value <= $max));
    }
}
