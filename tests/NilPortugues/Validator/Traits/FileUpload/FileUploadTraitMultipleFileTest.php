<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/24/14
 * Time: 5:01 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\NilPortugues\Validator\Traits\FileUpload;

class FileUploadTraitMultipleFileTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     */
    protected function setUp()
    {
        $this->markTestIncomplete();

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
}
