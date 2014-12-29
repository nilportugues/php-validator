<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/26/14
 * Time: 7:43 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\NilPortugues\Validator\Traits\FileUpload;

use NilPortugues\Validator\Traits\FileUpload\FileUploadException;

/**
 * Class FileUploadExceptionTest
 * @package Tests\NilPortugues\Validator\Traits\FileUpload
 */
class FileUploadExceptionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function itShouldReturnErrorForNonMultipleFilesArray()
    {
        $_FILES = [
            'image' => [
                'name'     => 'sample.png',
                'type'     => 'image/png',
                'tmp_name' => realpath(dirname(__FILE__)).'/resources/phpGpKMlf',
                'error'    => 1,
                'size'     => '203868',
            ],
        ];

        $this->setExpectedException(
            'NilPortugues\Validator\Traits\FileUpload\FileUploadException',
            'FileUpload::UPLOAD_ERR_INI_SIZE'
        );
        throw new FileUploadException('image');
    }

    /**
     * @test
     */
    public function itShouldReturnErrorForMultipleFilesArray()
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
                'error'    => [1, 1, 1],
                'size'     => [203868, 203868, 203868],
            ],
        ];

        $this->setExpectedException(
            'NilPortugues\Validator\Traits\FileUpload\FileUploadException',
            'FileUpload::UPLOAD_ERR_INI_SIZE'
        );
        throw new FileUploadException('image');
    }
}
