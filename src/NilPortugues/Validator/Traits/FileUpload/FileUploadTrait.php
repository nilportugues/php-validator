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
     * Validates if the given data is a file that was uploaded
     *
     * @param string $uploadName
     *
     * @return bool
     */
    public static function isUploaded($uploadName)
    {
        return isset($_FILES[$uploadName])
        && isset($_FILES[$uploadName]['error'])
        && (0 === count($_FILES[$uploadName]['error']));
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
        if (!isset($_FILES[$uploadName]['size'])) {
            return false;
        }

        $multiplier = 1;
        switch (strtoupper($format)) {
            case 'KB': $multiplier = 1000;
                break;

            case 'MB': $multiplier = 1000000;
                break;

            case 'GB':$multiplier = 1000000000;
                break;
        }

        return IntegerTrait::isBetween(
            $_FILES[$uploadName]['size'],
            $minSize * $multiplier,
            $maxSize * $multiplier,
            $inclusive
        );
    }

    /**
     * @param string $uploadName
     * @param array  $allowedTypes
     *
     * @return bool
     */
    public static function isMimeType($uploadName, array $allowedTypes)
    {
        if (!isset($_FILES[$uploadName]['tmp_name'])) {
            return false;
        }

        $fileInfo = new \finfo(FILEINFO_MIME_TYPE);
        $mimeType = $fileInfo->file($_FILES[$uploadName]['tmp_name']);

        return in_array($mimeType, $allowedTypes, true);
    }

    /**
     * @param string            $uploadName
     * @param AbstractValidator $validator
     *
     * @return bool
     */
    public static function hasFileNameFormat($uploadName, AbstractValidator $validator)
    {
        if (!isset($_FILES[$uploadName]['name'])) {
            return false;
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
        if (!isset($_FILES[$uploadName]['name'])) {
            return false;
        }

        return file_exists($uploadDir)
        && !file_exists($uploadDir.DIRECTORY_SEPARATOR.$_FILES[$uploadName]['name']);
    }
}
