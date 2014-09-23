<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/20/14
 * Time: 1:49 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\NilPortugues\Validator\Attribute;

use NilPortugues\Validator\Validator;

/**
 * Class GenericTest
 * @package Tests\NilPortugues\Validator\Attribute
 */
class GenericTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return \NilPortugues\Validator\Attribute\String\String
     */
    protected function getValidator()
    {
        $validator = new Validator();

        return $validator->isString('propertyName');
    }

    /**
     * @test
     */
    public function itIsRequired()
    {
        $this->assertTrue($this->getValidator()->isRequired()->validate('a'));
        $this->assertFalse($this->getValidator()->isRequired()->validate(''));
    }

    /**
     * @test
     */
    public function itIsNotNull()
    {
        $this->assertTrue($this->getValidator()->isNotNull()->validate('a'));
        $this->assertFalse($this->getValidator()->isNotNull()->validate(''));
    }
}
