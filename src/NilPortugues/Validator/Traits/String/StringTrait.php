<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/16/14
 * Time: 10:20 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\Validator\Traits\String;

/**
 * Class StringTrait
 * @package NilPortugues\Validator\Traits\String
 */
trait StringTrait
{
    /**
     * @param $value
     *
     * @return bool
     */
    public static function isString($value)
    {
        return is_string($value);
    }

    /**
     * @param $value
     * @return bool
     */
    public static function alnum($value)
    {

    }

    /**
     * @param $value
     * @return bool
     */
    public static function alpha($value)
    {

    }

    /**
     * @param $value
     * @return bool
     */
    public static function between($value)
    {

    }

    /**
     * @param $value
     * @return bool
     */
    public static function charset($value)
    {

    }

    /**
     * @param $value
     * @return bool
     */
    public static function consonant($value)
    {

    }

    /**
     * @param      $value
     * @param bool $identical
     *
     * @return bool
     */
    public static function contains($value, $identical = false)
    {

    }

    /**
     * @param $value
     * @return bool
     */
    public static function controlCharacters($value)
    {

    }

    /**
     * @param $value
     * @return bool
     */
    public static function digit($value)
    {

    }

    /**
     * @param $value
     * @return bool
     */
    public static function endsWith($value)
    {

    }

    /**
     * Validates if the input is equal some value.
     *
     * @param $value
     * @param $comparedValue
     * @param bool $identical
     *
     * @return bool
     */
    public function equals($value, $comparedValue, $identical = false)
    {
        if (false === $identical) {
            return $value == $comparedValue;
        }

        return $value === $comparedValue;
    }


    /**
     * @param $value
     * @return bool
     */
    public static function in($value)
    {

    }

    /**
     * @param $value
     * @return bool
     */
    public static function graph($value)
    {

    }

    /**
     * @param $value
     * @return bool
     */
    public static function length($value)
    {

    }

    /**
     * @param $value
     * @return bool
     */
    public static function lowercase($value)
    {

    }

    /**
     * @param $value
     * @return bool
     */
    public static function notEmpty($value)
    {

    }

    /**
     * @param $value
     * @return bool
     */
    public static function noWhitespace($value)
    {

    }

    /**
     * @param $value
     * @return bool
     */
    public static function printable($value)
    {

    }

    /**
     * @param $value
     * @return bool
     */
    public static function isPunctuation($value)
    {

    }

    /**
     * @param $value
     * @return bool
     */
    public static function regex($value)
    {

    }

    /**
     * @param $value
     * @return bool
     */
    public static function slug($value)
    {

    }

    /**
     * @param $value
     * @return bool
     */
    public static function space($value)
    {

    }

    /**
     * @param $value
     * @return bool
     */
    public static function startsWith($value)
    {

    }

    /**
     * @param $value
     * @return bool
     */
    public static function uppercase($value)
    {

    }

    /**
     * @param $value
     * @return bool
     */
    public static function version($value)
    {

    }

    /**
     * @param $value
     * @return bool
     */
    public static function vowel($value)
    {

    }

    /**
     * @param $value
     * @return bool
     */
    public static function xdigit($value)
    {

    }
}
