<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/20/14
 * Time: 12:03 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\NilPortugues\Validator\Validation\Object;

use NilPortugues\Validator\Validation\Object\ObjectValidation;
use Tests\NilPortugues\Validator\Resources\Dummy;

/**
 * Class ObjectValidationTest
 * @package Tests\NilPortugues\Validator\Validation\ObjectAttribute
 */
class ObjectValidationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function itShouldCheckIfIsObject()
    {
        $this->assertTrue(ObjectValidation::isObject(new \stdClass()));
        $this->assertFalse(ObjectValidation::isObject('a'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsInstanceOf()
    {
        $this->assertTrue(ObjectValidation::isInstanceOf(new \DateTime(), 'DateTime'));
        $this->assertFalse(ObjectValidation::isInstanceOf(new \stdClass(), 'DateTime'));
        $this->assertFalse(ObjectValidation::isInstanceOf('a', 'DateTime'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfHasProperty()
    {
        $dummy = new Dummy();

        $this->assertTrue(ObjectValidation::hasProperty($dummy, 'userName'));
        $this->assertFalse(ObjectValidation::hasProperty($dummy, 'password'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfHasMethod()
    {
        $dummy = new Dummy();

        $this->assertTrue(ObjectValidation::hasMethod($dummy, 'getUserName'));
        $this->assertFalse(ObjectValidation::hasMethod($dummy, 'getPassword'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfHasParentClass()
    {
        $this->assertTrue(ObjectValidation::hasParentClass(new Dummy()));
        $this->assertFalse(ObjectValidation::hasParentClass(new \stdClass()));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsChildOf()
    {
        $dummy = new Dummy();

        $this->assertTrue(ObjectValidation::isChildOf($dummy, 'DateTime'));
        $this->assertFalse(ObjectValidation::isChildOf($dummy, 'DateTimeZone'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfInheritsFrom()
    {
        $dummy = new Dummy();

        $this->assertTrue(ObjectValidation::inheritsFrom($dummy, 'DateTime'));
        $this->assertFalse(ObjectValidation::inheritsFrom($dummy, 'DateTimeZone'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfHasInterface()
    {
        $dummy = new Dummy();

        $this->assertTrue(
            ObjectValidation::hasInterface(
                $dummy,
                'Tests\NilPortugues\Validator\Resources\DummyInterface'
            )
        );
        $this->assertFalse(ObjectValidation::inheritsFrom($dummy, 'DateTimeZone'));
    }
}
