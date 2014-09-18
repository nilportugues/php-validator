<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/18/14
 * Time: 8:47 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\NilPortugues\Validator\Attribute\Numeric;

use NilPortugues\Validator\Validator;

/**
 * Class FloatTest
 * @package Tests\NilPortugues\Validator\Attribute\Numeric
 */
class FloatTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return \NilPortugues\Validator\Attribute\Numeric\Float
     */
    protected function getValidator()
    {
        $validator = new Validator();

        return $validator->isFloat('propertyName');
    }

    /**
     * @test
     */
    public function it_should_check_it_is_Float()
    {
        $this->assertTrue($this->getValidator()->validate(1.10));
        $this->assertFalse($this->getValidator()->validate('a'));
    }

    /**
     * @test
     */
    public function it_should_check_it_is_not_zero()
    {
        $this->assertTrue($this->getValidator()->isNotZero()->validate(1.10));
        $this->assertFalse($this->getValidator()->isNotZero()->validate(0));
    }

    /**
     * @test
     */
    public function it_should_check_it_is_positive()
    {
        $this->assertTrue($this->getValidator()->isPositive()->validate(1.10));
        $this->assertFalse($this->getValidator()->isPositive()->validate(-10));
    }

    /**
     * @test
     */
    public function it_should_check_it_is_negative()
    {
        $this->assertTrue($this->getValidator()->isNegative()->validate(-10.10));
        $this->assertFalse($this->getValidator()->isNegative()->validate(1.10));
    }

    /**
     * @test
     */
    public function it_should_check_it_is_between()
    {
        $this->assertTrue($this->getValidator()->isBetween(10.10,20.10, false)->validate(13.10));

        $this->assertTrue($this->getValidator()->isBetween(10.10, 20.10, true)->validate(10.10));
    }
}
