<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/20/14
 * Time: 12:03 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\NilPortugues\Validator\Traits\Integer;

use NilPortugues\Validator\Traits\Integer\IntegerTrait;

/**
 * Class IntegerTraitTest
 * @package Tests\NilPortugues\Validator\Traits\Integer
 */
class IntegerTraitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function itShouldCheckIfItIsFloat()
    {
        $this->assertTrue(IntegerTrait::isInteger(3));
        $this->assertFalse(IntegerTrait::isInteger(3.14));
    }

    /**
     * @test
     */
    public function itShouldCheckIfItIsNotZero()
    {
        $this->assertTrue(IntegerTrait::isNotZero(3));
        $this->assertFalse(IntegerTrait::isNotZero(0));
    }

    /**
     * @test
     */
    public function itShouldCheckIfItIsPositive()
    {
        $this->assertTrue(IntegerTrait::isPositive(3));
        $this->assertFalse(IntegerTrait::isPositive(-3));
        $this->assertFalse(IntegerTrait::isPositive(0));
    }

    /**
     * @test
     */
    public function itShouldCheckIfItIsPositiveOrZero()
    {
        $this->assertTrue(IntegerTrait::isPositiveOrZero(3));
        $this->assertTrue(IntegerTrait::isPositiveOrZero(0));
        $this->assertFalse(IntegerTrait::isPositiveOrZero(-3));
    }

    /**
     * @test
     */
    public function itShouldCheckIfItIsNegativeOrZero()
    {
        $this->assertTrue(IntegerTrait::isNegativeOrZero(-3));
        $this->assertTrue(IntegerTrait::isNegativeOrZero(0));
        $this->assertFalse(IntegerTrait::isNegativeOrZero(3));
    }

    /**
     * @test
     */
    public function itShouldCheckIfItIsNegative()
    {
        $this->assertTrue(IntegerTrait::isNegative(-3));
        $this->assertFalse(IntegerTrait::isNegative(3));
    }

    /**
     * @test
     */
    public function itShouldCheckIfItIsBetween()
    {
        $this->assertTrue(IntegerTrait::isBetween(3, 1, 5, false));
        $this->assertTrue(IntegerTrait::isBetween(3, 1, 3, true));

        $this->assertFalse(IntegerTrait::isBetween(13, 1, 5, false));
        $this->assertFalse(IntegerTrait::isBetween(13, 1, 3, true));
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsBetweenException()
    {
        $this->setExpectedException('\InvalidArgumentException');
        IntegerTrait::isBetween(3, 12, 4, false);
    }

    /**
     * @test
     */
    public function itShouldCheckIfItIsOdd()
    {
        $this->assertTrue(IntegerTrait::isOdd(3));
        $this->assertFalse(IntegerTrait::isOdd(4));
    }

    /**
     * @test
     */
    public function itShouldCheckIfItIsEven()
    {
        $this->assertTrue(IntegerTrait::isEven(4));
        $this->assertFalse(IntegerTrait::isEven(3));
    }

    /**
     * @test
     */
    public function itShouldCheckIfItIsMultiple()
    {
        $this->assertTrue(IntegerTrait::isMultiple(6, 3));
        $this->assertFalse(IntegerTrait::isMultiple(13, 7));
    }
}
