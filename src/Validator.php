<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/16/14
 * Time: 9:04 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\Validator;

use NilPortugues\Validator\Attribute\Collection\CollectionAttribute;
use NilPortugues\Validator\Attribute\DateTime\DateTimeAttribute;
use NilPortugues\Validator\Attribute\FileUpload\FileUploadAttribute;
use NilPortugues\Validator\Attribute\Numeric\FloatAttribute;
use NilPortugues\Validator\Attribute\Numeric\IntegerAttribute;
use NilPortugues\Validator\Attribute\Object\ObjectAttribute;
use NilPortugues\Validator\Attribute\String\StringAttribute;

/**
 * Class Validator
 * @package NilPortugues\Validator
 */
class Validator
{
    /**
     * @var string
     */
    private $propertyName;

    /**
     * @var string
     */
    private static $language = 'en_GB';

    /**
     * @var string
     */
    private static $errorDir = '/Errors';

    /**
     * @var string
     */
    private $functionMapFile = 'FunctionMap.php';

    /**
     * @var array
     */
    private static $functionMap = [];

    /**
     * @var array
     */
    private static $errorMessages = [];

    /**
     * @var string
     */
    private static $errorMessageFile = '';

    /**
     * @var self
     */
    private static $instances = [];

    /**
     * @param string $errorMessageFile
     *
     * @return \NilPortugues\Validator\Validator
     */
    public static function create($errorMessageFile = '')
    {
        if (!isset(self::$instances[$errorMessageFile])) {
            self::$instances[$errorMessageFile] = new self($errorMessageFile);
        }
        return self::$instances[$errorMessageFile];
    }

    /**
     * @param string $errorMessageFile
     */
    private function __construct($errorMessageFile = '')
    {
        self::buildErrorMessages($errorMessageFile);
        self::buildFunctionMap();
    }

    /**
     * @param string $errorMessageFile
     *
     * @throws \InvalidArgumentException
     */
    private static function buildErrorMessages($errorMessageFile)
    {
        $filePath = $errorMessageFile;

        if ('' == $filePath) {
            $filePath = \realpath(dirname(__FILE__))
                .DIRECTORY_SEPARATOR.self::$errorDir
                .DIRECTORY_SEPARATOR.self::$language.".php";
        }

        if (false === \file_exists($filePath)) {
            throw new \InvalidArgumentException("Language not found.");
        }

        self::$errorMessages = include $filePath;
        self::$errorMessageFile = $filePath;
    }

    /**
     * @throws \RuntimeException
     */
    private function buildFunctionMap()
    {
        $functionMap = \realpath(dirname(__FILE__)).DIRECTORY_SEPARATOR.$this->functionMapFile;

        if (!file_exists($functionMap)) {
            throw new \RuntimeException('FunctionMap not found');
        }

        self::$functionMap = include $functionMap;
    }

    /**
     * @param string $propertyName
     *
     * @return CollectionAttribute
     */
    public function isArray($propertyName)
    {
        return new CollectionAttribute($propertyName, $this, self::$errorMessages, self::$functionMap);
    }

    /**
     * @param string $propertyName
     *
     * @return \NilPortugues\Validator\Attribute\Numeric\IntegerAttribute
     */
    public function isInteger($propertyName)
    {
        return new IntegerAttribute($propertyName, $this, self::$errorMessages, self::$functionMap);
    }

    /**
     * @param string $propertyName
     *
     * @return \NilPortugues\Validator\Attribute\Numeric\FloatAttribute
     */
    public function isFloat($propertyName)
    {
        return new FloatAttribute($propertyName, $this, self::$errorMessages, self::$functionMap);
    }

    /**
     * @param string $propertyName
     *
     * @return \NilPortugues\Validator\Attribute\Object\ObjectAttribute
     */
    public function isObject($propertyName)
    {
        return new ObjectAttribute($propertyName, $this, self::$errorMessages, self::$functionMap);
    }

    /**
     * @param string $propertyName
     *
     * @return \NilPortugues\Validator\Attribute\String\StringAttribute
     */
    public function isString($propertyName)
    {
        return new StringAttribute($propertyName, $this, self::$errorMessages, self::$functionMap);
    }

    /**
     * @param string $propertyName
     *
     * @return \NilPortugues\Validator\Attribute\DateTime\DateTimeAttribute
     */
    public function isDateTime($propertyName)
    {
        return new DateTimeAttribute($propertyName, $this, self::$errorMessages, self::$functionMap);
    }

    /**
     * @param string $propertyName
     *
     * @return \NilPortugues\Validator\Attribute\FileUpload\FileUploadAttribute
     */
    public function isFileUpload($propertyName)
    {
        return new FileUploadAttribute($propertyName, $this, self::$errorMessages, self::$functionMap);
    }
}
