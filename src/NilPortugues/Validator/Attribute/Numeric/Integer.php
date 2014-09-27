<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/16/14
 * Time: 9:17 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\Validator\Attribute\Numeric;

use NilPortugues\Validator\Attribute\Generic;
use NilPortugues\Validator\Validator;

/**
 * Class Integer
 * @package NilPortugues\Validator\Attribute\Numeric
 */
class Integer extends Generic
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
     * @return \NilPortugues\Validator\Attribute\Numeric\Integer
     */
    public function isNotZero()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /**
     * @return \NilPortugues\Validator\Attribute\Numeric\Integer
     */
    public function isPositive()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /**
     * @return \NilPortugues\Validator\Attribute\Numeric\Integer
     */
    public function isPositiveOrZero()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /**
     * @param int  $min
     * @param int  $max
     * @param bool $inclusive
     *
     * @return \NilPortugues\Validator\Attribute\Numeric\Integer
     */
    public function isBetween($min, $max, $inclusive = false)
    {
        $this->addCondition(__METHOD__, [$min, $max, $inclusive], ['min' => $min, 'max' => $max]);

        return $this;
    }

    /**
     * @return \NilPortugues\Validator\Attribute\Numeric\Integer
     */
    public function isNegative()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /**
     * @return \NilPortugues\Validator\Attribute\Numeric\Integer
     */
    public function isNegativeOrZero()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /**
     * @return $this
     */
    public function isOdd()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /**
     * @return $this
     */
    public function isEven()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /**
     * @param int $multiple
     *
     * @return $this
     */
    public function isMultiple($multiple)
    {
        $this->addCondition(__METHOD__, [$multiple]);

        return $this;
    }
}
