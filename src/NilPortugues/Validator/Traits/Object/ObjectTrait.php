<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/16/14
 * Time: 10:19 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\Validator\Traits\Object;

/**
 * Class ObjectTrait
 * @package NilPortugues\Validator\Traits\Object
 */
trait ObjectTrait
{
    /**
     * @param $value
     *
     * @return bool
     */
    public static function isObject($value)
    {
        return is_object($value);
    }

    /**
     * @param mixed  $value
     * @param string $instanceOf
     *
     * @return bool
     */
    public static function isInstanceOf($value, $instanceOf)
    {
        return is_object($value) && get_class($value) === $instanceOf;
    }

    /**
     * @param $value
     * @param $property
     *
     * @return bool
     */
    public static function hasProperty($value, $property)
    {
        return is_object($value) && property_exists(get_class($value), $property);
    }

    /**
     * @param $value
     * @param $method
     *
     * @return bool
     */
    public static function hasMethod($value, $method)
    {
        return is_object($value) && method_exists(get_class($value), $method);
    }

    /**
     * @param $value
     *
     * @return bool
     */
    public static function hasParentClass($value)
    {
        return is_object($value) && get_parent_class($value) !== false;
    }

    /**
     * @param $value
     * @param $parentClass
     *
     * @return bool
     */
    public static function isChildOf($value, $parentClass)
    {
        return is_object($value) && get_parent_class($value) === $parentClass;
    }

    /**
     * @param $value
     * @param $inheritsClass
     *
     * @return bool
     */
    public static function inheritsFrom($value, $inheritsClass)
    {
        return is_object($value) && is_subclass_of($value, $inheritsClass);
    }

    /**
     * @param $value
     * @param $interface
     *
     * @return bool
     */
    public static function hasInterface($value, $interface)
    {
        return is_object($value) && in_array($interface, class_implements($value));
    }
}
