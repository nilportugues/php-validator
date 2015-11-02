<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 12/29/14
 * Time: 8:57 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\Validator;

use NilPortugues\Validator\Factory\ValidatorFactoryException;
use NilPortugues\Validator\Factory\ValidatorRule;
use NilPortugues\Validator\Factory\ValidatorType;

/**
 * Class ValidatorFactory
 * @package NilPortugues\Validator
 */
class ValidatorFactory
{
    /**
     * @param string $name
     * @param string $type
     * @param string[]  $rules
     *
     * @throws Factory\ValidatorFactoryException
     * @return AbstractValidator
     */
    public static function create($name, $type, array $rules = [])
    {
        if (false === ValidatorType::isSupported($type)) {
            throw new ValidatorFactoryException(
                \sprintf('The provided validator type \'%s\' is not supported.', $type)
            );
        }


        $validator = self::createValidator($name, $type);

        return self::applyValidatorRules($validator, $rules);
    }

    /**
     * @param string $name
     * @param string $type
     *
     * @return AbstractValidator
     */
    private static function createValidator($name, $type)
    {
        return \call_user_func_array([Validator::create(), ValidatorType::getMethod($type)], [$name]);
    }

    /**
     * @param AbstractValidator $validator
     * @param string[] $rules
     *
     * @return AbstractValidator
     */
    private static function applyValidatorRules($validator, array &$rules)
    {
        $validatorRule = ValidatorRule::getInstance();
        foreach ($rules as $rule) {
            list($functionName, $arguments) = $validatorRule->parseRule($validator, $rule);
            $validator = \call_user_func_array([$validator, $functionName], $arguments);
        }

        return $validator;
    }
}
