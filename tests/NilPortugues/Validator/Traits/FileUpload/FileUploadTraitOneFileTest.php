<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/24/14
 * Time: 4:46 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\NilPortugues\Validator\Traits\FileUpload;

use NilPortugues\Validator\Traits\FileUpload\FileUploadTrait;

/**
 * Class FileUploadTraitTest
 * @package Tests\NilPortugues\Validator\Traits\FileUpload
 */
class FileUploadTraitOneFileTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     */
    protected function setUp()
    {
        $_FILES = [
            'image'    => [
                'name' => 'sample.png',
            ],
            'type'     => 'image/png',
            'tmp_name' => realpath(dirname(__FILE__)).'/resources/phpGpKMlf',
            'error'    => '0',
            'size'     => '203868',
        ];
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsBetween()
    {
        $this->assertTrue(FileUploadTrait::isBetween('image', 0, 2, 'MB', true));
        $this->assertFalse(FileUploadTrait::isBetween('image', 10, 20, 'MB'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsMimeType()
    {
        $this->assertTrue(FileUploadTrait::isMimeType('image', ['image/png', 'image/gif', 'image/jpg']));
        $this->assertFalse(FileUploadTrait::isMimeType('image', ['image/bmp']));
    }

    /**
     * @test
     */
    public function itShouldCheckIfHasFileNameFormat()
    {
    }

    /**
     * @test
     */
    public function itShouldCheckIfHasValidUploadDirectory()
    {
    }

    /**
     * @test
     */
    public function itShouldCheckIfNotOverwritingExistingFile()
    {
    }
}
