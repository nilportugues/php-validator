<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 12/30/14
 * Time: 1:13 AM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\Validator;

/**
 * Class BaseValidator
 * @package NilPortugues\Validator
 */
abstract class BaseValidator
{
    /**
     * @var array
     */
    protected $errors = [];

    /**
     * @var AbstractValidator
     */
    protected $validator;

    /**
     * @var string
     */
    protected $type = 'string';

    /**
     * @var array
     */
    protected $rules = [];

    /**
     * @param string $name
     * @param string  $value
     * @param bool   $stopOnError
     *
     * @return bool
     */
    public function validate($name, $value, $stopOnError = false)
    {
        $this->errors = [];

        if (null === $this->validator) {
            $this->validator  = Validator::create($name, $this->type, $this->rules);
        }

        $isValid = $this->validator->validate($value, $stopOnError);

        if (false === $isValid) {
            $this->errors = $this->validator->getErrors();
        }

        return $isValid;
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }
}
