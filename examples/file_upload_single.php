<?php

include realpath(dirname(__FILE__)).'/../vendor/autoload.php';

if (empty($_FILES)) {
    ?>
    <h2>Single upload</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="one_image" multiple="multiple">
        <input type="submit" value="Submit">
    </form>

<?php

} else {
    $validator     = new \NilPortugues\Validator\Validator();
    $fileValidator = $validator->isFileUpload('image');

    $isValid = $fileValidator
        ->isBetween(0, 2, 'MB', true)
        ->isImage() //Same as: isMimeType(['image/png', 'image/gif', 'image/jpeg'])
        ->hasValidUploadDirectory('./')
        ->notOverwritingExistingFile('./')
        ->validate('one_image');

    echo '<h3>Input data is valid?</h3>';
    echo ($isValid) ? 'Yes' : 'No';

    $errors = $fileValidator->getErrors();
    echo '<h3>Errors?</h3>';
    echo '<pre>';
    print_r($errors);
    echo '</pre>';
}
