<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/16/14
 * Time: 10:19 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\Validator\Traits\Collection;

use NilPortugues\Validator\AbstractValidator;

/**
 * Class CollectionTrait
 * @package NilPortugues\Validator\Traits\Collection
 */
trait CollectionTrait
{
    /**
     * @param mixed $value
     *
     * @return bool
     */
    public static function isArray($value)
    {
        return is_array($value)
        || (is_object($value) && $value instanceof \ArrayObject)
        || (is_object($value) && $value instanceof \SplFixedArray);
    }

    /**
     * @param                                           $value
     * @param \NilPortugues\Validator\AbstractValidator $valueValidator
     * @param \NilPortugues\Validator\AbstractValidator $keyValidator
     *
     * @return bool
     */
    public static function each($value, AbstractValidator $valueValidator, AbstractValidator $keyValidator = null)
    {
        $isValid = true;

        foreach ($value as $key => $data) {
            if ($keyValidator instanceof AbstractValidator) {
                $isValid = $isValid && $keyValidator->validate($key);
            }

            $isValid = $isValid && $valueValidator->validate($data);
        }

        return $isValid;
    }

    /**
     * @param                   $value
     * @param AbstractValidator $keyValidator
     *
     * @return bool
     */
    public static function hasKeyFormat($value, AbstractValidator $keyValidator)
    {
        if ($value instanceof \ArrayObject) {
            $value = $value->getArrayCopy();
        }

        if ($value instanceof \SplFixedArray) {
            $value = $value->toArray();
        }

        $arrayKeys = array_keys($value);
        $isValid   = true;

        foreach ($arrayKeys as $key) {
            $isValid = $isValid && $keyValidator->validate($key);
        }

        return $isValid;
    }

    /**
     * @param       $haystack
     * @param mixed $needle
     * @param bool  $strict
     *
     * @return bool
     */
    public static function endsWith($haystack, $needle, $strict = false)
    {
        $last = end($haystack);
        settype($strict, 'bool');

        if (false === $strict) {
            return $last == $needle;
        }

        return $last === $needle;
    }

    /**
     * @param       $haystack
     * @param mixed $needle
     * @param bool  $strict
     *
     * @return bool
     */
    public static function contains($haystack, $needle, $strict = false)
    {
        if ($haystack instanceof \ArrayObject) {
            $haystack = $haystack->getArrayCopy();
        }

        if ($haystack instanceof \SplFixedArray) {
            $haystack = $haystack->toArray();
        }

        settype($strict, 'bool');

        if (false === $strict) {
            return in_array($needle, $haystack, false);
        }

        return in_array($needle, $haystack, true);
    }

    /**
     * @param        $value
     * @param string $keyName
     *
     * @return bool
     */
    public static function hasKey($value, $keyName)
    {
        return array_key_exists($keyName, $value);
    }

    /**
     * @param     $value
     * @param int $length
     *
     * @return bool
     */
    public static function hasLength($value, $length)
    {
        settype($length, 'int');

        return count($value) === $length;
    }

    /**
     * @param $value
     *
     * @return bool
     */
    public static function isNotEmpty($value)
    {
        return count($value) > 0;
    }

    /**
     * @param       $haystack
     * @param mixed $needle
     * @param bool  $strict
     *
     * @return bool
     */
    public static function startsWith($haystack, $needle, $strict = false)
    {
        $first = reset($haystack);
        settype($strict, 'bool');

        if (false === $strict) {
            return $first == $needle;
        }

        return $first === $needle;
    }
}
