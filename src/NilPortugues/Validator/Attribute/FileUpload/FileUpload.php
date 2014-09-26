<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/24/14
 * Time: 3:04 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\Validator\Attribute\FileUpload;

use NilPortugues\Validator\AbstractValidator;
use NilPortugues\Validator\Validator;

/**
 * Class FileUpload
 * @package NilPortugues\Validator\Attribute\FileUpload
 */
class FileUpload extends AbstractValidator
{
    /**
     * @param Validator $validator
     * @param array     $errorMessages
     * @param array     $functionMap
     */
    public function __construct(Validator $validator, array &$errorMessages, array &$functionMap)
    {
        parent::__construct($validator, $errorMessages, $functionMap);

        $this->addCondition(__METHOD__);
    }

    /**
     * @param int    $minSize
     * @param int    $maxSize
     * @param string $format
     * @param bool   $inclusive
     *
     * @return $this
     */
    public function isBetween($minSize, $maxSize, $format = 'B', $inclusive = false)
    {
        $this->addCondition(
            __METHOD__,
            [$minSize, $maxSize, $format, $inclusive],
            [
                'min'    => $minSize,
                'max'    => $maxSize,
                'format' => (strtoupper($format[0]) == 'B') ? '' : strtoupper($format[0])
            ]
        );

        return $this;
    }

    /**
     * @param string[] $allowedTypes
     *
     * @return $this
     */
    public function isMimeType(array $allowedTypes)
    {
        $this->addCondition(__METHOD__, [$allowedTypes], []);

        return $this;
    }

    /**
     * @param AbstractValidator $validator
     *
     * @return $this
     */
    public function hasFileNameFormat(AbstractValidator $validator)
    {
        $this->addCondition(__METHOD__, [$validator]);

        return $this;
    }

    /**
     * @param string $uploadDir
     *
     * @return $this
     */
    public function hasValidUploadDirectory($uploadDir)
    {
        $this->addCondition(__METHOD__, [$uploadDir]);

        return $this;
    }

    /**
     * @param string $uploadDir
     *
     * @return $this
     */
    public function notOverwritingExistingFile($uploadDir)
    {
        $this->addCondition(__METHOD__, [$uploadDir]);

        return $this;
    }

    /**
     * @param integer $length
     *
     * @return $this
     */
    public function hasLength($length)
    {
        $this->addCondition(__METHOD__, [$length], ['size' => $length]);

        return $this;
    }

    /**
     * @return $this
     */
    public function isImage()
    {
        $this->addCondition(__METHOD__);

        return $this;
    }
}
