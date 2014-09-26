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
     * @param array     $errorMessages
     * @param array     $functionMap
     */
    public function __construct(Validator $validator, array &$errorMessages, array &$functionMap)
    {
        parent::__construct($validator, $errorMessages, $functionMap);

        $this->addCondition(__METHOD__);
    }

    /**
     * @param \NilPortugues\Validator\AbstractValidator $valueValidator
     * @param \NilPortugues\Validator\AbstractValidator $keyValidator
     *
     * @return $this
     */
    public function each(AbstractValidator $valueValidator, AbstractValidator $keyValidator = null)
    {
        $this->addCondition(__METHOD__, [$valueValidator, $keyValidator], [], true);

        return $this;
    }

    /**
     * @param \NilPortugues\Validator\AbstractValidator $keyValidator
     *
     * @return $this
     */
    public function hasKeyFormat(AbstractValidator $keyValidator)
    {
        $this->addCondition(__METHOD__, [$keyValidator], [], true);

        return $this;
    }

    /**
     * @param mixed $needle
     * @param bool  $strict
     *
     * @return $this
     */
    public function endsWith($needle, $strict = false)
    {
        $this->addCondition(__METHOD__, [$needle, $strict]);

        return $this;
    }

    /**
     * @param mixed $needle
     * @param bool  $strict
     *
     * @return $this
     */
    public function contains($needle, $strict = false)
    {
        $this->addCondition(__METHOD__, [$needle, $strict]);

        return $this;
    }

    /**
     * @param $keyName
     *
     * @return $this
     */
    public function hasKey($keyName)
    {
        $this->addCondition(__METHOD__, [$keyName]);

        return $this;
    }

    /**
     * @param integer $length
     *
     * @return $this
     */
    public function hasLength($length)
    {
        $this->addCondition(__METHOD__, [$length]);

        return $this;
    }

    /**
     * @return $this
     */
    public function isNotEmpty()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }

    /**
     * @param      $needle
     * @param bool $strict
     *
     * @return $this
     */
    public function startsWith($needle, $strict = false)
    {
        $this->addCondition(__METHOD__, [$needle, $strict]);

        return $this;
    }
}
