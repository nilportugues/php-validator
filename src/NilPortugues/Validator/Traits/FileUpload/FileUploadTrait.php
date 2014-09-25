<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/24/14
 * Time: 1:12 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\Validator\Traits\FileUpload;

use NilPortugues\Validator\AbstractValidator;
use NilPortugues\Validator\Traits\Integer\IntegerTrait;

/**
 * Class FileUploadTrait
 * @package NilPortugues\Validator\Traits\FileUpload
 */
class FileUploadTrait
{
    /**
     * @var array
     */
    private static $byte = [
        'KB' => 1000,
        'MB' => 1000000,
        'GB' => 1000000000,
    ];

    /**
     * Validates if the given data is a file that was uploaded
     *
     * @param string $uploadName
     *
     * @return bool
     */
    public static function isUploaded($uploadName)
    {
        return array_key_exists($uploadName, $_FILES);
    }

    /**
     * @param string $uploadName
     * @param int    $minSize
     * @param int    $maxSize
     * @param string $format
     * @param bool   $inclusive
     *
     * @return bool
     */
    public static function isBetween($uploadName, $minSize, $maxSize, $format = 'B', $inclusive = false)
    {
        $multiplier = 1;

        if (array_key_exists(strtoupper($format), self::$byte)) {
            $multiplier = self::$byte[$format];
        }

        $minSize = $minSize * $multiplier;
        $maxSize = $maxSize * $multiplier;

        if (isset($_FILES[$uploadName]['size']) && is_array($_FILES[$uploadName]['size'])) {
            $isValid = true;
            foreach ($_FILES[$uploadName]['size'] as $size) {
                $isValid = $isValid && IntegerTrait::isBetween($size, $minSize, $maxSize, $inclusive);
            }

            return $isValid;
        }

        if (!isset($_FILES['size'])) {
            return false;
        }

        return IntegerTrait::isBetween($_FILES['size'], $minSize, $maxSize, $inclusive);
    }

    /**
     * @param string $uploadName
     * @param array  $allowedTypes
     *
     * @return bool
     */
    public static function isMimeType($uploadName, array $allowedTypes)
    {
        if (isset($_FILES[$uploadName]['tmp_name']) && is_array($_FILES[$uploadName]['tmp_name'])) {
            $isValid = true;

            foreach ($_FILES[$uploadName]['type'] as $mimeType) {
                $isValid = $isValid && in_array($mimeType, $allowedTypes, true);
            }

            return $isValid;
        }

        if (!isset($_FILES['type'])) {
            return false;
        }


        return in_array($_FILES['type'], $allowedTypes, true);
    }

    /**
     * @param string            $uploadName
     * @param AbstractValidator $validator
     *
     * @return bool
     */
    public static function hasFileNameFormat($uploadName, AbstractValidator $validator)
    {
        if (isset($_FILES[$uploadName]['name']) && is_array($_FILES[$uploadName]['name'])) {
            $isValid = true;
            foreach ($_FILES[$uploadName]['name'] as $name) {
                $isValid = $isValid && $validator->validate($name);
            }

            return $isValid;
        }

        return $validator->validate($_FILES[$uploadName]['name']);
    }

    /**
     * @param $uploadName
     * @param $uploadDir
     *
     * @return bool
     */
    public static function hasValidUploadDirectory($uploadName, $uploadDir)
    {
        if (!isset($_FILES[$uploadName]['name'])) {
            return false;
        }

        return file_exists($uploadDir)
        && is_dir($uploadDir)
        && is_writable($uploadDir);
    }

    /**
     * @param $uploadName
     * @param $uploadDir
     *
     * @return bool
     */
    public static function notOverwritingExistingFile($uploadName, $uploadDir)
    {
        if (isset($_FILES[$uploadName]['name']) && is_array($_FILES[$uploadName]['name'])) {
            $isValid = true;
            foreach ($_FILES[$uploadName]['name'] as $name) {
                $isValid = $isValid && !file_exists($uploadDir.DIRECTORY_SEPARATOR.$name);
            }

            return $isValid;
        }

        if (!isset($_FILES[$uploadName]['name'])) {
            return false;
        }

        return !file_exists($uploadDir.DIRECTORY_SEPARATOR.$_FILES[$uploadName]['name']);
    }
}
