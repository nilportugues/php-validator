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
        'K'  => 1000,
        'KB' => 1000,
        'M'  => 1000000,
        'MB' => 1000000,
        'G'  => 1000000000,
        'GB' => 1000000000,
        'T'  => 1000000000000,
        'TB' => 1000000000000,
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
     * @return int
     */
    private static function getMaxServerFileSize()
    {
        $maxFileSize     = min(ini_get('post_max_size'), ini_get('upload_max_filesize'));
        $maxFileSizeUnit = preg_replace('/\d/', '', $maxFileSize);

        $finalMaxFileSize = 0;
        if (array_key_exists(strtoupper($maxFileSizeUnit), self::$byte)) {
            $multiplier       = self::$byte[$maxFileSizeUnit];
            $finalMaxFileSize = preg_replace("/[^0-9,.]/", "", $maxFileSize);
            $finalMaxFileSize = $finalMaxFileSize * $multiplier;
        }

        return (int) $finalMaxFileSize;
    }

    /**
     * @param string  $uploadName
     * @param integer $minSize
     * @param integer $maxSize
     * @param string  $format
     * @param bool    $inclusive
     *
     * @return bool
     * @throws FileUploadException
     */
    public static function isBetween($uploadName, $minSize, $maxSize, $format = 'B', $inclusive = false)
    {
        $multiplier = 1;
        if (array_key_exists(strtoupper($format), self::$byte)) {
            $multiplier = self::$byte[$format];
        }

        $minSize = $minSize * $multiplier;
        $maxSize = $maxSize * $multiplier;
        $maxSize = min(self::getMaxServerFileSize(), $maxSize);

        if (isset($_FILES[$uploadName]['size']) && is_array($_FILES[$uploadName]['size'])) {
            $isValid = true;
            foreach ($_FILES[$uploadName]['size'] as $size) {
                self::checkIfMaximumUploadFileSizeHasBeenExceeded($uploadName, $maxSize, $size);
                $isValid = $isValid && IntegerTrait::isBetween($size, $minSize, $maxSize, $inclusive);
            }

            return $isValid;
        }

        if (!isset($_FILES[$uploadName]['size'])) {
            return false;
        }

        self::checkIfMaximumUploadFileSizeHasBeenExceeded($uploadName, $maxSize, $_FILES[$uploadName]['size']);

        return IntegerTrait::isBetween($_FILES[$uploadName]['size'], $minSize, $maxSize, $inclusive);
    }

    /**
     * @param string $uploadName
     * @param $size
     * @param $maxSize
     *
     * @throws FileUploadException
     */
    private static function checkIfMaximumUploadFileSizeHasBeenExceeded($uploadName, $size, $maxSize)
    {
        if ($size < $maxSize) {
            throw new FileUploadException($uploadName);
        }
    }

    /**
     * @param $filePath
     *
     * @return mixed
     */
    private static function getMimeType($filePath)
    {
        $fileInfo = @finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = @finfo_file($fileInfo, $filePath);
        finfo_close($fileInfo);

        return $mimeType;
    }

    /**
     * @param string   $uploadName
     * @param string[] $allowedTypes
     *
     * @return bool
     */
    public static function isMimeType($uploadName, array $allowedTypes)
    {
        if (isset($_FILES[$uploadName]['tmp_name']) && is_array($_FILES[$uploadName]['tmp_name'])) {
            $isValid = true;

            array_filter($_FILES[$uploadName]['tmp_name']);
            foreach ($_FILES[$uploadName]['tmp_name'] as $name) {
                $isValid = $isValid && in_array(self::getMimeType($name), $allowedTypes, true);
            }

            return $isValid;
        }

        if (!isset($_FILES[$uploadName]['tmp_name'])) {
            return false;
        }

        return in_array(self::getMimeType($_FILES[$uploadName]['tmp_name']), $allowedTypes, true);
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
     * @param string $uploadName
     * @param string $uploadDir
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
     * @param string $uploadName
     * @param string $uploadDir
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

    /**
     * @param string  $uploadName
     * @param integer $size
     *
     * @return bool
     */
    public static function hasLength($uploadName, $size)
    {
        settype($size, 'int');

        if (isset($_FILES[$uploadName]['name']) && is_array($_FILES[$uploadName]['name']) && $size >= 0) {
            return $size == count($_FILES[$uploadName]['name']);
        }

        return 1 == $size && isset($_FILES[$uploadName]['name']);
    }

    /**
     * @param string $uploadName
     *
     * @return bool
     */
    public static function isImage($uploadName)
    {
        return self::isMimeType($uploadName, ['image/gif', 'image/jpeg', 'image/png']);
    }
}
