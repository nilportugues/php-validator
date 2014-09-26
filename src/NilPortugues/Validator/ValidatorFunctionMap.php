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

use NilPortugues\Validator\Traits\FileUpload\FileUploadException;

/**
 * Class ValidatorFunctionMap
 * @package NilPortugues\Validator
 */
class ValidatorFunctionMap
{
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
     * @param array  $errorValues
     * @param array  $errors
     *
     * @throws \InvalidArgumentException
     * @return bool
     */
    public function get($propertyName, $funcName, array $arguments = [], array &$errorValues = [], array &$errors)
    {
        if (false === array_key_exists($funcName, $this->functionMap)) {
            throw new \InvalidArgumentException('Validator key not found');
        }

        $function = $this->functionMap[$funcName];
        $class    = explode("::", $function);

        try {
            $result = call_user_func_array([$class[0], $class[1]], $arguments);

            if (false === $result) {
                if (false === array_key_exists($funcName, $errors)) {
                    throw new \InvalidArgumentException('Validator key not found in error file');
                }

                if (strlen($errors[$funcName]) > 0) {
                    $this->validator->setError(
                        $this->buildErrorMessage($errorValues, $errors, $funcName, $propertyName)
                    );
                }
            }
        } catch (FileUploadException $e) {
            $this->validator->setError(
                $this->buildErrorMessage($errorValues, $errors, $e->getMessage(), $propertyName)
            );

            $result = false;
        }

        return $result;
    }

    /**
     * @param array  $errorValues
     * @param array  $errors
     * @param string $funcName
     * @param string $propertyName
     *
     * @return string
     */
    private function buildErrorMessage(array $errorValues, array &$errors, $funcName, $propertyName)
    {
        $message = str_replace(':attribute', $propertyName, $errors[$funcName]);

        foreach ($errorValues as $key => $value) {
            $message = str_replace(":{$key}", $value, $message);
        }

        return $message;
    }
}
