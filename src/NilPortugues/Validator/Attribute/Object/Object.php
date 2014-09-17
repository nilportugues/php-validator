<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/16/14
 * Time: 9:18 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\Validator\Attribute\Object;

use NilPortugues\Validator\AbstractValidator;
use NilPortugues\Validator\Validator;

/**
 * Class Object
 * @package NilPortugues\Validator\Attribute\Object
 */
class Object extends AbstractValidator
{
    /**
     * @param Validator $validator
     */
    public function __construct(Validator $validator)
    {
        parent::__construct($validator);

        $this->addCondition(__METHOD__);
    }
}
