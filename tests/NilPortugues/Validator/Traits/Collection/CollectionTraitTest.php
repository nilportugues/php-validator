<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/20/14
 * Time: 5:03 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\NilPortugues\Validator\Traits\Collection;

use NilPortugues\Validator\Traits\Collection\CollectionTrait;
use NilPortugues\Validator\Validator;

/**
 * Class CollectionTraitTest
 * @package Tests\NilPortugues\Validator\Traits\Collection
 */
class CollectionTraitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function itShouldCheckIfIsArray()
    {
        $this->assertTrue(CollectionTrait::isArray(['hello', 'world']));
        $this->assertTrue(CollectionTrait::isArray(new \ArrayObject()));
        $this->assertTrue(CollectionTrait::isArray(new \SplFixedArray()));

        $this->assertFalse(CollectionTrait::isArray('a'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfEach()
    {
        $array       = ['hello', 'world'];
        $arrayObject = new \ArrayObject($array);
        $fixedArray  = (new \SplFixedArray())->fromArray($array);

        $validator     = new Validator();
        $valueIsString = $validator->isString('value')->isAlpha();
        $keyIsInteger  = $validator->isInteger('key')->isPositiveOrZero();

        $this->assertTrue(CollectionTrait::each($array, $valueIsString));
        $this->assertTrue(CollectionTrait::each($array, $valueIsString, $keyIsInteger));

        $this->assertTrue(CollectionTrait::each($arrayObject, $valueIsString));
        $this->assertTrue(CollectionTrait::each($arrayObject, $valueIsString, $keyIsInteger));

        $this->assertTrue(CollectionTrait::each($fixedArray, $valueIsString));
        $this->assertTrue(CollectionTrait::each($fixedArray, $valueIsString, $keyIsInteger));
    }

    /**
     * @test
     */
    public function itShouldCheckIfHasKeyFormat()
    {
        $array       = ['one' => 'hello', 'two' => 'world'];
        $arrayObject = new \ArrayObject($array);
        $fixedArray  = (new \SplFixedArray())->fromArray(array_values($array));

        $validator    = new Validator();
        $keyIsString  = $validator->isString('key')->isAlpha();
        $keyIsInteger = $validator->isInteger('key')->isPositiveOrZero();

        $this->assertTrue(CollectionTrait::hasKeyFormat($array, $keyIsString));

        $this->assertTrue(CollectionTrait::hasKeyFormat($arrayObject, $keyIsString));

        $this->assertTrue(CollectionTrait::hasKeyFormat($fixedArray, $keyIsInteger));
    }

    /**
     * @test
     */
    public function itShouldCheckIfEndsWith()
    {
        $array       = ['one' => 'hello', 'two' => 1];
        $arrayObject = new \ArrayObject($array);
        $fixedArray  = (new \SplFixedArray())->fromArray(array_values($array));

        $this->assertTrue(CollectionTrait::endsWith($array, '1', false));
        $this->assertTrue(CollectionTrait::endsWith($arrayObject, '1', false));
        $this->assertTrue(CollectionTrait::endsWith($fixedArray, '1', false));

        $array       = [1, 2, 3];
        $arrayObject = new \ArrayObject($array);
        $fixedArray  = (new \SplFixedArray())->fromArray($array);

        $this->assertTrue(CollectionTrait::endsWith($array, 3, true));
        $this->assertTrue(CollectionTrait::endsWith($arrayObject, 3, true));
        $this->assertTrue(CollectionTrait::endsWith($fixedArray, 3, true));

        $this->assertFalse(CollectionTrait::endsWith($array, '3', true));
        $this->assertFalse(CollectionTrait::endsWith($arrayObject, '3', true));
        $this->assertFalse(CollectionTrait::endsWith($fixedArray, '3', true));
    }

    /**
     * @test
     */
    public function itShouldCheckIfContains()
    {
        $array       = ['one' => 'hello', 'two' => 1];
        $arrayObject = new \ArrayObject($array);
        $fixedArray  = (new \SplFixedArray())->fromArray(array_values($array));

        $this->assertTrue(CollectionTrait::contains($array, 'hello', false));
        $this->assertTrue(CollectionTrait::contains($arrayObject, 'hello', false));
        $this->assertTrue(CollectionTrait::contains($fixedArray, 'hello', false));

        $this->assertTrue(CollectionTrait::contains($array, 1, true));
        $this->assertTrue(CollectionTrait::contains($arrayObject, 1, true));
        $this->assertTrue(CollectionTrait::contains($fixedArray, 1, true));
    }

    /**
     * @test
     */
    public function itShouldCheckIfHasKey()
    {
        $array       = ['one' => 'hello', 'two' => 1];
        $arrayObject = new \ArrayObject($array);
        $fixedArray  = (new \SplFixedArray())->fromArray(array_values($array));

        $this->assertTrue(CollectionTrait::hasKey($array, 'one'));
        $this->assertTrue(CollectionTrait::hasKey($arrayObject, 'one'));
        $this->assertTrue(CollectionTrait::hasKey($fixedArray, 0));

        $array       = [];
        $arrayObject = new \ArrayObject($array);
        $fixedArray  = (new \SplFixedArray())->fromArray(array_values($array));

        $this->assertFalse(CollectionTrait::hasKey($array, 0));
        $this->assertFalse(CollectionTrait::hasKey($arrayObject, 0));
        $this->assertFalse(CollectionTrait::hasKey($fixedArray, 0));
    }

    /**
     * @test
     */
    public function itShouldCheckIfLength()
    {
        $array       = ['one' => 'hello', 'two' => 1];
        $arrayObject = new \ArrayObject($array);
        $fixedArray  = (new \SplFixedArray())->fromArray(array_values($array));

        $this->assertTrue(CollectionTrait::hasLength($array, 2));
        $this->assertTrue(CollectionTrait::hasLength($arrayObject, 2));
        $this->assertTrue(CollectionTrait::hasLength($fixedArray, 2));

        $array       = [];
        $arrayObject = new \ArrayObject($array);
        $fixedArray  = (new \SplFixedArray())->fromArray(array_values($array));

        $this->assertTrue(CollectionTrait::hasLength($array, 0));
        $this->assertTrue(CollectionTrait::hasLength($arrayObject, 0));
        $this->assertTrue(CollectionTrait::hasLength($fixedArray, 0));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsNotEmpty()
    {
        $array       = ['one' => 'hello', 'two' => 1];
        $arrayObject = new \ArrayObject($array);
        $fixedArray  = (new \SplFixedArray())->fromArray(array_values($array));

        $this->assertTrue(CollectionTrait::isNotEmpty($array));
        $this->assertTrue(CollectionTrait::isNotEmpty($arrayObject));
        $this->assertTrue(CollectionTrait::isNotEmpty($fixedArray));

        $array       = [];
        $arrayObject = new \ArrayObject($array);
        $fixedArray  = (new \SplFixedArray())->fromArray(array_values($array));

        $this->assertFalse(CollectionTrait::isNotEmpty($array));
        $this->assertFalse(CollectionTrait::isNotEmpty($arrayObject));
        $this->assertFalse(CollectionTrait::isNotEmpty($fixedArray));
    }

    /**
     * @test
     */
    public function itShouldCheckIfStartsWith()
    {
        $array       = ['one' => 'hello', 'two' => 1];
        $arrayObject = new \ArrayObject($array);
        $fixedArray  = (new \SplFixedArray())->fromArray(array_values($array));

        $this->assertTrue(CollectionTrait::startsWith($array, 'hello', false));
        $this->assertTrue(CollectionTrait::startsWith($arrayObject, 'hello', false));
        $this->assertTrue(CollectionTrait::startsWith($fixedArray, 'hello', false));

        $array       = [1, 2, 3];
        $arrayObject = new \ArrayObject($array);
        $fixedArray  = (new \SplFixedArray())->fromArray($array);

        $this->assertTrue(CollectionTrait::startsWith($array, 1, true));
        $this->assertTrue(CollectionTrait::startsWith($arrayObject, 1, true));
        $this->assertTrue(CollectionTrait::startsWith($fixedArray, 1, true));

        $this->assertFalse(CollectionTrait::startsWith($array, '1', true));
        $this->assertFalse(CollectionTrait::startsWith($arrayObject, '1', true));
        $this->assertFalse(CollectionTrait::startsWith($fixedArray, '1', true));
    }
}
