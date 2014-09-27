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
     * @param string|\DateTime $value
     *
     * @return bool
     */
    public static function isDateTime($value)
    {
        if ($value instanceof \DateTime) {
            return true;
        }

        $date   = new \DateTime($value);
        $errors = $date->getLastErrors();

        return (0 == $errors['warning_count'] && 0 == $errors['error_count']);
    }

    /**
     * @param string|\DateTime $value
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
     * @param string|\DateTime $value
     * @param string|\DateTime $limit
     * @param bool             $inclusive
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
     * @param string|\DateTime $value
     * @param string|\DateTime $limit
     * @param bool             $inclusive
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
     * @param string|\DateTime $value
     * @param bool             $inclusive
     * @param string $minDate
     * @param string $maxDate
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

    /**
     * @param string $value
     *
     * @return bool
     */
    public static function isWeekend($value)
    {
        $value = self::convertToDateTime($value);

        return '0' == $value->format('w') || '6' == $value->format('w');
    }

    /**
     *
     * @param string $value
     * @return bool
     */
    public static function isWeekday($value)
    {
        return !self::isWeekend($value);
    }

    /**
     *
     * @param string $value
     * @return bool
     */
    public static function isMonday($value)
    {
        $value = self::convertToDateTime($value);

        return '1' == $value->format('w');
    }

    /**
     *
     * @param string $value
     * @return bool
     */
    public static function isTuesday($value)
    {
        $value = self::convertToDateTime($value);

        return '2' == $value->format('w');
    }

    /**
     *
     * @param string $value
     * @return bool
     */
    public static function isWednesday($value)
    {
        $value = self::convertToDateTime($value);

        return '3' == $value->format('w');
    }

    /**
     *
     * @param string $value
     * @return bool
     */
    public static function isThursday($value)
    {
        $value = self::convertToDateTime($value);

        return '4' == $value->format('w');
    }

    /**
     *
     * @param string $value
     * @return bool
     */
    public static function isFriday($value)
    {
        $value = self::convertToDateTime($value);

        return '5' == $value->format('w');
    }

    /**
     *
     * @param string $value
     * @return bool
     */
    public static function isSaturday($value)
    {
        $value = self::convertToDateTime($value);

        return '6' == $value->format('w');
    }

    /**
     *
     * @param string $value
     * @return bool
     */
    public static function isSunday($value)
    {
        $value = self::convertToDateTime($value);

        return '0' == $value->format('w');
    }

    /**
     *
     * @param \DateTime $value
     * @return bool
     */
    public static function isToday($value)
    {
        $value = self::convertToDateTime($value);

        $date = new \DateTime('now');

        return $date->format('Y-m-d') === $value->format('Y-m-d');
    }

    /**
     *
     * @param \DateTime $value
     * @return bool
     */
    public static function isYesterday($value)
    {
        $value = self::convertToDateTime($value);

        $date = new \DateTime('now - 1 day');

        return $date->format('Y-m-d') === $value->format('Y-m-d');
    }

    /**
     *
     * @param \DateTime $value
     * @return bool
     */
    public static function isTomorrow($value)
    {
        $value = self::convertToDateTime($value);

        $date = new \DateTime('now + 1 day');

        return $date->format('Y-m-d') === $value->format('Y-m-d');
    }

    /**
     * Determines if the instance is a leap year
     *
     *
     * @param \DateTime $value
     * @return bool
     */
    public static function isLeapYear($value)
    {
        $value = self::convertToDateTime($value);

        return '1' == $value->format('L');
    }

    /**
     *
     * @param string $value
     * @return bool
     */
    public static function isMorning($value)
    {
        $value = self::convertToDateTime($value);
        $date  = strtotime($value->format('H:i:s'));

        return $date >= strtotime($value->format('06:00:00')) && $date <= strtotime($value->format('11:59:59'));
    }

    /**
     *
     * @param string $value
     * @return bool
     */
    public static function isAftenoon($value)
    {
        $value = self::convertToDateTime($value);
        $date  = strtotime($value->format('H:i:s'));

        return $date >= strtotime($value->format('12:00:00')) && $date <= strtotime($value->format('17:59:59'));
    }

    /**
     *
     * @param string $value
     * @return bool
     */
    public static function isEvening($value)
    {
        $value = self::convertToDateTime($value);
        $date  = strtotime($value->format('H:i:s'));

        return $date >= strtotime($value->format('18:00:00')) && $date <= strtotime($value->format('23:59:59'));
    }

    /**
     *
     * @param string $value
     * @return bool
     */
    public static function isNight($value)
    {
        $value = self::convertToDateTime($value);
        $date  = strtotime($value->format('H:i:s'));

        return $date >= strtotime($value->format('00:00:00')) && $date <= strtotime($value->format('05:59:59'));
    }
}
