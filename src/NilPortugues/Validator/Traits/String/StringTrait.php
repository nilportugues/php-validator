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
    public static function isAlphanumeric($value)
    {
        return ctype_alnum($value);
    }

    /**
     * @param $value
     * @return bool
     */
    public static function isAlpha($value)
    {
        return ctype_alpha($value);
    }

    /**
     * @param      $value
     * @param      $min
     * @param      $max
     * @param bool $inclusive
     *
     * @throws \InvalidArgumentException
     * @return bool
     */
    public static function isBetween($value, $min, $max, $inclusive = false)
    {
        settype($min, 'int');
        settype($max, 'int');
        settype($inclusive, 'bool');

        $length = mb_strlen($value, mb_detect_encoding($value));

        if ($min > $max) {
            throw new \InvalidArgumentException(sprintf('%s cannot be less than  %s for validation', $min, $max));
        }

        if (false === $inclusive) {
            return $min < $length && $length < $max;
        }

        return $min <= $length && $length <= $max;
    }

    /**
     * @param $value
     * @param $charset
     *
     * @return bool
     */
    public static function isCharset($value, $charset)
    {
        $available = mb_list_encodings();

        $charset = is_array($charset) ? $charset : array($charset);

        $charsetList = array_filter($charset, function ($charsetName) use ($available) {
            return in_array($charsetName, $available, true);
        });

        $detectedEncoding = mb_detect_encoding($value, $charset, true);

        return in_array($detectedEncoding, $charsetList, true);
    }

    /**
     * @param $value
     * @return bool
     */
    public static function isAllConsonants($value)
    {
        return preg_match('/^(\s|[b-df-hj-np-tv-zB-DF-HJ-NP-TV-Z])+$/', $value) > 0;
    }

    /**
     * @param      $value
     * @param      $contains
     * @param bool $identical
     *
     * @return bool
     */
    public static function contains($value, $contains, $identical = false)
    {
        if (false === $identical) {
            return false !== mb_stripos($value, $contains, 0, mb_detect_encoding($value));
        }

        return false !== mb_strpos($value, $contains, 0, mb_detect_encoding($value));
    }

    /**
     * @param $value
     * @return bool
     */
    public static function isControlCharacters($value)
    {
        return ctype_cntrl($value);
    }

    /**
     * @param $value
     * @return bool
     */
    public static function isDigit($value)
    {
        return ctype_digit($value);
    }

    /**
     * @param      $value
     * @param      $contains
     * @param bool $identical
     *
     * @return bool
     */
    public static function endsWith($value, $contains, $identical = false)
    {
        $enc = mb_detect_encoding($value);

        if (false === $identical) {
            return mb_strripos($value, $contains, -1, $enc) === (mb_strlen($value, $enc) - mb_strlen($contains, $enc));
        }

        return mb_strrpos($value, $contains, 0, $enc) === (mb_strlen($value, $enc) - mb_strlen($contains, $enc));
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
    public static function equals($value, $comparedValue, $identical = false)
    {
        if (false === $identical) {
            return $value == $comparedValue;
        }

        return $value === $comparedValue;
    }

    /**
     * @param      $value
     * @param      $haystack
     * @param bool $identical
     *
     * @return bool
     */
    public static function in($value, $haystack, $identical = false)
    {
        $haystack = (string) $haystack;
        $enc = mb_detect_encoding($value);

        if (false === $identical) {
            return (false !== mb_stripos($haystack, $value, 0, $enc));
        }

        return (false !== mb_strpos($haystack, $value, 0, $enc));
    }

    /**
     * @param $value
     * @return bool
     */
    public static function hasGraphicalCharsOnly($value)
    {
        return ctype_graph($value);
    }

    /**
     * @param   $value
     * @param   $length
     *
     * @return bool
     */
    public static function hasLength($value, $length)
    {
        settype($length, 'int');

        return mb_strlen($value, mb_detect_encoding($value)) === $length;
    }

    /**
     * @param $value
     * @return bool
     */
    public static function isLowercase($value)
    {
        return $value === mb_strtolower($value, mb_detect_encoding($value));
    }

    /**
     * @param $value
     * @return bool
     */
    public static function notEmpty($value)
    {
        $value = trim($value);

        return !empty($value);
    }

    /**
     * @param $value
     * @return bool
     */
    public static function noWhitespace($value)
    {
        return 0 === preg_match('/\s/',$value);
    }

    /**
     * @param $value
     * @return bool
     */
    public static function hasPrintableCharsOnly($value)
    {
        return ctype_print($value);
    }

    /**
     * @param $value
     * @return bool
     */
    public static function isPunctuation($value)
    {
        return ctype_punct($value);
    }

    /**
     * @param $value
     * @param $regex
     *
     * @return bool
     */
    public static function matchesRegex($value, $regex)
    {
        return preg_match($regex, $value) > 0;
    }

    /**
     * @param $value
     * @return bool
     */
    public static function isSlug($value)
    {
        if ((false !== strstr($value, '--'))
        || (!preg_match('@^[0-9a-z\-]+$@', $value))
        || (preg_match('@^-|-$@', $value))
        ) {
            return false;
        }

        return true;
    }

    /**
     * @param $value
     * @return bool
     */
    public static function isSpace($value)
    {
        return ctype_space($value);
    }

    /**
     * @param      $value
     * @param      $contains
     * @param bool $identical
     *
     * @return bool
     */
    public static function startsWith($value, $contains, $identical = false)
    {
        $enc = mb_detect_encoding($value);

        if (false === $identical) {
            return 0 === mb_stripos($value, $contains, 0, $enc);
        }

        return 0 === mb_strpos($value, $contains, 0, $enc);
    }

    /**
     * @param $value
     * @return bool
     */
    public static function isUppercase($value)
    {
        return $value === mb_strtoupper($value, mb_detect_encoding($value));
    }

    /**
     * @param $value
     * @return bool
     */
    public static function isVersion($value)
    {
        return preg_match('/^[0-9]+\.[0-9]+(\.[0-9]*)?([+-][^+-][0-9A-Za-z-.]*)?$/', $value) > 0;
    }

    /**
     * @param $value
     * @return bool
     */
    public static function isVowel($value)
    {
        return preg_match('/^(\s|[aeiouAEIOU])*$/', $value) > 0;
    }

    /**
     * @param $value
     * @return bool
     */
    public static function isHexDigit($value)
    {
        return ctype_xdigit($value);
    }

    /**
     * @param      $value
     * @param null $amount
     *
     * @return bool
     */
    public static function hasLowercase($value, $amount = null)
    {
        return self::hasStringSubset($value, $amount, '/[a-z]/');
    }

    /**
     * @param $value
     * @param $amount
     * @param $regex
     *
     * @return bool
     */
    private static function hasStringSubset($value, $amount, $regex)
    {
        settype($value, 'string');

        $minMatches = 1;
        if (!empty($amount)) {
            $minMatches = $amount;
        }

        $value = preg_replace('/\s+/', '', $value);
        $length = strlen($value);

        $counter = 0;
        for ($i = 0; $i<$length; $i++) {
            if (preg_match($regex, $value[$i])>0) {
                $counter++;
            }

            if ($counter === $minMatches) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param      $value
     * @param null $amount
     *
     * @return bool
     */
    public static function hasUppercase($value, $amount = null)
    {
        return self::hasStringSubset($value, $amount, '/[A-Z]/');
    }

    /**
     * @param      $value
     * @param null $amount
     *
     * @return bool
     */
    public static function hasNumeric($value, $amount = null)
    {
        return self::hasStringSubset($value, $amount, '/[0-9]/');
    }

    /**
     * @param      $value
     * @param null $amount
     *
     * @return bool
     */
    public static function hasSpecialCharacters($value, $amount = null)
    {
        return self::hasStringSubset($value, $amount, '/[^a-zA-Z\d\s]/');
    }

    /**
     * @param $value
     *
     * @return bool
     */
    public static function isEmail($value)
    {
        settype($value, 'string');

        return preg_match('/^[A-Z0-9._%\-+]+@(?:[A-Z0-9\-]+\.)+(?:[A-Z0-9\-]+)$/i', $value) > 0;
    }
}
