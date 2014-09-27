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
    public function itShouldCheckItIsInteger()
    {
        $this->assertTrue($this->getValidator()->validate(1));
        $this->assertFalse($this->getValidator()->validate('a'));
    }

    /**
     * @test
     */
    public function itShouldCheckItIsNotZero()
    {
        $this->assertTrue($this->getValidator()->isNotZero()->validate(1));
        $this->assertFalse($this->getValidator()->isNotZero()->validate(0));
    }

    /**
     * @test
     */
    public function itShouldCheckItIsPositive()
    {
        $this->assertTrue($this->getValidator()->isPositive()->validate(1));
        $this->assertFalse($this->getValidator()->isPositive()->validate(-10));
        $this->assertFalse($this->getValidator()->isPositive()->validate(0));
    }

    /**
     * @test
     */
    public function itShouldCheckItIsPositiveOrZero()
    {
        $this->assertTrue($this->getValidator()->isPositiveOrZero()->validate(1));
        $this->assertTrue($this->getValidator()->isPositiveOrZero()->validate(0));
        $this->assertFalse($this->getValidator()->isPositiveOrZero()->validate(-10));
    }

    /**
     * @test
     */
    public function itShouldCheckItIsNegative()
    {
        $this->assertTrue($this->getValidator()->isNegative()->validate(-10));
        $this->assertFalse($this->getValidator()->isNegative()->validate(1));
        $this->assertFalse($this->getValidator()->isNegative()->validate(0));
    }

    /**
     * @test
     */
    public function itShouldCheckItIsNegativeOrZero()
    {
        $this->assertTrue($this->getValidator()->isNegativeOrZero()->validate(-10));
        $this->assertTrue($this->getValidator()->isNegativeOrZero()->validate(0));
        $this->assertFalse($this->getValidator()->isNegativeOrZero()->validate(1));
    }

    /**
     * @test
     */
    public function itShouldCheckItIsBetween()
    {
        $this->assertTrue($this->getValidator()->isBetween(10, 20, false)->validate(13));
        $this->assertTrue($this->getValidator()->isBetween(10, 20, true)->validate(10));
    }

    /**
     * @test
     */
    public function itShouldCheckIsBetweenException()
    {
        $this->setExpectedException('\InvalidArgumentException');
        $this->getValidator()->isBetween(20, 10, false)->validate(13);
    }

    /**
     * @test
     */
    public function itShouldCheckIsOdd()
    {
        $this->assertTrue($this->getValidator()->isOdd()->validate(3));
        $this->assertFalse($this->getValidator()->isOdd()->validate(2));
    }

    /**
     * @test
     */
    public function itShouldCheckIsEven()
    {
        $this->assertTrue($this->getValidator()->isEven()->validate(2));
        $this->assertFalse($this->getValidator()->isEven()->validate(3));
    }

    /**
     * @test
     */
    public function itShouldCheckIsMultiple()
    {
        $this->assertTrue($this->getValidator()->isMultiple(2)->validate(4));
        $this->assertFalse($this->getValidator()->isMultiple(2)->validate(3));
    }
}
