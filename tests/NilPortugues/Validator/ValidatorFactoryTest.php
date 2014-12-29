<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 12/29/14
 * Time: 9:39 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\NilPortugues\Validator;

use NilPortugues\Validator\Validator;

/**
 * Class ValidatorFactoryTest
 * @package Tests\NilPortugues\Validator
 */
class ValidatorFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function itShouldGetStringValidatorAndReturnFalse()
    {
        $stringValidator = Validator::create('field1', 'string', ['between:5:11']);

        $this->assertInstanceOf('\NilPortugues\Validator\Attribute\String\String', $stringValidator);
        $this->assertFalse($stringValidator->validate('hello world'));
    }

    /**
     * @test
     */
    public function itShouldGetStringValidatorWithBooleanValueAndReturnFalse()
    {
        $stringValidator = Validator::create('field1', 'string', ['between:5:11:false']);
        $this->assertFalse($stringValidator->validate('hello world'));
    }

    /**
     * @test
     */
    public function itShouldGetStringValidatorAndReturnTrue()
    {
        $stringValidator = Validator::create('field1', 'string', ['between:5:11:true']);
        $this->assertTrue($stringValidator->validate('hello world'));
    }

    /**
     * @test
     */
    public function itShouldGetStringValidatorAndAssertTrueUsingAllMethodAliases()
    {
        $stringValidator = Validator::create('field1', 'string', ['is_email']);
        $this->assertTrue($stringValidator->validate('support@apple.com'));

        $stringValidator = Validator::create('field2', 'string', ['isEmail']);
        $this->assertTrue($stringValidator->validate('support@apple.com'));

        $stringValidator = Validator::create('field3', 'string', ['email']);
        $this->assertTrue($stringValidator->validate('support@apple.com'));
    }

    /**
     * @test
     */
    public function itShouldThrowValidatorFactoryException()
    {
        $this->setExpectedException('NilPortugues\Validator\Factory\ValidatorFactoryException');
        Validator::create('field1', 'not-a-valid-type');
    }
}
