<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/16/14
 * Time: 9:42 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [
    //Generic
    'Generic::isRequired'                    => 'The :attribute field is required.',
    'Generic::isNotNull'                     => 'The :attribute must be a non null value.',
    //Float
    'Float::__construct'                     => 'The :attribute must be a float.',
    'Float::isNotZero'                       => 'The :attribute may not be greater than :max.',
    'Float::isPositive'                      => 'The :attribute may not be greater than :max.',
    'Float::isNegative'                      => 'The :attribute must be less than :max.',
    'Float::isBetween'                       => 'The :attribute must be between :min and :max.',
    'Float::isOdd'                           => 'The :attribute must be divisible by :size.',
    'Float::isEven'                          => 'The :attribute must be divisible by :size.',
    'Float::isMultiple'                      => 'The :attribute must be multiple of :size.',
    //Integer
    'Integer::__construct'                   => 'The :attribute must be an integer.',
    'Integer::isNotZero'                     => 'The :attribute may not be greater than :max.',
    'Integer::isPositive'                    => 'The :attribute may not be greater than :max.',
    'Integer::isNegative'                    => 'The :attribute must be less than :max.',
    'Integer::isBetween'                     => 'The :attribute must be between :min and :max.',
    'Integer::isOdd'                         => 'The :attribute must be divisible by :size.',
    'Integer::isEven'                        => 'The :attribute must be divisible by :size.',
    'Integer::isMultiple'                    => 'The :attribute must be multiple of :size.',
    //String
    'String::__construct'                    => 'The :attribute must be a string.',
    'String::isAlphanumeric'                 => 'The :attribute may only contain letters and digits.',
    'String::isAlpha'                        => 'The :attribute may only contain letters.',
    'String::isBetween'                      => 'The :attribute must be between :min and :max characters.',
    'String::isCharset'                      => 'The :attribute charset is not valid.',
    'String::isAllConsonants'                => 'The :attribute may only have consonants.',
    'String::contains'                       => 'The :attribute was not found.',
    'String::isControlCharacters'            => 'The :attribute may only have control characters.',
    'String::isDigit'                        => 'The :attribute must be :digits digits.',
    'String::endsWith'                       => 'The :attribute does not end with :string',
    'String::equals'                         => 'The :attribute and :other must match.',
    'String::in'                             => 'The selected :attribute is invalid.',
    'String::hasGraphicalCharsOnly'          => 'The :attribute may only have graphical characters.',
    'String::hasLength'                      => 'The :attribute must be :size characters.',
    'String::isLowercase'                    => 'The :attribute may only contain lower-cased letters.',
    'String::notEmpty'                       => 'The :attribute is empty.',
    'String::noWhitespace'                   => 'The :attribute has white spaces.',
    'String::hasPrintableCharsOnly'          => 'The :attribute may only have printable characters.',
    'String::isPunctuation'                  => 'The :attribute may only have punctuation symbols.',
    'String::matchesRegex'                   => 'The :attribute format is invalid.',
    'String::isSlug'                         => 'The :attribute does not match :regex expression.',
    'String::isSpace'                        => 'The :attribute is not a space.',
    'String::startsWith'                     => 'The :attribute does not start with :string',
    'String::isUppercase'                    => 'The :attribute maybe only contain upper-cased letters.',
    'String::isVersion'                      => 'The :attribute is not a valid version string.',
    'String::isVowel'                        => 'The :attribute may only contain vowels.',
    'String::isHexDigit'                     => 'The :attribute is not a valid hexadecimal value.',
    'String::hasLowercase'                   => 'The :attribute does not have at least :amount lower-cased characters.',
    'String::hasUppercase'                   => 'The :attribute does not have at least :amount upper-cased characters.',
    'String::hasNumeric'                     => 'The :attribute does not have at least :amount numeric characters.',
    'String::hasSpecialCharacters'           => 'The :attribute does not have at least :amount special characters.',
    'String::isEmail'                        => 'The :attribute must be a valid email address.',
    'String::isUrl'                          => 'The :attribute must be a valid URL.',
    'String::isUUID'                         => 'The :attribute must be a valid UUID.',
    //Object
    'Object::__construct'                    => 'The :attribute is not a valid object.',
    'Object::isInstanceOf'                   => 'The :attribute is not an instance of :object.',
    'Object::hasProperty'                    => 'The :attribute property :property is not valid.',
    'Object::hasMethod'                      => 'The :attribute method :method is not valid.',
    'Object::hasParentClass'                 => 'The :attribute has no parent class :object.',
    'Object::isChildOf'                      => 'The :attribute is not child of class :object.',
    'Object::inheritsFrom'                   => 'The :attribute does not inherit from class :object.',
    'Object::hasInterface'                   => 'The :attribute does not implement interface :object.',
    //DateTime
    'DateTime::__construct'                  => 'The :attribute is not a valid date.',
    'DateTime::isAfter'                      => 'The :attribute date must be a after :date.',
    'DateTime::isBefore'                     => 'The :attribute date must be a before :date.',
    'DateTime::isBetween'                    => 'The :attribute date must be between :min and :max.',
    'DateTime::isWeekend'                    => 'The :attribute date is not a weekend day.',
    'DateTime::isWeekday'                    => 'The :attribute date is not a weekday.',
    'DateTime::isMonday'                     => 'The :attribute date is not Monday.',
    'DateTime::isTuesday'                    => 'The :attribute date is not Tuesday.',
    'DateTime::isWednesday'                  => 'The :attribute date is not Wednesday.',
    'DateTime::isThursday'                   => 'The :attribute date is not Thursday.',
    'DateTime::isFriday'                     => 'The :attribute date is not Friday.',
    'DateTime::isSaturday'                   => 'The :attribute date is not Saturday.',
    'DateTime::isSunday'                     => 'The :attribute date is not Sunday.',
    'DateTime::isToday'                      => 'The :attribute date is not today.',
    'DateTime::isYesterday'                  => 'The :attribute date is not yesterday.',
    'DateTime::isTomorrow'                   => 'The :attribute date is not tomorrow.',
    'DateTime::isLeapYear'                   => 'The :attribute must be a valid leap year.',
    'DateTime::isMorning'                    => 'The :attribute is not morning.',
    'DateTime::isAftenoon'                   => 'The :attribute is not afternoon.',
    'DateTime::isEvening'                    => 'The :attribute is not evening.',
    'DateTime::isNight'                      => 'The :attribute is not night.',
    //Collection
    'Collection::__construct'                => 'The :attribute must be an array.',
    'Collection::each'                       => '', //Will use the generated errors from the provided validators.
    'Collection::hasKeyFormat'               => 'The :attribute array key format is not valid.',
    'Collection::endsWith'                   => 'The :attribute array does not end as expected.',
    'Collection::contains'                   => 'The :attribute was not found.',
    'Collection::hasKey'                     => 'The :attribute array has no :key.',
    'Collection::hasLength'                     => 'The :attribute must contain :size items.',
    'Collection::isNotEmpty'                 => 'The :attribute must have at least 1 item.',
    'Collection::startsWith'                 => 'The :attribute array does not start as expected.',
    //FileUpload
    'FileUpload::__construct'                => 'The :attribute has no files.',
    'FileUpload::isBetween'                  => 'The :attribute must be between :min and :max :formatBytes.',
    'FileUpload::isMimeType'                 => 'The :attribute is not a valid file format.',
    'FileUpload::hasFileNameFormat'          => 'The :attribute file name format is not valid.',
    'FileUpload::hasValidUploadDirectory'    => 'The :attribute upload directory is not valid.',
    'FileUpload::notOverwritingExistingFile' => 'The :attribute upload will overwrite an existing file.',
    'FileUpload::UPLOAD_ERR_INI_SIZE'        => 'The :attribute upload exceeds the maximum file size allowed by the server.',
    'FileUpload::UPLOAD_ERR_FORM_SIZE'       => 'The :attribute upload exceeds the maximum file size specified in the form.',
    'FileUpload::UPLOAD_ERR_PARTIAL'         => 'The :attribute was only partially uploaded.',
    'FileUpload::UPLOAD_ERR_NO_FILE'         => 'No :attribute file was uploaded.',
    'FileUpload::UPLOAD_ERR_NO_TMP_DIR'      => 'Upload failed. Missing a temporary upload folder.',
    'FileUpload::UPLOAD_ERR_CANT_WRITE'      => 'Upload failed. Failed to write file to disk.',
    'FileUpload::UPLOAD_ERR_EXTENSION'       => 'Upload failed. File upload was stopped.',
    'FileUpload::isImage'                    => 'The :attribute must be a valid image file.',
    'FileUpload::hasLength'                  => 'The :attribute must be :size files.'
];
