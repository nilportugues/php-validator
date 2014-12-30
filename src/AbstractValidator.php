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
     * @var array
     */
    protected $errorArray = [];

    /**
     * @param Validator $validator
     * @param array     $errorMessages
     * @param array     $functionMap
     */
    public function __construct(Validator $validator, array &$errorMessages, array &$functionMap)
    {
        $this->validator   = $validator;
        $this->functionMap = new ValidatorFunctionMap($this, $functionMap);
        $this->errorArray  = $errorMessages;
    }

    /**
     * @param string $classMethod
     * @param array  $arguments
     * @param array  $errorMessageValues
     * @param bool   $fetchValidatorErrors
     *
     * @return $this
     */
    protected function addCondition(
        $classMethod,
        array $arguments = [],
        array $errorMessageValues = [],
        $fetchValidatorErrors = false
    ) {
        $classMethod = explode("\\", $classMethod);
        $classMethod = array_pop($classMethod);

        $this->conditions[] = [
            'key'          => $classMethod,
            'arguments'    => $arguments,
            'values'       => $errorMessageValues,
            'is_validator' => $fetchValidatorErrors,
        ];

        return $this;
    }

    /**
     * @param      $value
     * @param bool $stopOnError
     *
     * @return bool
     */
    public function validate($value, $stopOnError = false)
    {
        $isValid          = true;
        $this->errors     = [];
        $this->conditions = array_filter($this->conditions);

        foreach ($this->conditions as $condition) {
            $arguments = $condition['arguments'];

            if (false === strpos('FileUpload::isUploaded', $condition['key'])) {
                $arguments = array_merge([$value], $condition['arguments']);
            }

            $isValid = $isValid && $this->functionMap->get(
                    $this->validator->getPropertyName(),
                    $condition['key'],
                    $arguments,
                    $condition['values'],
                    $this->errorArray
                );

            if (false === $isValid) {
                if ($condition['is_validator']) {
                    $this->getErrorsForValidatorsAsArguments($condition['arguments']);
                }

                if (true === $stopOnError) {
                    return false;
                }
            }
        }

        $this->conditions[] = [];

        return $isValid;
    }

    /**
     * @param $arguments
     */
    private function getErrorsForValidatorsAsArguments($arguments)
    {
        foreach ($arguments as $argument) {
            if ($argument instanceof AbstractValidator) {
                $this->errors = array_merge($this->errors, $argument->getErrors());
            }
        }
    }

    /**
     * @param string $error
     * @param        string $propertyName
     *
     * @return $this
     */
    public function setError($error, $propertyName)
    {
        $this->errors[$this->validator->getPropertyName()][$propertyName] = $error;

        return $this;
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setPropertyName($name)
    {
        $this->validator->setPropertyName($name);

        return $this;
    }
}
