<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/20/14
 * Time: 11:22 AM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\Validator\Attribute;

use NilPortugues\Validator\AbstractValidator;

/**
 * Class Generic
 * @package NilPortugues\Validator\Attribute
 */
class Generic extends AbstractValidator
{
    /**
     * @return $this
     */
    public function isRequired()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /**
     * @return $this
     */
    public function isNotNull()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }
}
