<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/20/14
 * Time: 12:02 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\NilPortugues\Validator\Validation\Float;

use NilPortugues\Validator\Validation\Float\FloatValidation;

/**
 * Class FloatValidationTest
 * @package Tests\NilPortugues\Validator\Validation\FloatAttribute
 */
class FloatValidationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function itShouldCheckIfItIsFloat()
    {
        $this->assertTrue(FloatValidation::isFloat(3.14));
        $this->assertFalse(FloatValidation::isFloat(3));
    }

    /**
     * @test
     */
    public function itShouldCheckIfItIsNotZero()
    {
        $this->assertTrue(FloatValidation::isNotZero(3.14));
        $this->assertTrue(FloatValidation::isNotZero(0.00000001));

        $this->assertFalse(FloatValidation::isNotZero(0.00));
        $this->assertFalse(FloatValidation::isNotZero(0));
    }

    /**
     * @test
     */
    public function itShouldCheckIfItIsPositive()
    {
        $this->assertTrue(FloatValidation::isPositive(3.14));
        $this->assertFalse(FloatValidation::isPositive(0));
        $this->assertFalse(FloatValidation::isPositive(-3.14));
    }

    /**
     * @test
     */
    public function itShouldCheckIfItIsPositiveOrZero()
    {
        $this->assertTrue(FloatValidation::isPositiveOrZero(3.14));
        $this->assertTrue(FloatValidation::isPositiveOrZero(0));
        $this->assertFalse(FloatValidation::isPositiveOrZero(-3.14));
    }

    /**
     * @test
     */
    public function itShouldCheckIfItIsNegative()
    {
        $this->assertTrue(FloatValidation::isNegative(-3.14));
        $this->assertFalse(FloatValidation::isNegative(0));
        $this->assertFalse(FloatValidation::isNegative(3.14));
    }

    /**
     * @test
     */
    public function itShouldCheckIfItIsNegativeOrZero()
    {
        $this->assertTrue(FloatValidation::isNegativeOrZero(-3.14));
        $this->assertTrue(FloatValidation::isNegativeOrZero(0));
        $this->assertFalse(FloatValidation::isNegativeOrZero(3.14));
    }

    /**
     * @test
     */
    public function itShouldCheckIfItIsBetween()
    {
        $this->assertTrue(FloatValidation::isBetween(3.14, 1.2, 5.6, false));
        $this->assertTrue(FloatValidation::isBetween(3.14, 1.2, 3.14, true));

        $this->assertFalse(FloatValidation::isBetween(13.14, 1.2, 5.6, false));
        $this->assertFalse(FloatValidation::isBetween(13.14, 1.2, 3.14, true));
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsBetweenException()
    {
        $this->setExpectedException('\InvalidArgumentException');
        FloatValidation::isBetween(3.14, 12.3, 4.2, false);
    }

    /**
     * @test
     */
    public function itShouldCheckIfItIsOdd()
    {
        $this->assertTrue(FloatValidation::isOdd(1.1));
        $this->assertFalse(FloatValidation::isOdd(2.2));
        $this->assertTrue(FloatValidation::isOdd(3.15));
        $this->assertFalse(FloatValidation::isOdd(4.14));
        $this->assertTrue(FloatValidation::isOdd(5.3));
        $this->assertTrue(FloatValidation::isOdd(5.4));
        $this->assertFalse(FloatValidation::isOdd(6.4));
        $this->assertFalse(FloatValidation::isOdd(6.5));
    }

    /**
     * @test
     */
    public function itShouldCheckIfItIsOddWithIntegers()
    {
        $this->assertTrue(FloatValidation::isOdd(1));
        $this->assertFalse(FloatValidation::isOdd(2));
        $this->assertTrue(FloatValidation::isOdd(3));
        $this->assertFalse(FloatValidation::isOdd(4));
        $this->assertTrue(FloatValidation::isOdd(5));
        $this->assertFalse(FloatValidation::isOdd(6));
    }

    /**
     * @test
     */
    public function itShouldCheckIfItIsEven()
    {
        $this->assertFalse(FloatValidation::isEven(1.1));
        $this->assertTrue(FloatValidation::isEven(2.2));
        $this->assertFalse(FloatValidation::isEven(3.14));
        $this->assertTrue(FloatValidation::isEven(4.15));
        $this->assertFalse(FloatValidation::isEven(5.5));
        $this->assertFalse(FloatValidation::isEven(5.4));
        $this->assertTrue(FloatValidation::isEven(6.6));
        $this->assertTrue(FloatValidation::isEven(6.7));
    }

    /**
     * @test
     */
    public function itShouldCheckIfItIsEvenWithIntegers()
    {
        $this->assertFalse(FloatValidation::isEven(1));
        $this->assertTrue(FloatValidation::isEven(2));
        $this->assertFalse(FloatValidation::isEven(3));
        $this->assertTrue(FloatValidation::isEven(4));
        $this->assertFalse(FloatValidation::isEven(5));
        $this->assertTrue(FloatValidation::isEven(6));
    }

    /**
     * @test
     */
    public function itShouldCheckIfItIsMultiple()
    {
        $this->assertTrue(FloatValidation::isMultiple(5.00, 2.50));
        $this->assertFalse(FloatValidation::isMultiple(3.14, 1));
    }
}
