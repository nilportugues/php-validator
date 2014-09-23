<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/21/14
 * Time: 8:37 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\Validator\Attribute\DateTime;

use NilPortugues\Validator\Attribute\Generic;
use NilPortugues\Validator\Validator;

/**
 * Class DateTime
 * @package NilPortugues\Validator\Attribute\DateTime
 */
class DateTime extends Generic
{
    /**
     * @param Validator $validator
     * @param array     $errorMessages
     * @param array     $functionMap
     */
    public function __construct(Validator $validator, array &$errorMessages, array &$functionMap)
    {
        parent::__construct($validator, $errorMessages, $functionMap);

        $this->addCondition(__METHOD__);
    }

    /**
     * @param      $limit
     * @param bool $inclusive
     *
     * @return $this
     */
    public function isAfter($limit, $inclusive = false)
    {
        $this->addCondition(__METHOD__, [$limit, $inclusive]);

        return $this;
    }

    /**
     * @param      $limit
     * @param bool $inclusive
     *
     * @return $this
     */
    public function isBefore($limit, $inclusive = false)
    {
        $this->addCondition(__METHOD__, [$limit, $inclusive]);

        return $this;
    }

    /**
     * @param string $minDate
     * @param string $maxDate
     * @param bool   $inclusive
     *
     * @return $this
     */
    public function isBetween($minDate, $maxDate, $inclusive = false)
    {
        $this->addCondition(__METHOD__, [$minDate, $maxDate, $inclusive], ['min' => $minDate, 'max' => $maxDate]);

        return $this;
    }

    /*
     * @return $this
     */
    public function isWeekend()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /*
     * @return $this
     */
    public function isWeekday()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /*
     * @return $this
     */
    public function isMonday()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /*
     * @return $this
     */
    public function isTuesday()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /*
     * @return $this
     */
    public function isWednesday()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /*
     * @return $this
     */
    public function isThursday()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /*
     * @return $this
     */
    public function isFriday()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /*
     * @return $this
     */
    public function isSaturday()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /*
     * @return $this
     */
    public function isSunday()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /*
     * @return $this
     */
    public function isToday()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /*
     * @return $this
     */
    public function isYesterday()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /*
     * @return $this
     */
    public function isTomorrow()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /*
     * @return $this
     */
    public function isLeapYear()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /**
     * @return $this
     */
    public function isMorning()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /**
     * @return $this
     */
    public function isAftenoon()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /**
     * @return $this
     */
    public function isEvening()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /**
     * @return $this
     */
    public function isNight()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }
}
