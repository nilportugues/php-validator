<?php

include realpath(dirname(__FILE__)) . '/../vendor/autoload.php';

if (empty($_FILES)) {
?>

<form method="POST" enctype="multipart/form-data">
  <input type="file" name="image[]" multiple="multiple">
  <input type="submit" value="Submit">
</form>

<?php
} else {
    echo $maxFileSize = min(ini_get('post_max_size'), ini_get('upload_max_filesize'));
    
    $validator = new \NilPortugues\Validator\Validator();
    $fileValidator = $validator->isFileUpload('image');

    $isValid = $fileValidator
        ->isBetween(0, $maxFileSize, 'B', true)
        ->isMimeType(['image/png', 'image/gif', 'image/jpeg'])
        ->hasValidUploadDirectory('./')
        ->notOverwritingExistingFile('./')
        ->validate('image');

    echo '<h3>Input data is valid?</h3>';
    echo ($isValid) ? 'Yes' : 'No';

    $errors = $fileValidator->getErrors();
    if (!empty($errors)) {
        echo '<h3>Errors?</h3>';
        echo '<pre>';
        print_r($errors);
        echo '</pre>';
    } else {
        echo '<h3>Success!</h3>';
        echo 'Use move_uploaded_file() function finally to store the image/s';
    }

}
