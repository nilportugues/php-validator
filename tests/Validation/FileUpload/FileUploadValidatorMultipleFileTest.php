<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/24/14
 * Time: 5:01 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\NilPortugues\Validator\Validation\FileUpload;

use NilPortugues\Validator\Validation\FileUpload\FileUploadValidation;
use NilPortugues\Validator\Validator;

class FileUploadValidatorMultipleFileTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     */
    protected function setUp()
    {
        $_FILES = [
            'image' => [
                'name'     => ['sample.png', 'sample.png', 'sample.png'],
                'type'     => ['image/png', 'image/png', 'image/png'],
                'tmp_name' => [
                    realpath(dirname(__FILE__)).'/resources/phpGpKMlf',
                    realpath(dirname(__FILE__)).'/resources/phpGpKMlf',
                    realpath(dirname(__FILE__)).'/resources/phpGpKMlf',
                ],
                'error'    => [],
                'size'     => [203868, 203868, 203868],
            ],
        ];
    }

    /**
     * @test
     */
    public function itShouldCheckIfHasLength()
    {
        $this->assertTrue(FileUploadValidation::hasLength('image', 3));
        $this->assertFalse(FileUploadValidation::hasLength('image', 2));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsBetween()
    {
        $this->assertTrue(FileUploadValidation::isBetween('image', 0, 2, 'MB', true));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsMimeType()
    {
        $this->assertTrue(FileUploadValidation::isMimeType('image', ['image/png', 'image/gif', 'image/jpg']));
        $this->assertFalse(FileUploadValidation::isMimeType('image', ['image/bmp']));
    }

    /**
     * @test
     */
    public function itShouldCheckIfHasFileNameFormat()
    {
        $validator       = Validator::create();
        $stringValidator = $validator->isString('image')->isLowercase();

        $this->assertTrue(FileUploadValidation::hasFileNameFormat('image', $stringValidator));

        $stringValidator         = $validator->isString('image')->isAlphanumeric();
        $_FILES['image']['name'] = '@sample.png';
        $this->assertFalse(FileUploadValidation::hasFileNameFormat('image', $stringValidator));
    }

    /**
     * @test
     */
    public function itShouldCheckIfHasValidUploadDirectory()
    {
        $this->assertTrue(
            FileUploadValidation::hasValidUploadDirectory('image', realpath(dirname(__FILE__)).'/resources/')
        );
        $this->assertFalse(FileUploadValidation::hasValidUploadDirectory('image', realpath(dirname(__FILE__)).'/not/'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfNotOverwritingExistingFile()
    {
        $this->assertFalse(
            FileUploadValidation::notOverwritingExistingFile('image', realpath(dirname(__FILE__)).'/resources')
        );

        $_FILES['image']['name'] = 'a.png';
        $this->assertTrue(
            FileUploadValidation::notOverwritingExistingFile('image', realpath(dirname(__FILE__)).'/resources')
        );
    }
}
