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
     * @var Validator
     */
    protected $validator;

    /**
     * @param Validator $validator
     */
    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @param string $name
     * @param string $type
     * @param array  $rules
     *
     * @throws Factory\ValidatorFactoryException
     * @return AbstractValidator
     */
    public function create($name, $type, array &$rules = [])
    {
        if (false === ValidatorType::isSupported($type)) {
            throw new ValidatorFactoryException(
                sprintf('The provided validator type \'%s\' is not supported.', $type)
            );
        }

        $validator = $this->createValidator($name, $type);
        return $this->applyValidatorRules($validator, $rules);
    }

    /**
     * @param string $name
     * @param string $type
     *
     * @return AbstractValidator
     */
    private function createValidator($name, $type)
    {
        return call_user_func_array([$this->validator, ValidatorType::getMethod($type)], [$name]);
    }

    /**
     * @param AbstractValidator $validator
     * @param array $rules
     *
     * @return AbstractValidator
     */
    private function applyValidatorRules($validator, array &$rules)
    {
        $validatorRule = ValidatorRule::getInstance();
        foreach ($rules as $rule) {
            list($functionName, $arguments) = $validatorRule->parseRule($validator, $rule);
            $validator = call_user_func_array([$validator, $functionName], $arguments);
        }

        return $validator;
    }
}
