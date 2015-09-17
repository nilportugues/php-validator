<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/26/14
 * Time: 9:29 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\NilPortugues\Validator\Validation\FileUpload;

use NilPortugues\Validator\Validation\FileUpload\FileUploadValidation;

/**
 * Class FileUploadValidatorEmptyFilesVariableTest
 * @package Tests\NilPortugues\Validator\Validation\FileUploadAttribute
 */
class FileUploadValidatorEmptyFilesVariableTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function testFilesVariableEmptyForIsBetween()
    {
        $this->assertFalse(FileUploadValidation::isBetween('property', 0, 1, 'MB'));
    }

    /**
     * @test
     */
    public function testFilesVariableEmptyForIsMimeType()
    {
        $this->assertFalse(FileUploadValidation::isMimeType('property', ['image/jpeg']));
    }

    /**
     * @test
     */
    public function testFilesVariableEmptyForHasValidUploadDirectory()
    {
        $this->assertFalse(FileUploadValidation::hasValidUploadDirectory('property', './'));
    }

    /**
     * @test
     */
    public function testFilesVariableEmptyForNotOverwritingExistingFileMethod()
    {
        $this->assertFalse(FileUploadValidation::notOverwritingExistingFile('property', './'));
    }
}
