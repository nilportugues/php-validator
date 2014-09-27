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
    public function itShouldCheckIfItIsFloat()
    {
        $this->assertTrue(FloatTrait::isFloat(3.14));
        $this->assertFalse(FloatTrait::isFloat(3));
    }

    /**
     * @test
     */
    public function itShouldCheckIfItIsNotZero()
    {
        $this->assertTrue(FloatTrait::isNotZero(3.14));
        $this->assertTrue(FloatTrait::isNotZero(0.00000001));

        $this->assertFalse(FloatTrait::isNotZero(0.00));
        $this->assertFalse(FloatTrait::isNotZero(0));
    }

    /**
     * @test
     */
    public function itShouldCheckIfItIsPositive()
    {
        $this->assertTrue(FloatTrait::isPositive(3.14));
        $this->assertFalse(FloatTrait::isPositive(0));
        $this->assertFalse(FloatTrait::isPositive(-3.14));
    }

    /**
     * @test
     */
    public function itShouldCheckIfItIsPositiveOrZero()
    {
        $this->assertTrue(FloatTrait::isPositiveOrZero(3.14));
        $this->assertTrue(FloatTrait::isPositiveOrZero(0));
        $this->assertFalse(FloatTrait::isPositiveOrZero(-3.14));
    }

    /**
     * @test
     */
    public function itShouldCheckIfItIsNegative()
    {
        $this->assertTrue(FloatTrait::isNegative(-3.14));
        $this->assertFalse(FloatTrait::isNegative(0));
        $this->assertFalse(FloatTrait::isNegative(3.14));
    }

    /**
     * @test
     */
    public function itShouldCheckIfItIsNegativeOrZero()
    {
        $this->assertTrue(FloatTrait::isNegativeOrZero(-3.14));
        $this->assertTrue(FloatTrait::isNegativeOrZero(0));
        $this->assertFalse(FloatTrait::isNegativeOrZero(3.14));
    }

    /**
     * @test
     */
    public function itShouldCheckIfItIsBetween()
    {
        $this->assertTrue(FloatTrait::isBetween(3.14, 1.2, 5.6, false));
        $this->assertTrue(FloatTrait::isBetween(3.14, 1.2, 3.14, true));

        $this->assertFalse(FloatTrait::isBetween(13.14, 1.2, 5.6, false));
        $this->assertFalse(FloatTrait::isBetween(13.14, 1.2, 3.14, true));
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsBetweenException()
    {
        $this->setExpectedException('\InvalidArgumentException');
        FloatTrait::isBetween(3.14, 12.3, 4.2, false);
    }

    /**
     * @test
     */
    public function itShouldCheckIfItIsOdd()
    {
        $this->assertTrue(FloatTrait::isOdd(1.1));
        $this->assertFalse(FloatTrait::isOdd(2.2));
        $this->assertTrue(FloatTrait::isOdd(3.15));
        $this->assertFalse(FloatTrait::isOdd(4.14));
        $this->assertTrue(FloatTrait::isOdd(5.3));
        $this->assertTrue(FloatTrait::isOdd(5.4));
        $this->assertFalse(FloatTrait::isOdd(6.4));
        $this->assertFalse(FloatTrait::isOdd(6.5));
    }

    /**
     * @test
     */
    public function itShouldCheckIfItIsOddWithIntegers()
    {
        $this->assertTrue(FloatTrait::isOdd(1));
        $this->assertFalse(FloatTrait::isOdd(2));
        $this->assertTrue(FloatTrait::isOdd(3));
        $this->assertFalse(FloatTrait::isOdd(4));
        $this->assertTrue(FloatTrait::isOdd(5));
        $this->assertFalse(FloatTrait::isOdd(6));
    }

    /**
     * @test
     */
    public function itShouldCheckIfItIsEven()
    {
        $this->assertFalse(FloatTrait::isEven(1.1));
        $this->assertTrue(FloatTrait::isEven(2.2));
        $this->assertFalse(FloatTrait::isEven(3.14));
        $this->assertTrue(FloatTrait::isEven(4.15));
        $this->assertFalse(FloatTrait::isEven(5.5));
        $this->assertFalse(FloatTrait::isEven(5.4));
        $this->assertTrue(FloatTrait::isEven(6.6));
        $this->assertTrue(FloatTrait::isEven(6.7));
    }

    /**
     * @test
     */
    public function itShouldCheckIfItIsEvenWithIntegers()
    {
        $this->assertFalse(FloatTrait::isEven(1));
        $this->assertTrue(FloatTrait::isEven(2));
        $this->assertFalse(FloatTrait::isEven(3));
        $this->assertTrue(FloatTrait::isEven(4));
        $this->assertFalse(FloatTrait::isEven(5));
        $this->assertTrue(FloatTrait::isEven(6));
    }

    /**
     * @test
     */
    public function itShouldCheckIfItIsMultiple()
    {
        $this->assertTrue(FloatTrait::isMultiple(5.00, 2.50));
        $this->assertFalse(FloatTrait::isMultiple(3.14, 1));
    }
}
