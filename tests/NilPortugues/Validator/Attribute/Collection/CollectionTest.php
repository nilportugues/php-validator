<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/20/14
 * Time: 6:59 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\NilPortugues\Validator\Attribute\Collection;

use NilPortugues\Validator\Validator;

class CollectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return \NilPortugues\Validator\Attribute\Collection\Collection
     */
    protected function getValidator()
    {
        $validator = new Validator();

        return $validator->isArray('propertyName');
    }

    /**
     * @test
     */
    public function it_should_check_if_is_array()
    {
        $this->assertTrue($this->getValidator()->validate(['hello', 'world']));
        $this->assertTrue($this->getValidator()->validate(new \ArrayObject()));
        $this->assertTrue($this->getValidator()->validate(new \SplFixedArray()));

        $this->assertFalse($this->getValidator()->validate('a'));
    }

    /**
     * @test
     */
    public function it_should_check_if_each()
    {
        $array       = ['hello', 'world'];
        $arrayObject = new \ArrayObject($array);
        $fixedArray  = (new \SplFixedArray())->fromArray($array);

        $validator     = new Validator();
        $valueIsString = $validator->isString('value')->isAlpha();
        $keyIsInteger  = $validator->isInteger('key')->isPositive();

        $this->assertTrue($this->getValidator()->each($valueIsString)->validate($array));
        $this->assertTrue($this->getValidator()->each($valueIsString, $keyIsInteger)->validate($array));

        $this->assertTrue($this->getValidator()->each($valueIsString)->validate($arrayObject));
        $this->assertTrue($this->getValidator()->each($valueIsString, $keyIsInteger)->validate($arrayObject));

        $this->assertTrue($this->getValidator()->each($valueIsString)->validate($fixedArray));
        $this->assertTrue($this->getValidator()->each($valueIsString, $keyIsInteger)->validate($fixedArray));
    }

    /**
     * @test
     */
    public function it_should_check_if_has_key_format()
    {
        $array       = ['one' => 'hello', 'two' => 'world'];
        $arrayObject = new \ArrayObject($array);
        $fixedArray  = (new \SplFixedArray())->fromArray(array_values($array));

        $validator    = new Validator();
        $keyIsString  = $validator->isString('key')->isAlpha();
        $keyIsInteger = $validator->isInteger('key')->isPositive();

        $this->assertTrue($this->getValidator()->hasKeyFormat($keyIsString)->validate($array));

        $this->assertTrue($this->getValidator()->hasKeyFormat($keyIsString)->validate($arrayObject));

        $this->assertTrue($this->getValidator()->hasKeyFormat($keyIsInteger)->validate($fixedArray));
    }

    /**
     * @test
     */
    public function it_should_check_if_ends_with()
    {
        $array       = ['one' => 'hello', 'two' => 1];
        $arrayObject = new \ArrayObject($array);
        $fixedArray  = (new \SplFixedArray())->fromArray(array_values($array));

        $this->assertTrue($this->getValidator()->endsWith('1', false)->validate($array));
        $this->assertTrue($this->getValidator()->endsWith('1', false)->validate($arrayObject));
        $this->assertTrue($this->getValidator()->endsWith('1', false)->validate($fixedArray));

        $array       = [1, 2, 3];
        $arrayObject = new \ArrayObject($array);
        $fixedArray  = (new \SplFixedArray())->fromArray($array);

        $this->assertTrue($this->getValidator()->endsWith(3, true)->validate($array));
        $this->assertTrue($this->getValidator()->endsWith(3, true)->validate($arrayObject));
        $this->assertTrue($this->getValidator()->endsWith(3, true)->validate($fixedArray));

        $this->assertFalse($this->getValidator()->endsWith('3', true)->validate($array));
        $this->assertFalse($this->getValidator()->endsWith('3', true)->validate($arrayObject));
        $this->assertFalse($this->getValidator()->endsWith('3', true)->validate($fixedArray));
    }

    /**
     * @test
     */
    public function it_should_check_if_contains()
    {
        $array       = ['one' => 'hello', 'two' => 1];
        $arrayObject = new \ArrayObject($array);
        $fixedArray  = (new \SplFixedArray())->fromArray(array_values($array));

        $this->assertTrue($this->getValidator()->contains('hello', false)->validate($array));
        $this->assertTrue($this->getValidator()->contains('hello', false)->validate($arrayObject));
        $this->assertTrue($this->getValidator()->contains('hello', false)->validate($fixedArray));

        $this->assertTrue($this->getValidator()->contains(1, true)->validate($array));
        $this->assertTrue($this->getValidator()->contains(1, true)->validate($arrayObject));
        $this->assertTrue($this->getValidator()->contains(1, true)->validate($fixedArray));
    }

    /**
     * @test
     */
    public function it_should_check_if_has_key()
    {
        $array       = ['one' => 'hello', 'two' => 1];
        $arrayObject = new \ArrayObject($array);
        $fixedArray  = (new \SplFixedArray())->fromArray(array_values($array));

        $this->assertTrue($this->getValidator()->hasKey('one')->validate($array));
        $this->assertTrue($this->getValidator()->hasKey('one')->validate($arrayObject));
        $this->assertTrue($this->getValidator()->hasKey(0)->validate($fixedArray));

        $array       = [];
        $arrayObject = new \ArrayObject($array);
        $fixedArray  = (new \SplFixedArray())->fromArray(array_values($array));

        $this->assertFalse($this->getValidator()->hasKey(0)->validate($array));
        $this->assertFalse($this->getValidator()->hasKey(0)->validate($arrayObject));
        $this->assertFalse($this->getValidator()->hasKey(0)->validate($fixedArray));
    }

    /**
     * @test
     */
    public function it_should_check_if_length()
    {
        $array       = ['one' => 'hello', 'two' => 1];
        $arrayObject = new \ArrayObject($array);
        $fixedArray  = (new \SplFixedArray())->fromArray(array_values($array));

        $this->assertTrue($this->getValidator()->length(2)->validate($array));
        $this->assertTrue($this->getValidator()->length(2)->validate($arrayObject));
        $this->assertTrue($this->getValidator()->length(2)->validate($fixedArray));

        $array       = [];
        $arrayObject = new \ArrayObject($array);
        $fixedArray  = (new \SplFixedArray())->fromArray(array_values($array));

        $this->assertTrue($this->getValidator()->length(0)->validate($array));
        $this->assertTrue($this->getValidator()->length(0)->validate($arrayObject));
        $this->assertTrue($this->getValidator()->length(0)->validate($fixedArray));
    }

    /**
     * @test
     */
    public function it_should_check_if_is_not_empty()
    {
        $array       = ['one' => 'hello', 'two' => 1];
        $arrayObject = new \ArrayObject($array);
        $fixedArray  = (new \SplFixedArray())->fromArray(array_values($array));

        $this->assertTrue($this->getValidator()->isNotEmpty()->validate($array));
        $this->assertTrue($this->getValidator()->isNotEmpty()->validate($arrayObject));
        $this->assertTrue($this->getValidator()->isNotEmpty()->validate($fixedArray));

        $array       = [];
        $arrayObject = new \ArrayObject($array);
        $fixedArray  = (new \SplFixedArray())->fromArray(array_values($array));

        $this->assertFalse($this->getValidator()->isNotEmpty()->validate($array));
        $this->assertFalse($this->getValidator()->isNotEmpty()->validate($arrayObject));
        $this->assertFalse($this->getValidator()->isNotEmpty()->validate($fixedArray));
    }

    /**
     * @test
     */
    public function it_should_check_if_starts_with()
    {
        $array       = ['one' => 'hello', 'two' => 1];
        $arrayObject = new \ArrayObject($array);
        $fixedArray  = (new \SplFixedArray())->fromArray(array_values($array));

        $this->assertTrue($this->getValidator()->startsWith('hello', false)->validate($array));
        $this->assertTrue($this->getValidator()->startsWith('hello', false)->validate($arrayObject));
        $this->assertTrue($this->getValidator()->startsWith('hello', false)->validate($fixedArray));

        $array       = [1, 2, 3];
        $arrayObject = new \ArrayObject($array);
        $fixedArray  = (new \SplFixedArray())->fromArray($array);

        $this->assertTrue($this->getValidator()->startsWith(1, true)->validate($array));
        $this->assertTrue($this->getValidator()->startsWith(1, true)->validate($arrayObject));
        $this->assertTrue($this->getValidator()->startsWith(1, true)->validate($fixedArray));

        $this->assertFalse($this->getValidator()->startsWith('1', true)->validate($array));
        $this->assertFalse($this->getValidator()->startsWith('1', true)->validate($arrayObject));
        $this->assertFalse($this->getValidator()->startsWith('1', true)->validate($fixedArray));
    }
}
