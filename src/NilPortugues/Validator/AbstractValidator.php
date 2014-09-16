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
     * @param Validator $validator
     */
    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
        $this->functionMap = new ValidatorFunctionMap();
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
     *
     * @return bool
     */
    public function validate($value)
    {
        $isValid = true;

        foreach ($this->conditions as $condition) {
            $arguments = array_merge([$value], $condition['arguments']);
            $isValid = $isValid && $this->functionMap->get($condition['key'], $arguments);
        }

        return $isValid;
    }
}
