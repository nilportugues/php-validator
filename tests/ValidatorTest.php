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
        $this->validator = Validator::create();
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
            'NilPortugues\Validator\Attribute\Numeric\IntegerAttribute',
            get_class($this->validator->isInteger('propertyName'))
        );
    }

    /**
     * @test
     */
    public function itShouldGetFloatClass()
    {
        $this->assertSame(
            'NilPortugues\Validator\Attribute\Numeric\FloatAttribute',
            get_class($this->validator->isFloat('propertyName'))
        );
    }

    /**
     * @test
     */
    public function itShouldGetArrayClass()
    {
        $this->assertSame(
            'NilPortugues\Validator\Attribute\Collection\CollectionAttribute',
            get_class($this->validator->isArray('propertyName'))
        );
    }

    /**
     * @test
     */
    public function itShouldGetObjectClass()
    {
        $this->assertSame(
            'NilPortugues\Validator\Attribute\Object\ObjectAttribute',
            get_class($this->validator->isObject('propertyName'))
        );
    }


    /**
     * @test
     */
    public function itShouldThrowExceptionIfLanguageFileNotFound()
    {
        $this->setExpectedException('\InvalidArgumentException');
        $validator = Validator::create('locale.php');

        $stringValidator = $validator->isString('property');
        $stringValidator->isBetween(500, 1000)->validate('a');
    }

    /**
     * @test
     */
    public function itShouldThrowRuntimeExceptionIfFunctionMapIsNotFound()
    {
        $validator  = Validator::create();
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
