<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 12/30/14
 * Time: 1:15 AM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\NilPortugues\Validator;

/**
 * Class BaseValidatorTest
 * @package Tests\NilPortugues\Validator
 */
class BaseValidatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var DummyValidator
     */
    protected $validator;

    /**
     *
     */
    protected function setUp()
    {
        $this->validator = new DummyValidator();
    }

    /**
     * @test
     */
    public function itShouldAssertFalse()
    {
        $this->assertFalse($this->validator->validate('email', 'not-an-email'));
        $this->assertNotEmpty($this->validator->getErrors());
    }

    /**
     * @test
     */
    public function itShouldAssertTrue()
    {
        $this->assertTrue($this->validator->validate('email', 'support@apple.com'));
        $this->assertEmpty($this->validator->getErrors());
    }
}
