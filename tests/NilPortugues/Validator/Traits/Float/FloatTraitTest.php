<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/20/14
 * Time: 12:02 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\NilPortugues\Validator\Traits\Float;

use NilPortugues\Validator\Traits\Float\FloatTrait;

/**
 * Class FloatTraitTest
 * @package Tests\NilPortugues\Validator\Traits\Float
 */
class FloatTraitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_should_check_if_it_is_float()
    {
        $this->assertTrue(FloatTrait::isFloat(3.14));
        $this->assertFalse(FloatTrait::isFloat(3));
    }

    /**
     * @test
     */
    public function it_should_check_if_it_is_not_zero()
    {
        $this->assertTrue(FloatTrait::isNotZero(3.14));
        $this->assertTrue(FloatTrait::isNotZero(0.00000001));

        $this->assertFalse(FloatTrait::isNotZero(0.00));
        $this->assertFalse(FloatTrait::isNotZero(0));
    }

    /**
     * @test
     */
    public function it_should_check_if_it_is_positive()
    {
        $this->assertTrue(FloatTrait::isPositive(3.14));
        $this->assertFalse(FloatTrait::isPositive(-3.14));
    }

    /**
     * @test
     */
    public function it_should_check_if_it_is_negative()
    {
        $this->assertTrue(FloatTrait::isNegative(-3.14));
        $this->assertFalse(FloatTrait::isNegative(3.14));
    }

    /**
     * @test
     */
    public function it_should_check_if_it_is_between()
    {
        $this->assertTrue(FloatTrait::isBetween(3.14, 1.2, 5.6, false));
        $this->assertTrue(FloatTrait::isBetween(3.14, 1.2, 3.14, true));

        $this->assertFalse(FloatTrait::isBetween(13.14, 1.2, 5.6, false));
        $this->assertFalse(FloatTrait::isBetween(13.14, 1.2, 3.14, true));
    }

    /**
     * @test
     */
    public function it_should_check_string_is_between_exception()
    {
        $this->setExpectedException('\InvalidArgumentException');
        FloatTrait::isBetween(3.14, 12.3, 4.2, false);
    }

    /**
     * @test
     */
    public function it_should_check_if_it_is_odd()
    {
        $this->assertTrue(FloatTrait::isOdd(3.15));
        $this->assertFalse(FloatTrait::isOdd(4.14));
    }

    /**
     * @test
     */
    public function it_should_check_if_it_is_even()
    {
        $this->assertTrue(FloatTrait::isEven(4.15));
        $this->assertFalse(FloatTrait::isEven(3.14));
    }

    /**
     * @test
     */
    public function it_should_check_if_it_is_multiple()
    {
        $this->assertTrue(FloatTrait::isMultiple(5.00, 2.50));
        $this->assertFalse(FloatTrait::isMultiple(3.14, 1));
    }
}
