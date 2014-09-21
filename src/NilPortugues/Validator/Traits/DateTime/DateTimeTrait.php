<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/21/14
 * Time: 8:18 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\Validator\Traits\DateTime;

/**
 * Class DateTimeTrait
 * @package NilPortugues\Validator\Traits\DateTime
 */
trait DateTimeTrait
{
    /**
     * Checks if a value is a a valid datetime format.
     *
     * @param $value
     *
     * @return bool
     */
    public static function isDateTime($value)
    {
        if ($value instanceof \DateTime) {
            $value = $value->format('Y-m-d H:i:s');
        }

        $dateTime = \DateTime::createFromFormat('Y-m-d H:i:s', $value);

        $errors = \DateTime::getLastErrors();
        if (!empty($errors['warning_count'])) {
            return false;
        }

        return $dateTime !== false;
    }

    /**
     * @param $value
     *
     * @return \DateTime
     */
    private static function convertToDateTime($value)
    {
        if ($value instanceof \DateTime) {
            return $value;
        }

        return new \DateTime($value);
    }

    /**
     * Checks if a given date is happening after the given limiting date.
     *
     * @param      $value
     * @param      $limit
     * @param bool $inclusive
     *
     * @return bool
     */
    public static function isAfter($value, $limit, $inclusive = false)
    {
        $value = self::convertToDateTime($value);
        $limit = self::convertToDateTime($limit);

        if (false === $inclusive) {
            return strtotime($value->format('Y-m-d H:i:s')) > strtotime($limit->format('Y-m-d H:i:s'));
        }

        return strtotime($value->format('Y-m-d H:i:s')) >= strtotime($limit->format('Y-m-d H:i:s'));
    }

    /**
     * Checks if a given date is happening before the given limiting date.
     *
     * @param      $value
     * @param      $limit
     * @param bool $inclusive
     *
     * @return bool
     */
    public static function isBefore($value, $limit, $inclusive = false)
    {
        $value = self::convertToDateTime($value);
        $limit = self::convertToDateTime($limit);

        if (false === $inclusive) {
            return strtotime($value->format('Y-m-d H:i:s')) < strtotime($limit->format('Y-m-d H:i:s'));
        }

        return strtotime($value->format('Y-m-d H:i:s')) <= strtotime($limit->format('Y-m-d H:i:s'));
    }

    /**
     * Checks if a given date is in a given range of dates.
     *
     * @param      $value
     * @param      $minDate
     * @param      $maxDate
     * @param bool $inclusive
     *
     * @return bool
     */
    public static function isBetween($value, $minDate, $maxDate, $inclusive = false)
    {
        if (false === $inclusive) {
            return (self::isAfter($value, $minDate, false) && self::isBefore($value, $maxDate, false));
        }

        return (self::isAfter($value, $minDate, true) && self::isBefore($value, $maxDate, true));
    }
}
