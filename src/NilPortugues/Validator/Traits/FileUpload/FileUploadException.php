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
     * @param string $uploadName
     */
    public function __construct($uploadName)
    {
        $error = '';

        if (!empty($_FILES[$uploadName]['error']) && is_int($_FILES[$uploadName]['error'])) {
            $error = $_FILES[$uploadName]['error'];
        }

        if (!empty($_FILES[$uploadName]['error'])
            && is_array($_FILES[$uploadName]['error'])
            && is_int($_FILES[$uploadName]['error'][0])
        ) {
            $error = reset($_FILES[$uploadName]['error']);
        }

        $this->setErrorMessage($error);
    }

    /**
     * @param $error
     */
    private function setErrorMessage($error)
    {
        switch ($error) {
            case UPLOAD_ERR_INI_SIZE:
                $this->message = "FileUpload::UPLOAD_ERR_INI_SIZE";
                break;
            case UPLOAD_ERR_FORM_SIZE:
                $this->message = "FileUpload::UPLOAD_ERR_FORM_SIZE";
                break;
            case UPLOAD_ERR_PARTIAL:
                $this->message = "FileUpload::UPLOAD_ERR_PARTIAL";
                break;
            case UPLOAD_ERR_NO_FILE:
                $this->message = "FileUpload::UPLOAD_ERR_NO_FILE";
                break;
            case UPLOAD_ERR_NO_TMP_DIR:
                $this->message = "FileUpload::UPLOAD_ERR_NO_TMP_DIR";
                break;
            case UPLOAD_ERR_CANT_WRITE:
                $this->message = "FileUpload::UPLOAD_ERR_CANT_WRITE";
                break;
            case UPLOAD_ERR_EXTENSION:
                $this->message = "FileUpload::UPLOAD_ERR_EXTENSION";
                break;
        }
    }
}
