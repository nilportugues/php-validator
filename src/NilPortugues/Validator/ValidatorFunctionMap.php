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

        //Generic
        'Generic::isRequired' => '\GenericTrait::isRequired',
        'Generic::isNotNull' => '\GenericTrait::isNotNull',

        //Float
        "Float::__construct"  => '\Float\FloatTrait::isFloat',
        'Float::isRequired' => '\Float\FloatTrait::isRequired',
        "Float::isNotZero"   => '\Float\FloatTrait::isNotZero',
        "Float::isPositive"   => '\Float\FloatTrait::isPositive',
        "Float::isNegative"   => '\Float\FloatTrait::isNegative',
        "Float::isBetween"    => '\Float\FloatTrait::isBetween',
        'Float::isOdd' => '\Float\FloatTrait::isOdd',
        'Float::isEven' => '\Float\FloatTrait::isEven',
        'Float::isMultiple' => '\Float\FloatTrait::isMultiple',

        //Integer
        "Integer::__construct"  => '\Integer\IntegerTrait::isInteger',
        'Integer::isRequired' => '\Integer\IntegerTrait::isRequired',
        "Integer::isNotZero"   => '\Integer\IntegerTrait::isNotZero',
        "Integer::isPositive"   => '\Integer\IntegerTrait::isPositive',
        "Integer::isNegative"   => '\Integer\IntegerTrait::isNegative',
        "Integer::isBetween"    => '\Integer\IntegerTrait::isBetween',
        'Integer::isOdd' => '\Integer\IntegerTrait::isOdd',
        'Integer::isEven' => '\Integer\IntegerTrait::isEven',
        'Integer::isMultiple' => '\Integer\IntegerTrait::isMultiple',

        //String
        'String::__construct' => '\String\StringTrait::isString',
        'String::isAlphanumeric' => '\String\StringTrait::isAlphanumeric',
        'String::isAlpha' => '\String\StringTrait::isAlpha',
        'String::isBetween' => '\String\StringTrait::isBetween',
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
        'String::hasLowercase' => '\String\StringTrait::hasLowercase',
        'String::hasUppercase' => '\String\StringTrait::hasUppercase',
        'String::hasNumeric' => '\String\StringTrait::hasNumeric',
        'String::hasSpecialCharacters' => '\String\StringTrait::hasSpecialCharacters',
        'String::isEmail' => '\String\StringTrait::isEmail',

        //Object
        'Object::__construct' => '\Object\ObjectTrait::isObject',
        'Object::isInstanceOf' => '\Object\ObjectTrait::isInstanceOf',
        'Object::hasProperty' => '\Object\ObjectTrait::hasProperty',
        'Object::hasMethod' => '\Object\ObjectTrait::hasMethod',
        'Object::hasParentClass' => '\Object\ObjectTrait::hasParentClass',
        'Object::isChildOf' => '\Object\ObjectTrait::isChildOf',
        'Object::inheritsFrom' => '\Object\ObjectTrait::inheritsFrom',
        'Object::hasInterface' => '\Object\ObjectTrait::hasInterface',

        //Collection
        'Collection::__construct' => '\Collection\CollectionTrait::isArray',
        'Collection::each' => '\Collection\CollectionTrait::each',
        'Collection::hasKeyFormat' => '\Collection\CollectionTrait::hasKeyFormat',
        'Collection::endsWith' => '\Collection\CollectionTrait::endsWith',
        'Collection::contains' => '\Collection\CollectionTrait::contains',
        'Collection::hasKey' => '\Collection\CollectionTrait::hasKey',
        'Collection::length' => '\Collection\CollectionTrait::length',
        'Collection::isNotEmpty' => '\Collection\CollectionTrait::isNotEmpty',
        'Collection::startsWith' => '\Collection\CollectionTrait::startsWith',
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
