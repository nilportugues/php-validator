<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/20/14
 * Time: 2:47 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\NilPortugues\Validator\Attribute\Object;

use NilPortugues\Validator\Validator;
use Tests\NilPortugues\Validator\Resources\Dummy;

/**
 * Class ObjectTest
 * @package Tests\NilPortugues\Validator\Attribute\Object
 */
class ObjectTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return \NilPortugues\Validator\Attribute\Object\Object
     */
    protected function getValidator()
    {
        $validator = new Validator();

        return $validator->isObject('propertyName');
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsObject()
    {
        $this->assertTrue($this->getValidator()->validate(new \stdClass()));
        $this->assertFalse($this->getValidator()->validate('a'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsInstanceOf()
    {
        $this->assertTrue($this->getValidator()->isInstanceOf('DateTime')->validate(new \DateTime()));

        $this->assertFalse($this->getValidator()->isInstanceOf('DateTime')->validate(new \stdClass()));
        $this->assertFalse($this->getValidator()->isInstanceOf('DateTime')->validate('a'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfHasProperty()
    {
        $dummy = new Dummy();

        $this->assertTrue($this->getValidator()->hasProperty('userName')->validate($dummy));
        $this->assertFalse($this->getValidator()->hasProperty('password')->validate($dummy));
    }

    /**
     * @test
     */
    public function itShouldCheckIfHasMethod()
    {
        $dummy = new Dummy();

        $this->assertTrue($this->getValidator()->hasMethod('getUserName')->validate($dummy));
        $this->assertFalse($this->getValidator()->hasMethod('getPassword')->validate($dummy));
    }

    /**
     * @test
     */
    public function itShouldCheckIfHasParentClass()
    {
        $this->assertTrue($this->getValidator()->hasParentClass()->validate(new Dummy()));
        $this->assertFalse($this->getValidator()->hasParentClass()->validate(new \stdClass()));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsChildOf()
    {
        $dummy = new Dummy();

        $this->assertTrue($this->getValidator()->isChildOf('DateTime')->validate($dummy));
        $this->assertFalse($this->getValidator()->isChildOf('DateTimeZone')->validate($dummy));
    }

    /**
     * @test
     */
    public function itShouldCheckIfInheritsFrom()
    {
        $dummy = new Dummy();

        $this->assertTrue($this->getValidator()->inheritsFrom('DateTime')->validate($dummy));
        $this->assertFalse($this->getValidator()->inheritsFrom('DateTimeZone')->validate($dummy));
    }

    /**
     * @test
     */
    public function itShouldCheckIfHasInterface()
    {
        $dummy = new Dummy();

        $this->assertTrue(
            $this->getValidator()
                ->hasInterface('Tests\NilPortugues\Validator\Resources\DummyInterface')
                ->validate($dummy)
        );
        $this->assertFalse($this->getValidator()->inheritsFrom('DateTimeZone')->validate($dummy));
    }
}
