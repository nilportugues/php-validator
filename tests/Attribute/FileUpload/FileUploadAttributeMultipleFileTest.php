<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/24/14
 * Time: 5:01 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\NilPortugues\Validator\Attribute\FileUpload;

use NilPortugues\Validator\Validator;

/**
 * Class FileUploadAttributeMultipleFileTest
 * @package Tests\NilPortugues\Validator\Attribute\FileUploadAttribute
 */
class FileUploadAttributeMultipleFileTest extends \PHPUnit_Framework_TestCase
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
                'error'    => [0, 0, 0],
                'size'     => [203868, 203868, 203868],
            ],
        ];
    }

    /**
     * @return \NilPortugues\Validator\Attribute\FileUpload\FileUploadAttribute
     */
    private function getValidator()
    {
        $validator = Validator::create();

        return $validator->isFileUpload('image');
    }

    /**
     * @test
     */
    public function itShouldCheckIfHasLength()
    {
        $this->assertTrue($this->getValidator()->hasLength(3)->validate('image'));
        $this->assertFalse($this->getValidator()->hasLength(2)->validate('image'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsBetween()
    {
        $this->assertTrue($this->getValidator()->isBetween(0, 2, 'MB', true)->validate('image'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsMimeType()
    {
        $this->assertTrue(
            $this->getValidator()
                ->isMimeType(['image/png', 'image/gif', 'image/jpg'])
                ->validate('image')
        );

        $this->assertFalse(
            $this->getValidator()
                ->isMimeType(['image/bmp'])
                ->validate('image')
        );
    }

    /**
     * @test
     */
    public function itShouldCheckIfHasFileNameFormat()
    {
        $validator       = Validator::create();
        $stringValidator = $validator->isString('image')->isLowercase();

        $this->assertTrue($this->getValidator()->hasFileNameFormat($stringValidator)->validate('image'));

        $stringValidator         = $validator->isString('image')->isAlphanumeric();
        $_FILES['image']['name'] = '@sample.png';
        $this->assertFalse($this->getValidator()->hasFileNameFormat($stringValidator)->validate('image'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfHasValidUploadDirectory()
    {
        $this->assertTrue(
            $this->getValidator()
                ->hasValidUploadDirectory(realpath(dirname(__FILE__)).'/resources/')
                ->validate('image')
        );
        $this->assertFalse(
            $this->getValidator()
                ->hasValidUploadDirectory(realpath(dirname(__FILE__)).'/not/')
                ->validate('image')
        );
    }

    /**
     * @test
     */
    public function itShouldCheckIfNotOverwritingExistingFile()
    {
        $this->assertFalse(
            $this->getValidator()
                ->notOverwritingExistingFile(realpath(dirname(__FILE__)).'/resources')
                ->validate('image')
        );

        $_FILES['image']['name'] = 'a.png';
        $this->assertTrue(
            $this->getValidator()
                ->notOverwritingExistingFile(realpath(dirname(__FILE__)).'/resources')
                ->validate('image')
        );
    }
}
