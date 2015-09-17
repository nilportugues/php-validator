<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/20/14
 * Time: 11:52 AM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\NilPortugues\Validator\Validation;

use NilPortugues\Validator\Validation\GenericValidation;

/**
 * Class GenericAttributeTest
 * @package Tests\NilPortugues\Validator\Validation
 */
class GenericTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function itShouldCheckIfIsRequired()
    {
        $value  = 'asdsdadds';
        $result = GenericValidation::isRequired($value);
        $this->assertTrue($result);

        $value  = null;
        $result = GenericValidation::isRequired($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldCheckIsNotNull()
    {
        $value  = 'asdsdadds';
        $result = GenericValidation::isNotNull($value);
        $this->assertTrue($result);

        $value  = null;
        $result = GenericValidation::isNotNull($value);
        $this->assertFalse($result);

        $value  = '';
        $result = GenericValidation::isNotNull($value);
        $this->assertFalse($result);
    }
}
