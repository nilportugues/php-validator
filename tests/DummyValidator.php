<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 12/30/14
 * Time: 1:15 AM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\NilPortugues\Validator;

use NilPortugues\Validator\BaseValidator;

/**
 * Class DummyValidator
 * @package Tests\NilPortugues\Validator
 */
class DummyValidator extends BaseValidator
{
    /**
     * Type of validation to use.
     * For all the possible options check the documentation at https://github.com/nilportugues/validator
     *
     * @var string
     */
    protected $type = 'string';

    /**
     * Constrains for the $type defined.
     * For all the possible options check the documentation at https://github.com/nilportugues/validator
     *
     * @var array
     */
    protected $rules = [
        'is_required',
        'is_between:1:255',
        'is_email'
    ];
}
