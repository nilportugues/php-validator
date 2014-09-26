<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/25/14
 * Time: 10:53 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\Validator\Traits\FileUpload;

/**
 * Class FileUploadException
 * @package NilPortugues\Validator\Traits\FileUpload
 */
class FileUploadException extends \Exception
{
    /**
     * @var array
     */
    private $errorMessages = [
        UPLOAD_ERR_INI_SIZE   => "FileUpload::UPLOAD_ERR_INI_SIZE",
        UPLOAD_ERR_FORM_SIZE  => "FileUpload::UPLOAD_ERR_FORM_SIZE",
        UPLOAD_ERR_PARTIAL    => "FileUpload::UPLOAD_ERR_PARTIAL",
        UPLOAD_ERR_NO_FILE    => "FileUpload::UPLOAD_ERR_NO_FILE",
        UPLOAD_ERR_NO_TMP_DIR => "FileUpload::UPLOAD_ERR_NO_TMP_DIR",
        UPLOAD_ERR_CANT_WRITE => "FileUpload::UPLOAD_ERR_CANT_WRITE",
        UPLOAD_ERR_EXTENSION  => "FileUpload::UPLOAD_ERR_EXTENSION",
    ];

    /**
     * @param string $uploadName
     */
    public function __construct($uploadName)
    {
        $error = 4;

        if (!empty($_FILES[$uploadName]['error']) && is_int($_FILES[$uploadName]['error'])) {
            $error = $_FILES[$uploadName]['error'];
        }

        if (!empty($_FILES[$uploadName]['error'])
            && is_array($_FILES[$uploadName]['error'])
            && is_int($_FILES[$uploadName]['error'][0])
        ) {
            $error = reset($_FILES[$uploadName]['error']);
        }

        $this->message = $this->errorMessages[$error];
    }
}
