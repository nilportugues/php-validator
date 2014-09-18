<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/16/14
 * Time: 9:10 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\Validator;

/**
 * Class AbstractValidator
 * @package NilPortugues\Validator
 */
abstract class AbstractValidator
{
    /**
     * @var Validator
     */
    protected $validator;

    /**
     * @var ValidatorFunctionMap
     */
    protected $functionMap;

    /**
     * @var array
     */
    protected $conditions = [];

    /**
     * @var array
     */
    protected $errors = [];

    /**
     * @param Validator $validator
     */
    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
        $this->functionMap = new ValidatorFunctionMap($this);
    }

    /**
     * @param       $classMethod
     * @param array $arguments
     *
     * @return $this
     */
    protected function addCondition($classMethod, $arguments = [])
    {
        $classMethod = explode("\\", $classMethod);
        $classMethod = array_pop($classMethod);

        $this->conditions[] = [
            'key' => $classMethod,
            'arguments' => $arguments,
        ];

        return $this;
    }

    /**
     * @param $value
     * @param bool $stopOnError
     *
     * @return bool
     */
    public function validate($value, $stopOnError = false)
    {
        $isValid = true;
        $this->errors = [];

        foreach ($this->conditions as $condition) {
            $arguments = array_merge([$value], $condition['arguments']);

            $isValid = $isValid && $this->functionMap->get($condition['key'], $arguments);

            if (true == $stopOnError && false === $isValid) {
                return false;
            }
        }

        $this->conditions[] = [];

        return $isValid;
    }

    /**
     * @param $error
     *
     * @return $this
     */
    public function setError($error)
    {
        $this->errors[$this->validator->getPropertyName()][] = $error;

        return $this;
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }
}
