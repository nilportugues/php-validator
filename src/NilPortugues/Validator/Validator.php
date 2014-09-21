<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/16/14
 * Time: 9:04 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\Validator;

use NilPortugues\Validator\Attribute\Collection\Collection;
use NilPortugues\Validator\Attribute\DateTime\DateTime;
use NilPortugues\Validator\Attribute\Numeric\Float;
use NilPortugues\Validator\Attribute\Numeric\Integer;
use NilPortugues\Validator\Attribute\Object\Object;
use NilPortugues\Validator\Attribute\String\String;

/**
 * Class Validator
 * @package NilPortugues\Validator
 */
class Validator
{
    /**
     * @var string
     */
    private $propertyName;

    /**
     * @param string $propertyName
     *
     * @return Collection
     */
    public function isArray($propertyName)
    {
        $this->propertyName = $propertyName;

        return new Collection($this);
    }

    /**
     * @param string $propertyName
     *
     * @return \NilPortugues\Validator\Attribute\Numeric\Integer
     */
    public function isInteger($propertyName)
    {
        $this->propertyName = $propertyName;

        return new Integer($this);
    }

    /**
     * @param string $propertyName
     *
     * @return \NilPortugues\Validator\Attribute\Numeric\Float
     */
    public function isFloat($propertyName)
    {
        $this->propertyName = $propertyName;

        return new Float($this);
    }

    /**
     * @param string $propertyName
     *
     * @return \NilPortugues\Validator\Attribute\Object\Object
     */
    public function isObject($propertyName)
    {
        $this->propertyName = $propertyName;

        return new Object($this);
    }

    /**
     * @param string $propertyName
     *
     * @return \NilPortugues\Validator\Attribute\String\String
     */
    public function isString($propertyName)
    {
        $this->propertyName = $propertyName;

        return new String($this);
    }

    /**
     * @param string $propertyName
     *
     * @return \NilPortugues\Validator\Attribute\DateTime\DateTime
     */
    public function isDateTime($propertyName)
    {
        $this->propertyName = $propertyName;

        return new DateTime($this);
    }

    /**
     * @return string
     */
    public function getPropertyName()
    {
        return $this->propertyName;
    }
}
