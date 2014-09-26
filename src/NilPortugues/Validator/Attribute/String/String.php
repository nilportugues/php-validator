<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/16/14
 * Time: 9:19 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\Validator\Attribute\String;

use NilPortugues\Validator\Attribute\Generic;
use NilPortugues\Validator\Validator;

/**
 * Class String
 * @package NilPortugues\Validator\Attribute\String
 */
class String extends Generic
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
     * Validates alphanumeric characters from a-Z and 0-9
     *
     * @return \NilPortugues\Validator\Attribute\String\String
     */
    public function isAlphanumeric()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /**
     * Validates alphanumeric characters from a-Z, white spaces and empty values.
     *
     * @return \NilPortugues\Validator\Attribute\String\String
     */
    public function isAlpha()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /**
     * Validates is a string is between ranges.
     *
     * @param int  $min
     * @param int  $max
     * @param bool $inclusive
     *
     * @return \NilPortugues\Validator\Attribute\String\String
     */
    public function isBetween($min, $max, $inclusive = false)
    {
        $this->addCondition(__METHOD__, [$min, $max, $inclusive], ['min' => $min, 'max' => $max]);

        return $this;
    }

    /**
     * Validates if a string is in a specific charset
     *
     * @param string[] $charsetNames
     *
     * @return \NilPortugues\Validator\Attribute\String\String
     */
    public function isCharset(array $charsetNames)
    {
        $this->addCondition(__METHOD__, [$charsetNames]);

        return $this;
    }

    /**
     * Validates strings that contain only consonants.
     *
     * @return \NilPortugues\Validator\Attribute\String\String
     */
    public function isAllConsonants()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /**
     * Validates if the input is equal some value.
     *
     * @param mixed $comparedValue
     * @param bool  $identical
     *
     * @return \NilPortugues\Validator\Attribute\String\String
     */
    public function equals($comparedValue, $identical = false)
    {
        $this->addCondition(__METHOD__, [$comparedValue, $identical]);

        return $this;
    }

    /**
     * @param      $value
     * @param bool $identical
     *
     * @return \NilPortugues\Validator\Attribute\String\String
     */
    public function contains($value, $identical = false)
    {
        $this->addCondition(__METHOD__, [$value, $identical]);

        return $this;
    }

    /**
     * Only accepts control characters.
     *
     * @return \NilPortugues\Validator\Attribute\String\String
     */
    public function isControlCharacters()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /**
     * Validates a value that doesn't allow a-Z, but accepts empty values and whitespace.
     *
     * @return \NilPortugues\Validator\Attribute\String\String
     */
    public function isDigit()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /**
     * Validates if a given value is at the end of the input.
     *
     * @param string $word
     * @param bool   $identical
     *
     * @return \NilPortugues\Validator\Attribute\String\String
     */
    public function endsWith($word, $identical = false)
    {
        $this->addCondition(__METHOD__, [$word, $identical]);

        return $this;
    }

    /**
     * Validates if the input is contained in a specific haystack.
     *
     * @param string $haystack
     * @param bool   $identical
     *
     * @return \NilPortugues\Validator\Attribute\String\String
     */
    public function in($haystack, $identical = false)
    {
        $this->addCondition(__METHOD__, [$haystack, $identical]);

        return $this;
    }

    /**
     * Validates all characters that are graphically represented.
     *
     * @return \NilPortugues\Validator\Attribute\String\String
     */
    public function hasGraphicalCharsOnly()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /**
     * @param integer $length
     *
     * @return \NilPortugues\Validator\Attribute\String\String
     */
    public function hasLength($length)
    {
        $this->addCondition(__METHOD__, [$length], ['size' => $length]);

        return $this;
    }

    /**
     * Validates if string characters are lowercase in the input.
     *
     * @return \NilPortugues\Validator\Attribute\String\String
     */
    public function isLowercase()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /**
     * Validates if the given input is not empty or in other words is input mandatory and required.
     * This function also takes whitespace into account, use noWhitespace() if no spaces or line breaks
     * and other whitespace anywhere in the input is desired
     *
     * @return \NilPortugues\Validator\Attribute\String\String
     */
    public function notEmpty()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /**
     * Validates if a string contains no whitespace (spaces, tabs and line breaks).
     *
     * @return \NilPortugues\Validator\Attribute\String\String
     */
    public function noWhitespace()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /**
     * Validates all characters that are graphically printable.
     *
     * @return \NilPortugues\Validator\Attribute\String\String
     */
    public function hasPrintableCharsOnly()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /**
     * Accepts only punctuation characters.
     *
     * @return \NilPortugues\Validator\Attribute\String\String
     */
    public function isPunctuation()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /**
     * Evaluates a regex on the input and validates if matches.
     *
     * @param string $regex
     *
     * @return \NilPortugues\Validator\Attribute\String\String
     */
    public function matchesRegex($regex)
    {
        $this->addCondition(__METHOD__, [$regex]);

        return $this;
    }

    /**
     * Validates slug-like strings.
     *
     * @return \NilPortugues\Validator\Attribute\String\String
     */
    public function isSlug()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /**
     * @param
     *
     * @return \NilPortugues\Validator\Attribute\String\String
     */
    public function isSpace()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /**
     * This validator validates only if the value is at the beginning of a string.
     *
     * @param mixed $word
     * @param bool  $identical
     *
     * @return \NilPortugues\Validator\Attribute\String\String
     */
    public function startsWith($word, $identical = false)
    {
        $this->addCondition(__METHOD__, [$word, $identical]);

        return $this;
    }

    /**
     * Validates if string characters are uppercase in the input.
     *
     * @return \NilPortugues\Validator\Attribute\String\String
     */
    public function isUppercase()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /**
     * Validates version numbers using Semantic Versioning. Eg: 1.0.0
     *
     * @return \NilPortugues\Validator\Attribute\String\String
     */
    public function isVersion()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /**
     * Validates strings that contains only vowels.
     *
     * @return \NilPortugues\Validator\Attribute\String\String
     */
    public function isVowel()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /**
     * Accepts an hexadecimal number,  however, that it doesn't accept strings starting with 0x.
     *
     * @return \NilPortugues\Validator\Attribute\String\String
     */
    public function isHexDigit()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /**
     * @param int $amount
     *
     * @return $this
     */
    public function hasLowercase($amount = null)
    {
        $this->addCondition(__METHOD__, [$amount]);

        return $this;
    }

    /**
     * @param int $amount
     *
     * @return $this
     */
    public function hasUppercase($amount = null)
    {
        $this->addCondition(__METHOD__, [$amount]);

        return $this;
    }

    /**
     * @param int $amount
     *
     * @return $this
     */
    public function hasNumeric($amount = null)
    {
        $this->addCondition(__METHOD__, [$amount]);

        return $this;
    }

    /**
     * @param integer $amount
     *
     * @return $this
     */
    public function hasSpecialCharacters($amount = null)
    {
        $this->addCondition(__METHOD__, [$amount]);

        return $this;
    }

    /**
     * @return $this
     */
    public function isEmail()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /**
     * @return $this
     */
    public function isUrl()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /**
     * @param bool $strict
     *
     * @return $this
     */
    public function isUUID($strict = true)
    {
        $this->addCondition(__METHOD__, [$strict]);

        return $this;
    }
}
