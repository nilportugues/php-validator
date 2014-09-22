<?php

namespace tests\NilPortugues\Validator;

use NilPortugues\Validator\Validator;

/**
 * Class ValidatorTest
 * @package tests\NilPortugues\Validator
 */
class ValidatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Validator
     */
    private $validator;

    /**
     *
     */
    public function setUp()
    {
        $this->validator = new Validator();
    }

    /**
     *
     */
    public function tearDown()
    {
        $this->validator = null;
    }

    /**
     * @test
     */
    public function it_should_get_integer_class()
    {
        $this->assertSame(
            'NilPortugues\Validator\Attribute\Numeric\Integer',
            get_class($this->validator->isInteger('propertyName'))
        );
    }

    /**
     * @test
     */
    public function it_should_get_float_class()
    {
        $this->assertSame(
            'NilPortugues\Validator\Attribute\Numeric\Float',
            get_class($this->validator->isFloat('propertyName'))
        );
    }

    /**
     * @test
     */
    public function it_should_get_array_class()
    {
        $this->assertSame(
            'NilPortugues\Validator\Attribute\Collection\Collection',
            get_class($this->validator->isArray('propertyName'))
        );
    }

    /**
     * @test
     */
    public function it_should_get_object_class()
    {
        $this->assertSame(
            'NilPortugues\Validator\Attribute\Object\Object',
            get_class($this->validator->isObject('propertyName'))
        );
    }

    /**
     * @test
     */
    public function it_should_return_property_name()
    {
        $this->assertEmpty($this->validator->getPropertyName());

        $this->validator->isArray('propertyName');
        $this->assertSame('propertyName', $this->validator->getPropertyName());
    }

    /**
     * @test
     */
    public function it_should_get_error_messages()
    {
        $errorArray = $this->validator->getErrorMessages();

        $this->assertNotEmpty($errorArray);
        $this->assertInternalType('array', $errorArray);
    }
}
