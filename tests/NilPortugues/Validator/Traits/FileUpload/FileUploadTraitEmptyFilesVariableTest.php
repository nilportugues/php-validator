<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/26/14
 * Time: 9:29 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\NilPortugues\Validator\Traits\FileUpload;

use NilPortugues\Validator\Traits\FileUpload\FileUploadTrait;

/**
 * Class FileUploadTraitEmptyFilesVariableTest
 * @package Tests\NilPortugues\Validator\Traits\FileUpload
 */
class FileUploadTraitEmptyFilesVariableTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function testFilesVariableEmptyForIsBetween()
    {
        $this->assertFalse(FileUploadTrait::isBetween('property', 0, 1, 'MB'));
    }

    /**
     * @test
     */
    public function testFilesVariableEmptyForIsMimeType()
    {
        $this->assertFalse(FileUploadTrait::isMimeType('property', ['image/jpeg']));
    }

    /**
     * @test
     */
    public function testFilesVariableEmptyForHasValidUploadDirectory()
    {
        $this->assertFalse(FileUploadTrait::hasValidUploadDirectory('property', './'));
    }

    /**
     * @test
     */
    public function testFilesVariableEmptyForNotOverwritingExistingFileMethod()
    {
        $this->assertFalse(FileUploadTrait::notOverwritingExistingFile('property', './'));
    }
}
