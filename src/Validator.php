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

use NilPortugues\Validator\Attribute\Collection\Collection;
use NilPortugues\Validator\Attribute\DateTime\DateTime;
use NilPortugues\Validator\Attribute\FileUpload\FileUpload;
use NilPortugues\Validator\Attribute\Numeric\Float as FloatValidator;
use NilPortugues\Validator\Attribute\Numeric\Integer;
use NilPortugues\Validator\Attribute\Object\Object;
use NilPortugues\Validator\Attribute\String\String as StringValidator;

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
    private $language = 'en_GB';

    /**
     * @var string
     */
    private $errorDir = '/Errors';

    /**
     * @var string
     */
    private $functionMapFile = 'FunctionMap.php';

    /**
     * @var array
     */
    private $functionMap = [];

    /**
     * @var array
     */
    private $errorMessages = [];

    /**
     * @var string
     */
    private static $errorMessageFile = '';

    /**
     * @param string $errorMessageFile
     */
    public function __construct($errorMessageFile = '')
    {
        $this->buildErrorMessages($errorMessageFile);
        $this->buildFunctionMap();
    }

    /**
     * @param string $errorMessageFile
     *
     * @throws \InvalidArgumentException
     */
    private function buildErrorMessages($errorMessageFile)
    {
        $filePath = $errorMessageFile;

        if ('' == $filePath) {
            $filePath = realpath(dirname(__FILE__))
                .DIRECTORY_SEPARATOR.$this->errorDir
                .DIRECTORY_SEPARATOR.$this->language.".php";
        }

        if (false === file_exists($filePath)) {
            throw new \InvalidArgumentException("Language not found.");
        }

        $this->errorMessages = include $filePath;
        self::$errorMessageFile = $filePath;
    }

    /**
     * @throws \RuntimeException
     */
    private function buildFunctionMap()
    {
        $functionMap = realpath(dirname(__FILE__)).DIRECTORY_SEPARATOR.$this->functionMapFile;

        if (!file_exists($functionMap)) {
            throw new \RuntimeException('FunctionMap not found');
        }

        $this->functionMap = include $functionMap;
    }

    /**
     * Creates a validator based on the provided information.
     *
     * @param string $name
     * @param string $type
     * @param string[]  $rules
     *
     * @return AbstractValidator
     */
    public static function create($name, $type, array $rules = [])
    {
        $validator = new self;

        if (!empty(self::$errorMessageFile)) {
            $validator->errorMessages = include self::$errorMessageFile;
        }

        return (new ValidatorFactory($validator))->create($name, $type, $rules);
    }

    /**
     * @param string $propertyName
     *
     * @return Collection
     */
    public function isArray($propertyName)
    {
        $this->propertyName = $propertyName;

        return new Collection($this, $this->errorMessages, $this->functionMap);
    }

    /**
     * @param string $propertyName
     *
     * @return \NilPortugues\Validator\Attribute\Numeric\Integer
     */
    public function isInteger($propertyName)
    {
        $this->propertyName = $propertyName;

        return new Integer($this, $this->errorMessages, $this->functionMap);
    }

    /**
     * @param string $propertyName
     *
     * @return \NilPortugues\Validator\Attribute\Numeric\Float
     */
    public function isFloat($propertyName)
    {
        $this->propertyName = $propertyName;

        return new FloatValidator($this, $this->errorMessages, $this->functionMap);
    }

    /**
     * @param string $propertyName
     *
     * @return \NilPortugues\Validator\Attribute\Object\Object
     */
    public function isObject($propertyName)
    {
        $this->propertyName = $propertyName;

        return new Object($this, $this->errorMessages, $this->functionMap);
    }

    /**
     * @param string $propertyName
     *
     * @return \NilPortugues\Validator\Attribute\String\String
     */
    public function isString($propertyName)
    {
        $this->propertyName = $propertyName;

        return new StringValidator($this, $this->errorMessages, $this->functionMap);
    }

    /**
     * @param string $propertyName
     *
     * @return \NilPortugues\Validator\Attribute\DateTime\DateTime
     */
    public function isDateTime($propertyName)
    {
        $this->propertyName = $propertyName;

        return new DateTime($this, $this->errorMessages, $this->functionMap);
    }

    /**
     * @param string $propertyName
     *
     * @return \NilPortugues\Validator\Attribute\FileUpload\FileUpload
     */
    public function isFileUpload($propertyName)
    {
        $this->propertyName = $propertyName;

        return new FileUpload($this, $this->errorMessages, $this->functionMap);
    }

    /**
     * @return string
     */
    public function getPropertyName()
    {
        return $this->propertyName;
    }
}
