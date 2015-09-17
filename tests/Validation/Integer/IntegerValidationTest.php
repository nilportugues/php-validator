<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/20/14
 * Time: 12:03 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\NilPortugues\Validator\Validation\Integer;

use NilPortugues\Validator\Validation\Integer\IntegerValidation;

/**
 * Class IntegerValidationTest
 * @package Tests\NilPortugues\Validator\Validation\IntegerAttribute
 */
class IntegerValidationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function itShouldCheckIfItIsFloat()
    {
        $this->assertTrue(IntegerValidation::isInteger(3));
        $this->assertFalse(IntegerValidation::isInteger(3.14));
    }

    /**
     * @test
     */
    public function itShouldCheckIfItIsNotZero()
    {
        $this->assertTrue(IntegerValidation::isNotZero(3));
        $this->assertFalse(IntegerValidation::isNotZero(0));
    }

    /**
     * @test
     */
    public function itShouldCheckIfItIsPositive()
    {
        $this->assertTrue(IntegerValidation::isPositive(3));
        $this->assertFalse(IntegerValidation::isPositive(-3));
        $this->assertFalse(IntegerValidation::isPositive(0));
    }

    /**
     * @test
     */
    public function itShouldCheckIfItIsPositiveOrZero()
    {
        $this->assertTrue(IntegerValidation::isPositiveOrZero(3));
        $this->assertTrue(IntegerValidation::isPositiveOrZero(0));
        $this->assertFalse(IntegerValidation::isPositiveOrZero(-3));
    }

    /**
     * @test
     */
    public function itShouldCheckIfItIsNegativeOrZero()
    {
        $this->assertTrue(IntegerValidation::isNegativeOrZero(-3));
        $this->assertTrue(IntegerValidation::isNegativeOrZero(0));
        $this->assertFalse(IntegerValidation::isNegativeOrZero(3));
    }

    /**
     * @test
     */
    public function itShouldCheckIfItIsNegative()
    {
        $this->assertTrue(IntegerValidation::isNegative(-3));
        $this->assertFalse(IntegerValidation::isNegative(3));
    }

    /**
     * @test
     */
    public function itShouldCheckIfItIsBetween()
    {
        $this->assertTrue(IntegerValidation::isBetween(3, 1, 5, false));
        $this->assertTrue(IntegerValidation::isBetween(3, 1, 3, true));

        $this->assertFalse(IntegerValidation::isBetween(13, 1, 5, false));
        $this->assertFalse(IntegerValidation::isBetween(13, 1, 3, true));
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsBetweenException()
    {
        $this->setExpectedException('\InvalidArgumentException');
        IntegerValidation::isBetween(3, 12, 4, false);
    }

    /**
     * @test
     */
    public function itShouldCheckIfItIsOdd()
    {
        $this->assertTrue(IntegerValidation::isOdd(3));
        $this->assertFalse(IntegerValidation::isOdd(4));
    }

    /**
     * @test
     */
    public function itShouldCheckIfItIsEven()
    {
        $this->assertTrue(IntegerValidation::isEven(4));
        $this->assertFalse(IntegerValidation::isEven(3));
    }

    /**
     * @test
     */
    public function itShouldCheckIfItIsMultiple()
    {
        $this->assertTrue(IntegerValidation::isMultiple(6, 3));
        $this->assertFalse(IntegerValidation::isMultiple(13, 7));
    }
}
