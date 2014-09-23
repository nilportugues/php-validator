<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/20/14
 * Time: 11:52 AM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\NilPortugues\Validator\Traits;

use NilPortugues\Validator\Traits\GenericTrait;

/**
 * Class GenericTest
 * @package Tests\NilPortugues\Validator\Traits
 */
class GenericTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function itShouldCheckIfIsRequired()
    {
        $value  = 'asdsdadds';
        $result = GenericTrait::isRequired($value);
        $this->assertTrue($result);

        $value  = null;
        $result = GenericTrait::isRequired($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldCheckIsNotNull()
    {
        $value  = 'asdsdadds';
        $result = GenericTrait::isNotNull($value);
        $this->assertTrue($result);

        $value  = null;
        $result = GenericTrait::isNotNull($value);
        $this->assertFalse($result);

        $value  = '';
        $result = GenericTrait::isNotNull($value);
        $this->assertFalse($result);
    }
}
