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

use NilPortugues\Validator\AbstractValidator;
use NilPortugues\Validator\Validator;

/**
 * Class String
 * @package NilPortugues\Validator\Attribute\String
 */
class String extends AbstractValidator
{
    /**
     * @param Validator $validator
     */
    public function __construct(Validator $validator)
    {
        parent::__construct($validator);

        $this->addCondition(__METHOD__);
    }

    /**
     * Validates alphanumeric characters from a-Z and 0-9
     *
     * @return \NilPortugues\Validator\Attribute\String\String
     */
    public function alnum()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /**
     * Validates alphanumeric characters from a-Z, white spaces and empty values.
     *
     * @return \NilPortugues\Validator\Attribute\String\String
     */
    public function alpha()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /**
     * Validates is a string is between ranges.
     *
     * @param      $start
     * @param      $end
     * @param bool $inclusive
     *
     * @return \NilPortugues\Validator\Attribute\String\String
     */
    public function between($start, $end, $inclusive = false)
    {
        $this->addCondition(__METHOD__, [$start, $end, $inclusive]);

        return $this;
    }

    /**
     * Validates if a string is in a specific charset
     *
     * @param array $charsetNames
     *
     * @return \NilPortugues\Validator\Attribute\String\String
     */
    public function charset(array $charsetNames)
    {
        $this->addCondition(__METHOD__, [$charsetNames]);

        return $this;
    }

    /**
     * Validates strings that contain only consonants.
     *
     * @return \NilPortugues\Validator\Attribute\String\String
     */
    public function hasOnlyConsonants()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /**
     * Validates if the input is equal some value.
     *
     * @param string $comparedValue
     * @param bool $identical
     *
     * @return \NilPortugues\Validator\Attribute\String\String
     */
    public function equals($comparedValue, $identical = false)
    {
        $this->addCondition(__METHOD__, [$comparedValue, $identical]);

        return $this;
    }

    /**
     * @param  bool                                            $identical
     * @return \NilPortugues\Validator\Attribute\String\String
     */
    public function contains($identical = false)
    {
        $this->addCondition(__METHOD__, [$identical]);

        return $this;
    }

    /**
     * Only accepts control characters.
     *
     * @return \NilPortugues\Validator\Attribute\String\String
     */
    public function controlCharacters()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /**
     * Validates a value that doesn't allow a-Z, but accepts empty values and whitespace.
     *
     * @return \NilPortugues\Validator\Attribute\String\String
     */
    public function digit()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /**
     * Validates if a given value is at the end of the input.
     *
     * @param string $word
     *
     * @return \NilPortugues\Validator\Attribute\String\String
     */
    public function endsWith($word)
    {
        $this->addCondition(__METHOD__, [$word]);

        return $this;
    }

    /**
     * Validates if the input is contained in a specific haystack.
     *
     * @param string $haystack
     * @param bool $identical
     *
     * @return \NilPortugues\Validator\Attribute\String\String
     */
    public function in($haystack, $identical=false)
    {
        $this->addCondition(__METHOD__, [$haystack, $identical]);

        return $this;
    }

    /**
     * Validates all characters that are graphically represented.
     *
     * @return \NilPortugues\Validator\Attribute\String\String
     */
    public function isGraphical()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /**
     * @param integer $min
     * @param integer $max
     * @param bool $inclusive
     *
     * @return \NilPortugues\Validator\Attribute\String\String
     */
    public function hasLength($min, $max, $inclusive=false)
    {
        $this->addCondition(__METHOD__, [$min, $max, $inclusive]);

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
    public function printable()
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
     * @param $regex
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
     * @param $word
     *
     * @return \NilPortugues\Validator\Attribute\String\String
     */
    public function startsWith($word)
    {
        $this->addCondition(__METHOD__, [$word]);

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
    public function version()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }
    /**
     * Validates strings that contains only vowels.
     *
     * @return \NilPortugues\Validator\Attribute\String\String
     */
    public function hasOnlyVowels()
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
}