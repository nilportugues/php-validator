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
 * Class IntegerTest
 * @package Tests\NilPortugues\Validator\Attribute\Numeric
 */
class IntegerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return \NilPortugues\Validator\Attribute\Numeric\Integer
     */
    protected function getValidator()
    {
        $validator = new Validator();

        return $validator->isInteger('propertyName');
    }

    /**
     * @test
     */
    public function it_should_check_it_is_integer()
    {
        $this->assertTrue($this->getValidator()->validate(1));
        $this->assertFalse($this->getValidator()->validate('a'));
    }

    /**
     * @test
     */
    public function it_should_check_it_is_not_zero()
    {
        $this->assertTrue($this->getValidator()->isNotZero()->validate(1));
        $this->assertFalse($this->getValidator()->isNotZero()->validate(0));
    }

    /**
     * @test
     */
    public function it_should_check_it_is_positive()
    {
        $this->assertTrue($this->getValidator()->isPositive()->validate(1));
        $this->assertFalse($this->getValidator()->isPositive()->validate(-10));
    }

    /**
     * @test
     */
    public function it_should_check_it_is_negative()
    {
        $this->assertTrue($this->getValidator()->isNegative()->validate(-10));
        $this->assertFalse($this->getValidator()->isNegative()->validate(1));
    }

    /**
     * @test
     */
    public function it_should_check_it_is_between()
    {
        $this->assertTrue($this->getValidator()->isBetween(10,20, false)->validate(13));
        $this->assertFalse($this->getValidator()->isBetween(10, 20, true)->validate(1));
    }
}
