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
    private $functionMap = [];

    /**
     * @var AbstractValidator
     */
    private $validator;

    /**
     * @param AbstractValidator $abstractValidator
     * @param array             $functionMap
     */
    public function __construct(AbstractValidator $abstractValidator, array &$functionMap)
    {
        $this->validator   = $abstractValidator;
        $this->functionMap = $functionMap;
    }

    /**
     * Gets the function from the function map and runs it against the values.
     *
     * @param string $propertyName
     * @param string $funcName
     * @param array  $arguments
     * @param array  $errors
     *
     * @throws \InvalidArgumentException
     * @return bool
     */
    public function get($propertyName, $funcName, array $arguments = [], array &$errors)
    {
        if (false === array_key_exists($funcName, $this->functionMap)) {
            throw new \InvalidArgumentException('Validator key not found');
        }

        $function = $this->baseNamespace.$this->functionMap[$funcName];
        $class    = explode("::", $function);

        $result = call_user_func_array([$class[0], $class[1]], $arguments);

        if (false === $result) {
            if (false === array_key_exists($funcName, $errors)) {
                throw new \InvalidArgumentException('Validator key not found in error file');
            }

            $this->validator->setError(
                $this->buildErrorMessage($errors, $funcName, $propertyName, $arguments)
            );
        }

        return $result;
    }

    /**
     * @param array  $errors
     * @param string $funcName
     * @param string $propertyName
     * @param array  $arguments
     *
     * @return mixed
     */
    private function buildErrorMessage(array &$errors, $funcName, $propertyName, array &$arguments)
    {
        $message = str_replace(':attribute', $propertyName, $errors[$funcName]);

        return $message;
    }
}
