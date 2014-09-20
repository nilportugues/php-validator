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

    /**
     * @param \NilPortugues\Validator\AbstractValidator $valueValidator
     * @param \NilPortugues\Validator\AbstractValidator $keyValidator
     *
     * @return $this
     */
    public function each(AbstractValidator $valueValidator, AbstractValidator $keyValidator = null)
    {
        $this->addCondition(__METHOD__, [$valueValidator, $keyValidator], true);

        return $this;
    }

    /**
     * @param \NilPortugues\Validator\AbstractValidator $keyValidator
     *
     * @return $this
     */
    public function hasKeyFormat(AbstractValidator $keyValidator)
    {
        $this->addCondition(__METHOD__, [$keyValidator], true);

        return $this;
    }

    /**
     * @param array $haystack
     * @param mixed $needle
     * @param bool  $strict
     *
     * @return $this
     */
    public function endsWith(array $haystack, $needle, $strict = false)
    {
        $this->addCondition(__METHOD__, [$haystack, $needle, $strict]);

        return $this;
    }

    /**
     * @param array $haystack
     * @param mixed $needle
     * @param bool  $strict
     *
     * @return $this
     */
    public function in(array $haystack, $needle, $strict = false)
    {
        $this->addCondition(__METHOD__, [$haystack, $needle, $strict]);

        return $this;
    }

    /**
     * @param array $haystack
     * @param mixed $needle
     * @param bool  $strict
     *
     * @return $this
     */
    public function contains(array $haystack, $needle, $strict = false)
    {
        $this->addCondition(__METHOD__, [$haystack, $needle, $strict]);

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
     * @param $length
     *
     * @return $this
     */
    public function length($length)
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
     * @param array $haystack
     * @param       $needle
     * @param bool  $strict
     *
     * @return $this
     */
    public function startsWith(array $haystack, $needle, $strict = false)
    {
        $this->addCondition(__METHOD__, [$haystack, $needle, $strict]);

        return $this;
    }
}
