<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 12/29/14
 * Time: 9:53 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\Validator\Factory;

/**
 * Class ValidatorRule
 * @package NilPortugues\Validator\Factory
 */
class ValidatorRule
{
    protected static $rules = [];

    /**
     *
     */
    protected function __construct()
    {
    }

    /**
     * @return static
     */
    public static function getInstance()
    {
        static $instance = null;
        if (null === $instance) {
            $instance = new static();
        }

        return $instance;
    }

    /**
     * @param \NilPortugues\Validator\AbstractValidator $validatorType
     * @param                                           $rule
     *
     * @return array
     */
    public static function parseRule($validatorType, $rule)
    {
        $className = get_class($validatorType);

        if (empty(self::$rules[$className])) {
            self::buildRules($validatorType, $className);
        }

        $ruleName   = explode(":", $rule);
        $methodName = self::getMethodName($className, $ruleName[0]);

        $arguments = substr($rule, strlen($ruleName[0]) + 1, strlen($rule));
        $arguments = explode(":", $arguments);
        $arguments = self::convertStringBooleanToBoolean($arguments);

        return [$methodName, $arguments];
    }

    /**
     * @param \NilPortugues\Validator\AbstractValidator $validatorType
     * @param string                                    $key
     */
    private static function buildRules($validatorType, $key)
    {
        $classMethods = self::extractValidatorMethods($validatorType);
        $funcMethods  = [];

        foreach ($classMethods as $method) {
            $camelCase               = self::camelCaseToUnderscore($method);
            $funcMethods[$method]    = $method;
            $funcMethods[$camelCase] = $method;

            if (self::startsWith($camelCase, 'is_') || self::startsWith($camelCase, 'has_')) {
                $methodAlias               = str_replace(['is_', 'has_'], '', $camelCase);
                $funcMethods[$methodAlias] = $method;
            }
        }

        self::$rules[$key] = $funcMethods;
    }

    /**
     * @param \NilPortugues\Validator\AbstractValidator $validatorType
     *
     * @return array
     */
    private static function extractValidatorMethods($validatorType)
    {
        $classMethods = get_class_methods($validatorType);
        $remove       = ['__construct', 'validate', 'setError', 'getErrors'];

        return self::unsetValues($classMethods, $remove);
    }

    /**
     * @param array $data
     * @param string[] $removeValues
     *
     * @return array
     */
    private static function unsetValues(array &$data, array &$removeValues)
    {
        foreach ($removeValues as $value) {
            $position = array_search($value, $data);
            if ($position !== false) {
                unset($data[$position]);
            }
        }
        return $data;
    }

    /**
     * @param         $camel
     * @param  string $splitter
     *
     * @return string
     */
    private static function camelCaseToUnderscore($camel, $splitter = "_")
    {
        $camel = preg_replace(
            '/(?!^)[[:upper:]][[:lower:]]/',
            '$0',
            preg_replace('/(?!^)[[:upper:]]+/', $splitter . '$0', $camel)
        );

        return strtolower($camel);
    }

    /**
     * @param string $haystack
     * @param string $needle
     *
     * @return bool
     */
    private static function startsWith($haystack, $needle)
    {
        return substr($haystack, 0, strlen($needle)) === $needle;
    }

    /**
     * @param string $key
     * @param $rule
     *
     * @return string
     */
    private static function getMethodName($key, $rule)
    {
        return self::$rules[$key][$rule];
    }

    /**
     * @param $arguments
     *
     * @return mixed
     */
    private static function convertStringBooleanToBoolean($arguments)
    {
        $toBoolean = ['true' => true, 'false' => false];

        foreach ($arguments as &$argument) {
            $toLower = strtolower($argument);
            if (array_key_exists($toLower, $toBoolean)) {
                $argument = $toBoolean[$toLower];
            }
        }
        return $arguments;
    }

    /**
     *
     */
    private function __clone()
    {
    }
}
