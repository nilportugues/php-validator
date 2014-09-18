<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/16/14
 * Time: 9:42 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\Validator;

use NilPortugues\Validator\Traits\Integer\IntegerTrait;

/**
 * Class ValidatorFunctionMap
 * @package NilPortugues\Validator
 */
class ValidatorFunctionMap
{
    /**
     * @var string
     */
    private $baseNamespace = 'NilPortugues\Validator\Traits';

    /**
     * @var array
     */
    private $functionMap = [

        //Float

        //Integer
        "Integer::__construct"  => '\Integer\IntegerTrait::isInteger',
        "Integer::isNotZero"   => '\Integer\IntegerTrait::isNotZero',
        "Integer::isPositive"   => '\Integer\IntegerTrait::isPositive',
        "Integer::isNegative"   => '\Integer\IntegerTrait::isNegative',
        "Integer::isBetween"    => '\Integer\IntegerTrait::isBetween',

        //String
        'String::__construct' => '\String\StringTrait::isString',
        'String::isAlphanumeric' => '\String\StringTrait::isAlphanumeric',
        'String::isAlpha' => '\String\StringTrait::isAlpha',
        'String::between' => '\String\StringTrait::between',
        'String::isCharset' => '\String\StringTrait::isCharset',
        'String::isAllConsonants' => '\String\StringTrait::isAllConsonants',
        'String::contains' => '\String\StringTrait::contains',
        'String::isControlCharacters' => '\String\StringTrait::isControlCharacters',
        'String::isDigit' => '\String\StringTrait::isDigit',
        'String::endsWith' => '\String\StringTrait::endsWith',
        'String::equals' => '\String\StringTrait::equals',
        'String::in' => '\String\StringTrait::in',
        'String::hasGraphicalCharsOnly' => '\String\StringTrait::hasGraphicalCharsOnly',
        'String::hasLength' => '\String\StringTrait::hasLength',
        'String::isLowercase' => '\String\StringTrait::isLowercase',
        'String::notEmpty' => '\String\StringTrait::notEmpty',
        'String::noWhitespace' => '\String\StringTrait::noWhitespace',
        'String::hasPrintableCharsOnly' => '\String\StringTrait::hasPrintableCharsOnly',
        'String::isPunctuation' => '\String\StringTrait::isPunctuation',
        'String::matchesRegex' => '\String\StringTrait::matchesRegex',
        'String::isSlug' => '\String\StringTrait::isSlug',
        'String::isSpace' => '\String\StringTrait::isSpace',
        'String::startsWith' => '\String\StringTrait::startsWith',
        'String::isUppercase' => '\String\StringTrait::isUppercase',
        'String::isVersion' => '\String\StringTrait::isVersion',
        'String::isVowel' => '\String\StringTrait::isVowel',
        'String::isHexDigit' => '\String\StringTrait::isHexDigit',

        //Object

    ];

    /**
     * @var AbstractValidator
     */
    private $validator;

    /**
     * @param AbstractValidator $validator
     */
    public function __construct(AbstractValidator $validator)
    {
        $this->validator = $validator;
    }

    /**
     * Gets the function from the function map and runs it against the values.
     *
     * @param       $funcName
     * @param array $arguments
     *
     * @return bool
     * @throws \InvalidArgumentException
     */
    public function get($funcName, array $arguments = [])
    {
        if (!array_key_exists($funcName, $this->functionMap)) {
            throw new \InvalidArgumentException('Validator key not found');
        }

        $function = $this->baseNamespace.$this->functionMap[$funcName];
        $class = explode("::", $function);

        $result = call_user_func_array([$class[0], $class[1]], $arguments);

        if (false === $result) {
            $this->validator->setError('get the error message');
        }

        return $result;
    }
}
