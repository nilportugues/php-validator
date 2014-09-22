<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/20/14
 * Time: 12:03 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\NilPortugues\Validator\Traits\Object;

use NilPortugues\Validator\Traits\Object\ObjectTrait;
use Tests\NilPortugues\Validator\Resources\Dummy;

/**
 * Class ObjectTraitTest
 * @package Tests\NilPortugues\Validator\Traits\Object
 */
class ObjectTraitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_should_check_if_is_object()
    {
        $this->assertTrue(ObjectTrait::isObject(new \stdClass()));
        $this->assertFalse(ObjectTrait::isObject('a'));
    }

    /**
     * @test
     */
    public function it_should_check_if_is_instance_of()
    {
        $this->assertTrue(ObjectTrait::isInstanceOf(new \DateTime(), 'DateTime'));

        $this->assertFalse(ObjectTrait::isInstanceOf(new \stdClass(), 'DateTime'));
        $this->assertFalse(ObjectTrait::isInstanceOf('a', 'DateTime'));
    }

    /**
     * @test
     */
    public function it_should_check_if_has_property()
    {
        $dummy = new Dummy();

        $this->assertTrue(ObjectTrait::hasProperty($dummy, 'userName'));
        $this->assertFalse(ObjectTrait::hasProperty($dummy, 'password'));
    }

    /**
     * @test
     */
    public function it_should_check_if_has_method()
    {
        $dummy = new Dummy();

        $this->assertTrue(ObjectTrait::hasMethod($dummy, 'getUserName'));
        $this->assertFalse(ObjectTrait::hasMethod($dummy, 'getPassword'));
    }

    /**
     * @test
     */
    public function it_should_check_if_has_parentClass()
    {
        $this->assertTrue(ObjectTrait::hasParentClass(new Dummy()));
        $this->assertFalse(ObjectTrait::hasParentClass(new \stdClass()));
    }

    /**
     * @test
     */
    public function it_should_check_if_is_child_of()
    {
        $dummy = new Dummy();

        $this->assertTrue(ObjectTrait::isChildOf($dummy, 'DateTime'));
        $this->assertFalse(ObjectTrait::isChildOf($dummy, 'DateTimeZone'));
    }

    /**
     * @test
     */
    public function it_should_check_if_inherits_from()
    {
        $dummy = new Dummy();

        $this->assertTrue(ObjectTrait::inheritsFrom($dummy, 'DateTime'));
        $this->assertFalse(ObjectTrait::inheritsFrom($dummy, 'DateTimeZone'));
    }

    /**
     * @test
     */
    public function it_should_check_if_has_interface()
    {
        $dummy = new Dummy();

        $this->assertTrue(
            ObjectTrait::hasInterface(
                $dummy,
                'Tests\NilPortugues\Validator\Resources\DummyInterface'
            )
        );
        $this->assertFalse(ObjectTrait::inheritsFrom($dummy, 'DateTimeZone'));
    }
}
