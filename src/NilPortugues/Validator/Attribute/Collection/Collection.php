<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/16/14
 * Time: 9:16 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\Validator\Attribute\Collection;

use NilPortugues\Validator\AbstractValidator;
use NilPortugues\Validator\Validator;

/**
 * Class Collection
 * @package NilPortugues\Validator\Attribute\Collection
 */
class Collection extends AbstractValidator
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
