<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/18/14
 * Time: 8:57 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\NilPortugues\Validator;

use NilPortugues\Validator\ValidatorFunctionMap;

/**
 * Class ValidatorFunctionMapTest
 * @package Tests\NilPortugues\Validator
 */
class ValidatorFunctionMapTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function itShouldInvalidArgumentExceptionWhenFunctionNoInMap()
    {
        $abstractValidator = $this
            ->getMockBuilder('NilPortugues\Validator\AbstractValidator')
            ->disableOriginalConstructor()
            ->getMock();

        $functionMapArray = [];
        $functionMap      = ValidatorFunctionMap::getInstance($abstractValidator, $functionMapArray);
        $errors           = [];
        $errorValues      = [];

        $this->setExpectedException(
            '\InvalidArgumentException',
            'Validator key \'a-function-name-that-doesnt-exist\' not found'
        );
        $functionMap->get('property', 'a-function-name-that-doesnt-exist', [], $errorValues, $errors);
    }

    /**
     * @test
     */
    public function itShouldThrowExceptionWhenErrorMessageDoesNotExist()
    {
        $abstractValidator = $this
            ->getMockBuilder('NilPortugues\Validator\AbstractValidator')
            ->disableOriginalConstructor()
            ->getMock();

        $functionMapArray = ['String::isAlpha' => '\NilPortugues\Validator\Validation\String\StringValidation::isAlpha'];
        $functionMap      = ValidatorFunctionMap::getInstance($abstractValidator, $functionMapArray);
        $errors           = [];
        $values           = ['@'];

        $this->setExpectedException(
            '\InvalidArgumentException',
            'Validator key \'string.is_alpha\' not found in error file'
        );
        $functionMap->get('property', 'StringAttribute::isAlpha', $values, $values, $errors);
    }

    /**
     * @test
     */
    public function itShouldFileUploadException()
    {
        $_FILES = [
            'image' => [
                'name'     => 'sample.png',
                'type'     => 'image/png',
                'tmp_name' => \realpath(dirname(__FILE__)).'/Traits/FileUpload/resources/phpGpKMlf',
                'error'    => 1,
                'size'     => '200003868',
            ],
        ];

        $abstractValidator = $this
            ->getMockBuilder('NilPortugues\Validator\AbstractValidator')
            ->disableOriginalConstructor()
            ->getMock();

        $functionMapArray = [
            'FileUploadAttribute::isBetween' => '\Tests\NilPortugues\Validator\Resources\DummyFileUpload::isBetween',
        ];

        $functionMap =  ValidatorFunctionMap::getInstance($abstractValidator, $functionMapArray);
        $values      = ['image', 0, 2, 'MB', true];
        $errors      = ['FileUpload::UPLOAD_ERR_INI_SIZE' => 'error message'];

        $this->assertFalse($functionMap->get('image', 'FileUploadAttribute::isBetween', $values, $values, $errors));
    }
}
