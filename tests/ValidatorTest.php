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
    public function itShouldGetIntegerClass()
    {
        $this->assertSame(
            'NilPortugues\Validator\Attribute\Numeric\Integer',
            get_class($this->validator->isInteger('propertyName'))
        );
    }

    /**
     * @test
     */
    public function itShouldGetFloatClass()
    {
        $this->assertSame(
            'NilPortugues\Validator\Attribute\Numeric\Float',
            get_class($this->validator->isFloat('propertyName'))
        );
    }

    /**
     * @test
     */
    public function itShouldGetArrayClass()
    {
        $this->assertSame(
            'NilPortugues\Validator\Attribute\Collection\Collection',
            get_class($this->validator->isArray('propertyName'))
        );
    }

    /**
     * @test
     */
    public function itShouldGetObjectClass()
    {
        $this->assertSame(
            'NilPortugues\Validator\Attribute\Object\Object',
            get_class($this->validator->isObject('propertyName'))
        );
    }

    /**
     * @test
     */
    public function itShouldReturnPropertyName()
    {
        $this->assertEmpty($this->validator->getPropertyName());

        $this->validator->isArray('propertyName');
        $this->assertSame('propertyName', $this->validator->getPropertyName());
    }

    /**
     * @test
     */
    public function itShouldThrowExceptionIfLanguageFileNotFound()
    {
        $this->setExpectedException('\InvalidArgumentException');
        $validator = new Validator('locale.php');

        $stringValidator = $validator->isString('property');
        $stringValidator->isBetween(500, 1000)->validate('a');
    }

    /**
     * @test
     */
    public function itShouldThrowRuntimeExceptionIfFunctionMapIsNotFound()
    {
        $validator  = new Validator();
        $reflection = new \ReflectionObject($validator);

        $property = $reflection->getProperty("functionMapFile");
        $property->setAccessible(true);
        $property->setValue($validator, 'notFound.php');

        $this->setExpectedException('\RuntimeException');
        $method = $reflection->getMethod('buildFunctionMap');
        $method->setAccessible(true);
        $method->invoke($validator);
    }
}
