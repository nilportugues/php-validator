<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/20/14
 * Time: 5:03 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\NilPortugues\Validator\Validation\Collection;

use NilPortugues\Validator\Validation\Collection\CollectionValidation;
use NilPortugues\Validator\Validator;

/**
 * Class CollectionValidatorTest
 * @package Tests\NilPortugues\Validator\Validation\CollectionAttribute
 */
class CollectionValidatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function itShouldCheckIfIsArray()
    {
        $this->assertTrue(CollectionValidation::isArray(['hello', 'world']));
        $this->assertTrue(CollectionValidation::isArray(new \ArrayObject()));
        $this->assertTrue(CollectionValidation::isArray(new \SplFixedArray()));

        $this->assertFalse(CollectionValidation::isArray('a'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfEach()
    {
        $array       = ['hello', 'world'];
        $arrayObject = new \ArrayObject($array);
        $fixedArray  = (new \SplFixedArray())->fromArray($array);

        $validator     = Validator::create();
        $valueIsString = $validator->isString('value')->isAlpha();
        $keyIsInteger  = $validator->isInteger('key')->isPositiveOrZero();

        $this->assertTrue(CollectionValidation::each($array, $valueIsString));
        $this->assertTrue(CollectionValidation::each($array, $valueIsString, $keyIsInteger));

        $this->assertTrue(CollectionValidation::each($arrayObject, $valueIsString));
        $this->assertTrue(CollectionValidation::each($arrayObject, $valueIsString, $keyIsInteger));

        $this->assertTrue(CollectionValidation::each($fixedArray, $valueIsString));
        $this->assertTrue(CollectionValidation::each($fixedArray, $valueIsString, $keyIsInteger));
    }

    /**
     * @test
     */
    public function itShouldCheckIfHasKeyFormat()
    {
        $array       = ['one' => 'hello', 'two' => 'world'];
        $arrayObject = new \ArrayObject($array);
        $fixedArray  = (new \SplFixedArray())->fromArray(\array_values($array));

        $validator    = Validator::create();
        $keyIsString  = $validator->isString('key')->isAlpha();
        $keyIsInteger = $validator->isInteger('key')->isPositiveOrZero();

        $this->assertTrue(CollectionValidation::hasKeyFormat($array, $keyIsString));

        $this->assertTrue(CollectionValidation::hasKeyFormat($arrayObject, $keyIsString));

        $this->assertTrue(CollectionValidation::hasKeyFormat($fixedArray, $keyIsInteger));
    }

    /**
     * @test
     */
    public function itShouldCheckIfEndsWith()
    {
        $array       = ['one' => 'hello', 'two' => 1];
        $arrayObject = new \ArrayObject($array);
        $fixedArray  = (new \SplFixedArray())->fromArray(\array_values($array));

        $this->assertTrue(CollectionValidation::endsWith($array, '1', false));
        $this->assertTrue(CollectionValidation::endsWith($arrayObject, '1', false));
        $this->assertTrue(CollectionValidation::endsWith($fixedArray, '1', false));

        $array       = [1, 2, 3];
        $arrayObject = new \ArrayObject($array);
        $fixedArray  = (new \SplFixedArray())->fromArray($array);

        $this->assertTrue(CollectionValidation::endsWith($array, 3, true));
        $this->assertTrue(CollectionValidation::endsWith($arrayObject, 3, true));
        $this->assertTrue(CollectionValidation::endsWith($fixedArray, 3, true));

        $this->assertFalse(CollectionValidation::endsWith($array, '3', true));
        $this->assertFalse(CollectionValidation::endsWith($arrayObject, '3', true));
        $this->assertFalse(CollectionValidation::endsWith($fixedArray, '3', true));
    }

    /**
     * @test
     */
    public function itShouldCheckIfContains()
    {
        $array       = ['one' => 'hello', 'two' => 1];
        $arrayObject = new \ArrayObject($array);
        $fixedArray  = (new \SplFixedArray())->fromArray(\array_values($array));

        $this->assertTrue(CollectionValidation::contains($array, 'hello', false));
        $this->assertTrue(CollectionValidation::contains($arrayObject, 'hello', false));
        $this->assertTrue(CollectionValidation::contains($fixedArray, 'hello', false));

        $this->assertTrue(CollectionValidation::contains($array, 1, true));
        $this->assertTrue(CollectionValidation::contains($arrayObject, 1, true));
        $this->assertTrue(CollectionValidation::contains($fixedArray, 1, true));
    }

    /**
     * @test
     */
    public function itShouldCheckIfHasKey()
    {
        $array       = ['one' => 'hello', 'two' => 1];
        $arrayObject = new \ArrayObject($array);
        $fixedArray  = (new \SplFixedArray())->fromArray(\array_values($array));

        $this->assertTrue(CollectionValidation::hasKey($array, 'one'));
        $this->assertTrue(CollectionValidation::hasKey($arrayObject, 'one'));
        $this->assertTrue(CollectionValidation::hasKey($fixedArray, 0));

        $array       = [];
        $arrayObject = new \ArrayObject($array);
        $fixedArray  = (new \SplFixedArray())->fromArray(\array_values($array));

        $this->assertFalse(CollectionValidation::hasKey($array, 0));
        $this->assertFalse(CollectionValidation::hasKey($arrayObject, 0));
        $this->assertFalse(CollectionValidation::hasKey($fixedArray, 0));
    }

    /**
     * @test
     */
    public function itShouldCheckIfLength()
    {
        $array       = ['one' => 'hello', 'two' => 1];
        $arrayObject = new \ArrayObject($array);
        $fixedArray  = (new \SplFixedArray())->fromArray(\array_values($array));

        $this->assertTrue(CollectionValidation::hasLength($array, 2));
        $this->assertTrue(CollectionValidation::hasLength($arrayObject, 2));
        $this->assertTrue(CollectionValidation::hasLength($fixedArray, 2));

        $array       = [];
        $arrayObject = new \ArrayObject($array);
        $fixedArray  = (new \SplFixedArray())->fromArray(\array_values($array));

        $this->assertTrue(CollectionValidation::hasLength($array, 0));
        $this->assertTrue(CollectionValidation::hasLength($arrayObject, 0));
        $this->assertTrue(CollectionValidation::hasLength($fixedArray, 0));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsNotEmpty()
    {
        $array       = ['one' => 'hello', 'two' => 1];
        $arrayObject = new \ArrayObject($array);
        $fixedArray  = (new \SplFixedArray())->fromArray(\array_values($array));

        $this->assertTrue(CollectionValidation::isNotEmpty($array));
        $this->assertTrue(CollectionValidation::isNotEmpty($arrayObject));
        $this->assertTrue(CollectionValidation::isNotEmpty($fixedArray));

        $array       = [];
        $arrayObject = new \ArrayObject($array);
        $fixedArray  = (new \SplFixedArray())->fromArray(\array_values($array));

        $this->assertFalse(CollectionValidation::isNotEmpty($array));
        $this->assertFalse(CollectionValidation::isNotEmpty($arrayObject));
        $this->assertFalse(CollectionValidation::isNotEmpty($fixedArray));
    }

    /**
     * @test
     */
    public function itShouldCheckIfStartsWith()
    {
        $array       = ['one' => 'hello', 'two' => 1];
        $arrayObject = new \ArrayObject($array);
        $fixedArray  = (new \SplFixedArray())->fromArray(\array_values($array));

        $this->assertTrue(CollectionValidation::startsWith($array, 'hello', false));
        $this->assertTrue(CollectionValidation::startsWith($arrayObject, 'hello', false));
        $this->assertTrue(CollectionValidation::startsWith($fixedArray, 'hello', false));

        $array       = [1, 2, 3];
        $arrayObject = new \ArrayObject($array);
        $fixedArray  = (new \SplFixedArray())->fromArray($array);

        $this->assertTrue(CollectionValidation::startsWith($array, 1, true));
        $this->assertTrue(CollectionValidation::startsWith($arrayObject, 1, true));
        $this->assertTrue(CollectionValidation::startsWith($fixedArray, 1, true));

        $this->assertFalse(CollectionValidation::startsWith($array, '1', true));
        $this->assertFalse(CollectionValidation::startsWith($arrayObject, '1', true));
        $this->assertFalse(CollectionValidation::startsWith($fixedArray, '1', true));
    }
}
