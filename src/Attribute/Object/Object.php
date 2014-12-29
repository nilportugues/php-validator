<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/16/14
 * Time: 9:18 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\Validator\Attribute\Object;

use NilPortugues\Validator\Attribute\Generic;
use NilPortugues\Validator\Validator;

/**
 * Class Object
 * @package NilPortugues\Validator\Attribute\Object
 */
class Object extends Generic
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
     * @param string $instanceOf
     *
     * @return $this
     */
    public function isInstanceOf($instanceOf)
    {
        $this->addCondition(__METHOD__, [$instanceOf]);

        return $this;
    }

    /**
     * @param string $property
     *
     * @return $this
     */
    public function hasProperty($property)
    {
        $this->addCondition(__METHOD__, [$property]);

        return $this;
    }

    /**
     * @param string $method
     *
     * @return $this
     */
    public function hasMethod($method)
    {
        $this->addCondition(__METHOD__, [$method]);

        return $this;
    }

    /**
     * @return $this
     */
    public function hasParentClass()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /**
     * @param string $parentClass
     *
     * @return $this
     */
    public function isChildOf($parentClass)
    {
        $this->addCondition(__METHOD__, [$parentClass]);

        return $this;
    }

    /**
     * @param string $inheritsClass
     *
     * @return $this
     */
    public function inheritsFrom($inheritsClass)
    {
        $this->addCondition(__METHOD__, [$inheritsClass]);

        return $this;
    }

    /**
     * @param string $interface
     *
     * @return $this
     */
    public function hasInterface($interface)
    {
        $this->addCondition(__METHOD__, [$interface]);

        return $this;
    }
}
