 Input Validator
=========================================

[![Build Status](https://travis-ci.org/nilportugues/php-validator.svg)](https://travis-ci.org/nilportugues/php-validator) [![Coverage Status](https://img.shields.io/coveralls/nilportugues/validator.svg)](https://coveralls.io/r/nilportugues/validator?branch=master) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/nilportugues/validator/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/nilportugues/validator/?branch=master) [![SensioLabsInsight](https://insight.sensiolabs.com/projects/9fbb4900-70b9-49f6-b7d5-a9f560cdb036/mini.png)](https://insight.sensiolabs.com/projects/9fbb4900-70b9-49f6-b7d5-a9f560cdb036) [![Latest Stable Version](https://poser.pugx.org/nilportugues/validator/v/stable)](https://packagist.org/packages/nilportugues/validator) [![Total Downloads](https://poser.pugx.org/nilportugues/validator/downloads)](https://packagist.org/packages/nilportugues/validator) [![License](https://poser.pugx.org/nilportugues/validator/license)](https://packagist.org/packages/nilportugues/validator)
[![Donate](https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif)](https://paypal.me/nilportugues)
 
Validation is a very common task in web applications. Data entered in forms needs to be validated. Data also needs to be validated before it is written into a database or passed to a web service.

NilPortugues\Validator is a simple, powerful and elegant stand-alone validation library with no external dependencies.


<a name="index_block"></a>
* [1. Installation](#block1)
* [2. Usage](#block2)
  * [2.1. Validation made for everyone](#block2.1)
    * [2.1.1. Instantiation of Validator class](#block2.1.1)
    * [2.1.2. Factory using ValidatorFactory::create](#block2.1.2)
    * [2.1.3. Extending from the BaseValidator](#block2.1.3)
  * [2.2. Stop on first error](#block2.2)
* [3. Validation Message Translation](#block3)  
* [4. Methods](#block4)
    * [4.1 isString | string](#block4.1)
        * [4.1.1. isAlphanumeric | alphanumeric] (#block4.1.1)
            * [4.1.1.1. Instantiation of Validator class](#block4.1.1.1)
            * [4.1.1.2. Factory using Validator::create](#block4.1.1.2)
            * [4.1.1.3. Extending from the BaseValidator](#block4.1.1.3)
        * [4.1.2. isAlpha | alpha] (#block4.1.2)
        * [4.1.3. isBetween | between] (#block4.1.3)
        * [4.1.4. isCharset | charset] (#block4.1.4)
        * [4.1.5. isAllConsonants | all_consonants] (#block4.1.5)
        * [4.1.6. contains] (#block4.1.6)
        * [4.1.7. isControlCharacters | control_characters] (#block4.1.7)
        * [4.1.8. isDigit | digit] (#block4.1.8)
        * [4.1.9. endsWith | ends_with] (#block4.1.9)
        * [4.1.10. equals] (#block4.1.10)
        * [4.1.11. in] (#block4.1.11)
        * [4.1.12. hasGraphicalCharsOnly | has_graphical_chars_only] (#block4.1.12)
        * [4.1.13. hasLength | has_length] (#block4.1.13)
        * [4.1.14. isLowercase | lowercase] (#block4.1.14)
        * [4.1.15. notEmpty | not_empty] (#block4.1.15)
        * [4.1.16. noWhitespace | no_whitespace] (#block4.1.16)
        * [4.1.17. hasPrintableCharsOnly | has_printable_chars_only] (#block4.1.17)
        * [4.1.18. isPunctuation | punctuation] (#block4.1.18)
        * [4.1.19. matchesRegex | matches_regex] (#block4.1.19)
        * [4.1.20. isSlug | slug] (#block4.1.20)
        * [4.1.21. isSpace | space] (#block4.1.21)
        * [4.1.22. startsWith | starts_with] (#block4.1.22)
        * [4.1.23. isUppercase | uppercase] (#block4.1.23)
        * [4.1.24. isVersion | version] (#block4.1.24)
        * [4.1.25. isVowel | vowel] (#block4.1.25)
        * [4.1.26. isHexDigit | hex_digit] (#block4.1.26)
        * [4.1.27. hasLowercase | has_lowercase] (#block4.1.27)
        * [4.1.28. hasUppercase | has_uppercase] (#block4.1.28)
        * [4.1.29. hasNumeric | has_numeric] (#block4.1.29)
        * [4.1.30. hasSpecialCharacters | has_special_characters] (#block4.1.30)
        * [4.1.31. isEmail | email] (#block4.1.31)
        * [4.1.32. isUrl | url] (#block4.1.32)
        * [4.1.33. isUUID | uuid] (#block4.1.33)
    * [4.2 isInteger | integer and isFloat | float](#block4.2)
        * [4.2.1. isNotZero | not_zero ] (#block4.2.1)
        * [4.2.2. isPositive | positive] (#block4.2.2)
        * [4.2.2. isPositiveOrZero | positive_or_zero] (#block4.2.3)
        * [4.2.4. isNegative | negative] (#block4.2.4)
        * [4.2.5. isNegativeOrZero | negative_or_zero] (#block4.2.5)
        * [4.2.6. isBetween | between] (#block4.2.6)
        * [4.2.7. isOdd | odd] (#block4.2.7)
        * [4.2.8. isEven | even] (#block4.2.8)
        * [4.2.9. isMultiple | multiple] (#block4.2.9)
    * [4.3 isObject | object](#block4.3)
        * [4.3.1. isInstanceOf | instance_of] (#block4.3.1)
        * [4.3.2. hasProperty | has_property] (#block4.3.2)
        * [4.3.3. hasMethod | has_method] (#block4.3.3)
        * [4.3.4. hasParentClass | has_parent_class] (#block4.3.4)
        * [4.3.5. isChildOf | child_of] (#block4.3.5)
        * [4.3.6. inheritsFrom | inherits_from] (#block4.3.6)
        * [4.3.7. hasInterface | has_interface] (#block4.3.7)
    * [4.4 isDateTime | date_time](#block4.4)
        * [4.4.1. isAfter | after] (#block4.4.1)
        * [4.4.2. isBefore | before] (#block4.4.2)
        * [4.4.3. isBetween | between] (#block4.4.3)
        * [4.4.4. isWeekend | weekend] (#block4.4.4)
        * [4.4.5. isWeekday | weekday] (#block4.4.5)
        * [4.4.6. isMonday | monday] (#block4.4.6)
        * [4.4.7. isTuesday | tuesday] (#block4.4.7)
        * [4.4.8. isWednesday | wednesday] (#block4.4.8)
        * [4.4.9. isThursday | thursday] (#block4.4.9)
        * [4.4.10. isFriday | friday] (#block4.4.10)
        * [4.4.11. isSaturday | saturday] (#block4.4.11)
        * [4.4.12. isSunday | sunday] (#block4.4.12)
        * [4.4.13. isToday | today] (#block4.4.13)
        * [4.4.14. isYesterday | yesterday] (#block4.4.14)
        * [4.4.15. isTomorrow | tomorrow] (#block4.4.15)
        * [4.4.16. isLeapYear | leap_year] (#block4.4.16)
        * [4.4.17. isMorning | morning] (#block4.4.17)
        * [4.4.18. isAftenoon | aftenoon] (#block4.4.18)
        * [4.4.19. isEvening | evening] (#block4.4.19)
        * [4.4.20. isNight | night] (#block4.4.20)
    * [4.5 isArray | array](#block4.5)
        * [4.5.1. each] (#block4.5.1)
        * [4.5.2. hasKeyFormat | has_key_format] (#block4.5.2)
        * [4.5.3. endsWith | ends_with] (#block4.5.3)
        * [4.5.4. contains] (#block4.5.4)
        * [4.5.5. hasKey | has_key] (#block4.5.5)
        * [4.5.6. hasLength | has_length] (#block4.5.6)
        * [4.5.7. isNotEmpty | not_empty] (#block4.5.7)
        * [4.5.8. startsWith | starts_with] (#block4.5.8)
    * [4.6 isFileUpload | file_upload](#block4.6)
        * [4.6.1. isBetween | between] (#block4.6.1)
        * [4.6.2. isMimeType | mime_type] (#block4.6.2)
        * [4.6.3. hasFileNameFormat | has_file_name_format] (#block4.6.3)
        * [4.6.4. hasValidUploadDirectory | has_valid_upload_directory] (#block4.6.4)
        * [4.6.5. notOverwritingExistingFile | not_overwriting_existing_file] (#block4.6.5)
        * [4.6.6. hasLength | has_length] (#block4.6.6)
        * [4.6.7. isImage | image] (#block4.6.7)
* [4. Quality Code](#block4)
* [5. Author](#block5)
* [6. License](#block6)

<a name="block1"></a>
# 1. Installation [↑](#index_block)
The recommended way to install the Input Validator is through [Composer](http://getcomposer.org). Run the following command to install it:

```sh
php composer.phar require nilportugues/validator
```

<a name="block2"></a>
# 2. Usage [↑](#index_block)

The Validator interface is 100% human-friendly and readable. By default, it supports full validation and partial validation (stop when first error occurs).

<a name="block2.1"></a>
### 2.1. Validation made for everyone [↑](#index_block)

When writing validator input data it is expected to be match a set of rules. If one or more of these rules fail, a collection of errors is returned. This is the default behaviour for `validate($input)`.

NilPortugues\Validator supports up to 3 different styles to write validators: Instantiation, Factory or as a Class. Here's how you would validate an input `age` for these 3 styles:

<a name="block2.1.1"></a>
#### 2.1.1. Instantiation of Validator class
```php
use \NilPortugues\Validator\Validator;

$ageValidator = Validator::create()->isInteger('age');
$result = $ageValidator->isPositive()->isBetween(18, 100, true)->validate(28);
$errors = $ageValidator->getErrors();
```

<a name="block2.1.2"></a>
#### 2.1.2. Factory using ValidatorFactory::create

Using the Validator as a factory will provide a Validator object each time the `::create` method is used.

This style fits best when validating lots of fields one after another or inside array loops where changing `$rules` dynamically can make sense.


```php
use \NilPortugues\Validator\ValidatorFactory;

$rules = ['positive', 'between:18:100:true'];
$ageValidator = ValidatorFactory::create('age', 'integer', $rules);

$result = $ageValidator->validate(28);
$errors = $ageValidator->getErrors();
```

<a name="block2.1.3"></a>
#### 2.1.3. Extending from the BaseValidator

Validators extending from `\NilPortugues\Validator\BaseValidator` are short and maintainable.

```php
use \NilPortugues\Validator\BaseValidator;

class AgeValidator extends BaseValidator
{
    /**
     * @var string
     */
    protected $type = 'integer';

    /**
     * @var array
     */
    protected $rules = [
        'positive',
        'between:18:100:true'
    ];
}

$ageValidator = new AgeValidator();

$result = $ageValidator->validate('age', 28);
$errors = $ageValidator->getErrors();
```

Rules cannot be dynamically changed unless you provide the class a method to do so! For instance:

```php
use \NilPortugues\Validator\BaseValidator;

class AgeValidator extends BaseValidator
{
    /**
     * @var string
     */
    protected $type = 'integer';

    /**
     * @var array
     */
    protected $rules = ['positive'];

    /**
     * @param array $rules
     */
    public function __construct(array $rules)
    {
        $this->rules = array_merge($this->rules, $rules);
    }
}

$ageValidator = new AgeValidator(['between:18:100:true']);

$result = $ageValidator->validate('age', 28);
$errors = $ageValidator->getErrors();
```

<a name="block2.2"></a>
### 2.2. Stop on first error [↑](#index_block)

Sometimes, fast validation checks are needed when validating input data. This is possible by passing `true` as the second argument to the `validate` method. 

For instance, in the following code `isBetween`is never executed.

```php
use \NilPortugues\Validator\Validator;

$age = Validator::create()->isInteger('age');
$result = $age->isPositive()->isBetween(0, 100, true)->validate(-10, true);
```
<a name="block3"></a>
# 3. Validation Message Translation [↑](#index_block)

The Input Validator features a default translation that can be found at `src/Errors/en_GB.php`. If no file path is provided when creating the validator instance, this file is used.

---
    Feel free to submit a pull request or open an issue with more translations!
---

#### Customization
Language can be changed anytime by providing a file following the same structure.

```php
$translationFile = 'full/path/to/alternate-translation.php';

$validator = Validator::create($translationFile);

$stringValidator = $validator->isString('username');
$errors = $stringValidator->getErrors(); //error array in the provided language.
```

#### Available translations

- en_GB     **English (British)**


<a name="block4"></a>
# 4. Methods [↑](#index_block)

All data type validators share 2 basic methods:

- **isRequired**
- **isNotNull**

Its usage is fairly simple:

```php
$validator = Validator::create();

$username = $validator->isString('username');

$username->isRequired()->validate('Nil'); //true
$username->isNotNull()->validate(''); //false

//Or combined...
$username->isRequired()->isNotNull()->validate('Nil'); //true
```

For optional data, wrap the validator function within an if with an `isset($value)` clause and validate using `isNotNull`.

For instance, suppose gender is a value from 0 to 2 (male, female, other) and is a non-mandatory value:

```php
$validator = Validator::create();

$genderValue = $validator->isInteger('gender');
$result = true;

if (isset($gender)) {
    $result = $genderValue->isNotNull()->isBetween(0, 2, true)->validate($gender);
}

return $result;
```

<a name="block4.1"></a>
## 4.1 isString | string [↑](#index_block)
String validation starts when creating a string field in the validator using the `isString` method.

```php
$username = Validator::create()->isString('username');
```
The following chainable validation options are available for string data:

#### 4.1.1. isAlphanumeric <a name="block4.1.1"></a> [↑](#index_block)

<a name="block4.1.1.1"></a>
##### 4.1.1.1 Instantiation of Validator class
```php
use \NilPortugues\Validator\Validator;

$string = Validator::create()->isString('propertyName');

$string->isAlphanumeric()->validate('28a'); // true
$string->isAlphanumeric()->validate('hello@example.com'); // false
```

<a name="block4.1.1.2"></a>
##### 4.1.1.2. Factory using Validator::create

```php
use \NilPortugues\Validator\Validator;

$validator = Validator::create('propertyName', 'string', ['alphanumeric']);

$validator->validate('28a'); // true
$validator->validate('hello@example.com'); // false
```

<a name="block4.1.1.3"></a>
##### 4.1.1.3. Extending from the BaseValidator

```php
use \NilPortugues\Validator\BaseValidator;

class FieldValidator extends BaseValidator
{
    protected $type = 'string';

    protected $rules = ['alphanumeric'];
}

$fieldValidator = new FieldValidator();

$fieldValidator->validate('propertyName', '28a'); //true
$fieldValidator->validate('propertyName', 'hello@example.com');
```


#### 4.1.2. isAlpha <a name="block4.1.2"></a> [↑](#index_block)

##### Example
```php
$string = Validator::create()->isString('propertyName');

$string->isAlpha()->validate('Hello World'); // true
$string->isAlpha()->validate('28a'); // false
$string->isAlpha()->validate('hello@example.com'); // false
```

#### 4.1.3. isBetween <a name="block4.1.3"></a> [↑](#index_block)

##### Example
```php
$string = Validator::create()->isString('propertyName');

$string->isBetween(2, 4)->validate('Nilo'); //false
$string->isBetween(2, 4, true)->validate('Nilo'); //true
```

#### 4.1.4. isCharset <a name="block4.1.4"></a> [↑](#index_block)

##### Example
```php
$string = Validator::create()->isString('propertyName');

$string->isCharset(['UTF-8'])->validate('Portugués'); //true
```

#### 4.1.5. isAllConsonants <a name="block4.1.5"></a> [↑](#index_block)

##### Example
```php
$string = Validator::create()->isString('propertyName');

$string->isAllConsonants()->validate('a'); //false
$string->isAllConsonants()->validate('bs'); //true
```

#### 4.1.6. contains <a name="block4.1.6"></a> [↑](#index_block)

##### Example
```php
$string = Validator::create()->isString('propertyName');

$string->contains(123)->validate('AAAAAAA123A'); //true
$string->contains(123, true)->validate('AAAAAAA123A'); //false
```

#### 4.1.7. isControlCharacters <a name="block4.1.7"></a> [↑](#index_block)

##### Example
```php
$string = Validator::create()->isString('propertyName');

$string->isControlCharacters()->validate("\n\t"); //true
$string->isControlCharacters()->validate("\nHello\tWorld"); //false
```

#### 4.1.8. isDigit <a name="block4.1.8"></a> [↑](#index_block)

##### Example
```php
$string = Validator::create()->isString('propertyName');

$string->isDigit()->validate('10'); //true

$string->isDigit()->validate('A'); //false
$string->isDigit()->validate(145.6); //false
```

#### 4.1.9. endsWith <a name="block4.1.9"></a> [↑](#index_block)

##### Example
```php
$string = Validator::create()->isString('propertyName');

$string->endsWith('aaaA')->validate('AAAAAAAaaaA'); //true
$string->endsWith(123, true)->validate('AAAAAAA123'); //false
```

#### 4.1.10. equals <a name="block4.1.10"></a> [↑](#index_block)

##### Example
```php
$string = Validator::create()->isString('propertyName');

$string->equals('hello')->validate('hello'); //true

$string->equals(1)->validate('1'); //true
$string->equals(1, true)->validate('1'); //false
```

#### 4.1.11. in <a name="block4.1.11"></a> [↑](#index_block)

##### Example
```php
$string = Validator::create()->isString('propertyName');

$string->in('a12245 asdhsjasd 63-211', true)->validate('5 asd'); //true
$string->in(122, true)->validate('a12245 asdhsjasd 63-211'); //false
```

#### 4.1.12. hasGraphicalCharsOnly <a name="block4.1.12"></a> [↑](#index_block)

##### Example
```php
$string = Validator::create()->isString('propertyName');

$string->hasGraphicalCharsOnly()->validate('arf12'); //true
$string->hasGraphicalCharsOnly()->validate("asdf\n\r\t"); //false
```

#### 4.1.13. hasLength <a name="block4.1.13"></a> [↑](#index_block)

##### Example
```php
$string = Validator::create()->isString('propertyName');

$string->hasLength(5)->validate('abcdefgh'); //false
$string->hasLength(8)->validate('abcdefgh'); //true
```

#### 4.1.14. isLowercase <a name="block4.1.14"></a> [↑](#index_block)

##### Example
```php
$string = Validator::create()->isString('propertyName');

$string->isLowercase()->validate('strtolower'); //true
$string->isLowercase()->validate('strtolOwer'); //false
```

#### 4.1.15. notEmpty <a name="block4.1.15"></a> [↑](#index_block)

##### Example
```php
$string = Validator::create()->isString('propertyName');

$string->notEmpty()->validate('a'); //true
$string->notEmpty()->validate(''); //false
```

#### 4.1.16. noWhitespace <a name="block4.1.16"></a> [↑](#index_block)

##### Example
```php
$string = Validator::create()->isString('propertyName');

$string->noWhitespace()->validate('aaaaa'); //true
$string->noWhitespace()->validate('lorem ipsum'); //false
```

#### 4.1.17. hasPrintableCharsOnly <a name="block4.1.17"></a> [↑](#index_block)

##### Example
```php
$string = Validator::create()->isString('propertyName');

$string->hasPrintableCharsOnly()->validate("LMKA0$%_123"); //true
$string->hasPrintableCharsOnly()->validate("LMKA0$%\t_123"); //false
```

#### 4.1.18. isPunctuation <a name="block4.1.18"></a> [↑](#index_block)

##### Example
```php
$string = Validator::create()->isString('propertyName');

$string->isPunctuation()->validate('&,.;'); //true
$string->isPunctuation()->validate('a'); //false
```

#### 4.1.19. matchesRegex <a name="block4.1.19"></a> [↑](#index_block)

##### Example
```php
$string = Validator::create()->isString('propertyName');

$string->matchesRegex('/[a-z]/')->validate('a'); //true
$string->matchesRegex('/[a-z]/')->validate('A'); //false
```

#### 4.1.20. isSlug <a name="block4.1.20"></a> [↑](#index_block)

##### Example
```php
$string = Validator::create()->isString('propertyName');

$string->isSlug()->validate('hello-world-yeah'); //true

$string->isSlug()->validate('-hello-world-yeah'); //false
$string->isSlug()->validate('hello-world-yeah-'); //false
$string->isSlug()->validate('hello-world----yeah'); //false
```

#### 4.1.21. isSpace <a name="block4.1.21"></a> [↑](#index_block)

##### Example
```php
$string = Validator::create()->isString('propertyName');

$string->isSpace()->validate('    '); //true
$string->isSpace()->validate('e e'); //false
```

#### 4.1.22. startsWith <a name="block4.1.22"></a> [↑](#index_block)

##### Example
```php
$string = Validator::create()->isString('propertyName');

$string->startsWith('aaaA')->validate('aaaAAAAAAAA'); //true
$string->startsWith(123, true)->validate('123AAAAAAA'); //false
```

#### 4.1.23. isUppercase <a name="block4.1.23"></a> [↑](#index_block)

##### Example
```php
$string = Validator::create()->isString('propertyName');

$string->isUppercase()->validate('AAAAAA'); //true
$string->isUppercase()->validate('aaaa'); //false
```

#### 4.1.24. isVersion <a name="block4.1.24"></a> [↑](#index_block)

##### Example
```php
$string = Validator::create()->isString('propertyName');

$string->isVersion()->validate('1.0.2'); //true
$string->isVersion()->validate('1.0.2-beta'); //true
$string->isVersion()->validate('1.0'); //true
$string->isVersion()->validate('1.0.2 beta'); //false
```

#### 4.1.25. isVowel <a name="block4.1.25"></a> [↑](#index_block)

##### Example
```php
$string = Validator::create()->isString('propertyName');

$string->isVowel()->validate('aeA'); //true
$string->isVowel()->validate('cds'); //false
```

#### 4.1.26. isHexDigit <a name="block4.1.26"></a> [↑](#index_block)

##### Example
```php
$string = Validator::create()->isString('propertyName');

$string->isHexDigit()->validate(100); //true
$string->isHexDigit()->validate('h0000'); //false
```

#### 4.1.27. hasLowercase <a name="block4.1.27"></a> [↑](#index_block)

##### Example
```php
$string = Validator::create()->isString('propertyName');

$string->hasLowercase()->validate('HELLOWOrLD'); //true
$string->hasLowercase(3)->validate('HeLLoWOrLD'); //true

$string->hasLowercase()->validate('HELLOWORLD'); //false
$string->hasLowercase(3)->validate('el'); //false
```

#### 4.1.28. hasUppercase <a name="block4.1.28"></a> [↑](#index_block)

##### Example
```php
$string = Validator::create()->isString('propertyName');

$string->hasUppercase()->validate('hello World'); //true
$string->hasUppercase(2)->validate('Hello World'); //true

$string->hasUppercase()->validate('hello world'); //false
$string->hasUppercase(2)->validate('helloWorld'); //false
```

#### 4.1.29. hasNumeric <a name="block4.1.29"></a> [↑](#index_block)

##### Example
```php
$string = Validator::create()->isString('propertyName');

$string->hasNumeric()->validate('hell0 W0rld'); //true
$string->hasNumeric(3)->validate('H3ll0 W0rld'); //true

$string->hasNumeric()->validate('hello world'); //false
$string->hasNumeric(2)->validate('h3lloWorld'); //false
```

#### 4.1.30. hasSpecialCharacters <a name="block4.1.30"></a> [↑](#index_block)

##### Example
```php
$string = Validator::create()->isString('propertyName');

$string->hasSpecialCharacters()->validate('hell0@W0rld'); //true
$string->hasSpecialCharacters(2)->validate('H3ll0@W0@rld'); //true

$string->hasSpecialCharacters()->validate('hello world'); //false
$string->hasSpecialCharacters(2)->validate('h3llo@World'); //false
```

#### 4.1.31. isEmail <a name="block4.1.31"></a> [↑](#index_block)

##### Example
```php
$string = Validator::create()->isString('propertyName');

$string->isEmail()->validate('hello@world.com'); //true
$string->isEmail()->validate('hello.earth@world.com'); //true
$string->isEmail()->validate('hello.earth+moon@world.com'); //true
$string->isEmail()->validate('hello@subdomain.world.com'); //true
$string->isEmail()->validate('hello.earth@subdomain.world.com'); //true
$string->isEmail()->validate('hello.earth+moon@subdomain.world.com'); //true
$string->isEmail()->validate('hello.earth+moon@127.0.0.1'); //true

$string->isEmail()->validate('hello.earth+moon@localhost'); //false
```

#### 4.1.32. isUrl <a name="block4.1.32"></a> [↑](#index_block)

##### Example
```php
$string = Validator::create()->isString('propertyName');

$string->->isUrl()->validate('http://google.com'); //true
$string->->isUrl()->validate('http://google.com/robots.txt'); //true
$string->->isUrl()->validate('https://google.com'); //true
$string->->isUrl()->validate('https://google.com/robots.txt'); //true
$string->->isUrl()->validate('//google.com'); //true
$string->->isUrl()->validate('//google.com/robots.txt'); //true
```

#### 4.1.33. isUUID($strict = true) <a name="block4.1.33"></a> [↑](#index_block)

##### Example
```php
$string = Validator::create()->isString('propertyName');

$string->isUUID()->validate('6ba7b810-9dad-11d1-80b4-00c04fd430c8'); //true
$string->isUUID()->validate('6ba7b811-9dad-11d1-80b4-00c04fd430c8'); //true
$string->isUUID()->validate('6ba7b812-9dad-11d1-80b4-00c04fd430c8'); //true
$string->isUUID()->validate('6ba7b814-9dad-11d1-80b4-00c04fd430c8'); //true
$string->isUUID()->validate('00000000-0000-0000-0000-000000000000'); //true

$string->isUUID(false)->validate('6ba7b810-9dad-11d1-80b4-00c04fd430c8'); //true
$string->isUUID(false)->validate('6ba7b811-9dad-11d1-80b4-00c04fd430c8'); //true
$string->isUUID(false)->validate('6ba7b812-9dad-11d1-80b4-00c04fd430c8'); //true
$string->isUUID(false)->validate('6ba7b814-9dad-11d1-80b4-00c04fd430c8'); //true
$string->isUUID(false)->validate('00000000-0000-0000-0000-000000000000'); //true

$string->isUUID()->validate('{6ba7b810-9dad-11d1-80b4-00c04fd430c8}'); //false
$string->isUUID()->validate('216f-ff40-98d9-11e3-a5e2-0800-200c-9a66'); //false
$string->isUUID()->validate('{216fff40-98d9-11e3-a5e2-0800200c9a66}'); //false
$string->isUUID()->validate('216fff4098d911e3a5e20800200c9a66'); //false

$string->isUUID(false)->validate('{6ba7b810-9dad-11d1-80b4-00c04fd430c8}'); //true
$string->isUUID(false)->validate('216f-ff40-98d9-11e3-a5e2-0800-200c-9a66'); //true
$string->isUUID(false)->validate('{216fff40-98d9-11e3-a5e2-0800200c9a66}'); //true
$string->isUUID(false)->validate('216fff4098d911e3a5e20800200c9a66'); //true
```

<a name="block4.2"></a>
## 4.2 isInteger | integer and isFloat | float [↑](#index_block)

Number validation comes in two flavours, `Integers` and `Floats`. Both validators share the same method interface, but internal implementation is different.

To use these validators, do as follows:

```php
$integer = Validator::create()->isInteger('propertyName');

$float = $validator->isFloat('propertyName');
```

#### 4.2.1. isNotZero  <a name="block4.2.1"></a> [↑](#index_block)

##### Example
```php
$integer = Validator::create()->isInteger('propertyName');

$integer->isNotZero()->validate(1); //true
$integer->isNotZero()->validate(0); //false
```

#### 4.2.2. isPositive  <a name="block4.2.2"></a> [↑](#index_block)

##### Example
```php
$integer = Validator::create()->isInteger('propertyName');

$integer->isPositive()->validate(1); //true
$integer->isPositive()->validate(-10); //false
$integer->isPositive()->validate(0); //false
```

#### 4.2.3. isPositiveOrZero <a name="block4.2.3"></a> [↑](#index_block)

##### Example
```php
$integer = Validator::create()->isInteger('propertyName');

$integer->isPositiveOrZero()->validate(1); //true
$integer->isPositiveOrZero()->validate(-10); //false
$integer->isPositiveOrZero()->validate(0); //true
```

#### 4.2.4. isNegative  <a name="block4.2.4"></a> [↑](#index_block)

##### Example
```php
$integer = Validator::create()->isInteger('propertyName');

$integer->isNegative()->validate(-10); //true
$integer->isNegative()->validate(1); //false
$integer->isNegative()->validate(0); //false
```

#### 4.2.5. isNegativeOrZero <a name="block4.2.5"></a> [↑](#index_block)

##### Example
```php
$integer = Validator::create()->isInteger('propertyName');

$integer->isNegativeOrZero()->validate(-10); //true
$integer->isNegativeOrZero()->validate(1); //false
$integer->isNegativeOrZero()->validate(0); //true
```

#### 4.2.6. isBetween  <a name="block4.2.6"></a> [↑](#index_block)

##### Example
```php
$integer = Validator::create()->isInteger('propertyName');

$integer->isBetween(10,20, false)->validate(13); //true
$integer->isBetween(10, 20, true)->validate(10); //false
```

#### 4.2.7. isOdd  <a name="block4.2.7"></a> [↑](#index_block)

##### Example
```php
$integer = Validator::create()->isInteger('propertyName');

$integer->isOdd()->validate(3); //true
$integer->isOdd()->validate(2); //false
```

#### 4.2.8. isEven  <a name="block4.2.8"></a> [↑](#index_block)

##### Example
```php
$integer = Validator::create()->isInteger('propertyName');

$integer->isEven()->validate(2); //true
$integer->isEven()->validate(3); //false
```

#### 4.2.9. isMultiple  <a name="block4.2.9"></a> [↑](#index_block)

##### Example
```php
$integer = Validator::create()->isInteger('propertyName');

$integer->isMultiple(2)->validate(4); //true
$integer->isMultiple(2)->validate(3); //false
```


<a name="block4.3"></a>
## 4.3 isObject | object [↑](#index_block)

#### 4.3.1. isInstanceOf<a name="block4.3.1"></a> [↑](#index_block)

##### Example
```php
$object = Validator::create()->isObject('propertyName');

$object->isInstanceOf('DateTime')->validate(new \DateTime()); //true

$object->isInstanceOf('DateTime')->validate(new \stdClass()); //false
$object->isInstanceOf('DateTime')->validate('a'); //false
```

#### 4.3.2. hasProperty<a name="block4.3.2"></a> [↑](#index_block)

##### Example
```php
$object = Validator::create()->isObject('propertyName');

$dummy = new Dummy();

$object->hasProperty('userName')->validate($dummy); //true
$object->hasProperty('password')->validate($dummy); //false
```

#### 4.3.3. hasMethod<a name="block4.3.3"></a> [↑](#index_block)

##### Example
```php
$object = Validator::create()->isObject('propertyName');

$dummy = new Dummy();

$object->hasMethod('getUserName')->validate($dummy); //true
$object->hasMethod('getPassword')->validate($dummy); //false
```

#### 4.3.4. hasParentClass<a name="block4.3.4"></a> [↑](#index_block)

##### Example
```php
$object = Validator::create()->isObject('propertyName');

$object->hasParentClass()->validate(new Dummy()); //true
$object->hasParentClass()->validate(new \stdClass()); //false
```

#### 4.3.5. isChildOf<a name="block4.3.5"></a> [↑](#index_block)

##### Example
```php
$object = Validator::create()->isObject('propertyName');

$dummy = new Dummy(); // class Dummy extends \DateTime

$object->isChildOf('DateTime')->validate($dummy); //true
$object->isChildOf('DateTimeZone')->validate($dummy); //false
```

#### 4.3.6. inheritsFrom<a name="block4.3.6"></a> [↑](#index_block)

##### Example
```php
$object = Validator::create()->isObject('propertyName');

$dummy = new Dummy(); // class Dummy extends \DateTime

$object->inheritsFrom('DateTime')->validate($dummy); //true
$object->inheritsFrom('DateTimeZone')->validate($dummy); //false
```

#### 4.3.7. hasInterface<a name="block4.3.7"></a> [↑](#index_block)

##### Example
```php
$object = Validator::create()->isObject('propertyName');

$object->hasInterface('Tests\NilPortugues\Validator\Resources\DummyInterface')->validate($dummy); //true
$object->inheritsFrom('DateTimeZone')->validate($dummy); //false
```


<a name="block4.4"></a>
## 4.4 isDateTime | date_time  [↑](#index_block)
DateTime Validator accepts `\DateTime` objects and `strings` variables representing **valid date formats**.

As you will see in the following examples, either two are allowed as parameters for any `date` value.

#### 4.4.1. isAfter <a name="block4.4.1"></a> [↑](#index_block)

##### Example
```php
$datetime = Validator::create()->isDateTime('propertyName');
$date1 = '2014-01-01 00:00:00';
$date2 = new \DateTime($date1);

$limit1 = '2013-12-31 23:59:59';

$datetime->isAfter($limit1, false)->validate($date1); // true
$datetime->isAfter($limit1, false)->validate($date2); // true

$datetime->isAfter($date1, true)->validate($date1); // true
$datetime->isAfter($date2, true)->validate($date2); // true

$limit2 = '2015-01-01 00:00:00';

$datetime->isAfter($limit2)->validate($date1); // false
$datetime->isAfter($limit2)->validate($date2); // false
```

#### 4.4.2. isBefore <a name="block4.4.2"></a> [↑](#index_block)

##### Example
```php
$datetime = Validator::create()->isDateTime('propertyName');
$date1 = '2012-01-01 00:00:00';
$date2 = new \DateTime($date1);

$limit1 = '2013-12-31 23:59:59';

$datetime->isBefore($limit1, false)->validate($date1); // true
$datetime->isBefore($limit1, false)->validate($date2); // true

$datetime->isBefore($date1, true)->validate($date1); // true
$datetime->isBefore($date2, true)->validate($date2); // true

$limit2 = '2010-01-01 00:00:00';

$datetime->isBefore($limit2)->validate($date1); // false
$datetime->isBefore($limit2)->validate($date2); // false
```

#### 4.4.3. isBetween <a name="block4.4.3"></a> [↑](#index_block)

##### Example
```php
$datetime = Validator::create()->isDateTime('propertyName');
$date1 = '2014-01-01 00:00:00';
$date2 = new \DateTime($date1);

$minDate = '2013-01-01 00:00:00';
$maxDate = '2015-01-01 00:00:00';

$datetime->isBetween($minDate, $maxDate, false)->validate($date1); // true
$datetime->isBetween($minDate, $maxDate, false)->validate($date2); // true

$datetime->isBetween($minDate, $maxDate, true)->validate($date1); // true
$datetime->isBetween($minDate, $maxDate, true)->validate($date2); // true

$minDate = '2013-12-01 00:00:00';
$maxDate = '2013-12-30 00:00:00';

$datetime->isBetween($minDate, $maxDate, false)->validate($date1); // false
$datetime->isBetween($minDate, $maxDate, true)->validate($date1); // false
```

#### 4.4.4. isWeekend <a name="block4.4.4"></a> [↑](#index_block)

##### Example
```php
$datetime = Validator::create()->isDateTime('propertyName');

$datetime->isWeekend()->validate('2014-09-20'); // true
$datetime->isWeekend()->validate('2014-09-22'); // false
```
#### 4.4.5. isWeekday <a name="block4.4.5"></a> [↑](#index_block)

##### Example
```php
$datetime = Validator::create()->isDateTime('propertyName');

$datetime->isWeekday()->validate('2014-09-20'); // false
$datetime->isWeekday()->validate('2014-09-22'); // true
```
#### 4.4.6. isMonday <a name="block4.4.6"></a> [↑](#index_block)

##### Example
```php
$datetime = Validator::create()->isDateTime('propertyName');

$datetime->isMonday()->validate('2014-09-22'); // true
```
#### 4.4.7. isTuesday <a name="block4.4.7"></a> [↑](#index_block)

##### Example
```php
$datetime = Validator::create()->isDateTime('propertyName');

$datetime->isTuesday()->validate('2014-09-23'); // true
```
#### 4.4.8. isWednesday <a name="block4.4.8"></a> [↑](#index_block)

##### Example
```php
$validator = Validator::create();
$datetime = $validator->isDateTime('propertyName');

$datetime->isWednesday()->validate('2014-09-24'); // true
```
#### 4.4.9. isThursday <a name="block4.4.9"></a> [↑](#index_block)

##### Example
```php
$datetime = Validator::create()->isDateTime('propertyName');

$datetime->isThursday()->validate('2014-09-25'); // true
```
#### 4.4.10. isFriday <a name="block4.4.10"></a> [↑](#index_block)

##### Example
```php
$datetime = Validator::create()->isDateTime('propertyName');

$datetime->isFriday()->validate('2014-09-26'); // true
```
#### 4.4.11. isSaturday <a name="block4.4.11"></a> [↑](#index_block)

##### Example
```php
$datetime = Validator::create()->isDateTime('propertyName');

$datetime->isSaturday()->validate('2014-09-27'); // true
```
#### 4.4.12. isSunday <a name="block4.4.12"></a> [↑](#index_block)

##### Example
```php
$datetime = Validator::create()->isDateTime('propertyName');

$datetime->isSunday()->validate('2014-09-28'); // true
```
#### 4.4.13. isToday <a name="block4.4.13"></a> [↑](#index_block)

##### Example
```php
$datetime = Validator::create()->isDateTime('propertyName');

$date = new \DateTime('now');

$datetime->isToday()->validate($date); // true
```
#### 4.4.14. isYesterday <a name="block4.4.14"></a> [↑](#index_block)

##### Example
```php
$datetime = Validator::create()->isDateTime('propertyName');

$date = new \DateTime('now -1 day');

$datetime->isYesterday()->validate($date); // true
```
#### 4.4.15. isTomorrow <a name="block4.4.15"></a> [↑](#index_block)

##### Example
```php
$datetime = Validator::create()->isDateTime('propertyName');

$date = new \DateTime('now +1 day');

$datetime->isTomorrow()->validate($date); // true
```
#### 4.4.16. isLeapYear <a name="block4.4.16"></a> [↑](#index_block)

##### Example
```php
$datetime = Validator::create()->isDateTime('propertyName');

$date = new \DateTime('2016-01-01');

$datetime->isLeapYear()->validate($date); // true
```

#### 4.4.17. isMorning <a name="block4.4.17"></a> [↑](#index_block)

##### Example

```php
$datetime = Validator::create()->isDateTime('propertyName');
```

#### 4.4.18. isAftenoon <a name="block4.4.18"></a> [↑](#index_block)

##### Example

```php
$datetime = Validator::create()->isDateTime('propertyName');
```

#### 4.4.19. isEvening <a name="block4.4.19"></a> [↑](#index_block)

##### Example

```php
$datetime = Validator::create()->isDateTime('propertyName');
```

#### 4.4.20. isNight <a name="block4.4.20"></a> [↑](#index_block)

##### Example

```php
$datetime = Validator::create()->isDateTime('propertyName');
```

<a name="block4.5"></a>
## 4.5 isArray | array [↑](#index_block)
Collections are data structures that hold other data structures or same type variables.

Supported PHP data structures for the Collection validator are:

- array
- ArrayObject
- SplFixedArray

#### 4.5.1. each <a name="block4.5.1"></a> [↑](#index_block)

##### Example
```php
$validator = Validator::create();
$collection = $validator->isArray('propertyName');

$valueIsString = $validator->isString('value')->isAlpha();
$keyIsInteger = $validator->isInteger('key')->isPositive();

$array = ['hello','world'];
$arrayObject = new \ArrayObject($array);
$fixedArray = (new \SplFixedArray())->fromArray($array);

$collection->each($valueIsString)->validate($array); //true
$collection->each($valueIsString, $keyIsInteger)->validate($array); //true

$collection->each($valueIsString)->validate($arrayObject); //true
$collection->each($valueIsString, $keyIsInteger)->validate($arrayObject); //true

$collection->each($valueIsString)->validate($fixedArray); //true
$collection->each($valueIsString, $keyIsInteger)->validate($fixedArray); //true
```

#### 4.5.2. hasKeyFormat <a name="block4.5.2"></a> [↑](#index_block)

##### Example
```php
$validator = Validator::create();
$collection = $validator->isArray('propertyName');

$array = ['one' => 'hello', 'two' => 'world'];
$arrayObject = new \ArrayObject($array);
$fixedArray = (new \SplFixedArray())->fromArray(array_values($array));

$keyIsString = $validator->isString('key')->isAlpha();
$keyIsInteger = $validator->isInteger('key')->isPositive();

$collection->hasKeyFormat($keyIsString)->validate($array); //true
$collection->hasKeyFormat($keyIsString)->validate($arrayObject); //true
$collection->hasKeyFormat($keyIsInteger)->validate($fixedArray); //true

```

#### 4.5.3. endsWith <a name="block4.5.3"></a> [↑](#index_block)

##### Example
```php
$collection = Validator::create()->isArray('propertyName');

$array = ['one' => 'hello', 'two' => 1];
$arrayObject = new \ArrayObject($array);
$fixedArray = (new \SplFixedArray())->fromArray(array_values($array));

$collection->endsWith('1')->validate($array); //true
$collection->endsWith('1')->validate($arrayObject); //true
$collection->endsWith('1')->validate($fixedArray); //true

$collection->endsWith('1', true)->validate($array); //false
$collection->endsWith('1', true)->validate($arrayObject); //false
$collection->endsWith('1', true)->validate($fixedArray); //false

```

#### 4.5.4. contains <a name="block4.5.4"></a> [↑](#index_block)

##### Example
```php
$collection = Validator::create()->isArray('propertyName');

$array = ['one' => 'hello', 'two' => 1];
$arrayObject = new \ArrayObject($array);
$fixedArray = (new \SplFixedArray())->fromArray(array_values($array));

$collection->contains('hello')->validate($array); //true
$collection->contains('hello')->validate($arrayObject); //true
$collection->contains('hello')->validate($fixedArray); //true

$collection->contains(1, true)->validate($array); //true
$collection->contains(1, true)->validate($arrayObject); //true
$collection->contains(1, true)->validate($fixedArray); //true

```

#### 4.5.5. hasKey <a name="block4.5.5"></a> [↑](#index_block)

##### Example
```php
$collection = Validator::create()->isArray('propertyName');

$array = ['one' => 'hello', 'two' => 1];
$arrayObject = new \ArrayObject($array);
$fixedArray = (new \SplFixedArray())->fromArray(array_values($array));

$collection->hasKey('one')->validate($array)); //true
$collection->hasKey('one')->validate($arrayObject)); //true
$collection->hasKey(0)->validate($fixedArray)); //true

$array = [];
$arrayObject = new \ArrayObject($array);
$fixedArray = (new \SplFixedArray())->fromArray(array_values($array));

$collection->hasKey(0)->validate($array)); //false
$collection->hasKey(0)->validate($arrayObject)); //false
$collection->hasKey(0)->validate($fixedArray)); //false

```

#### 4.5.6. hasLength <a name="block4.5.6"></a> [↑](#index_block)

##### Example
```php
$collection = Validator::create()->isArray('propertyName');

$array = ['one' => 'hello', 'two' => 1];
$arrayObject = new \ArrayObject($array);
$fixedArray = (new \SplFixedArray())->fromArray(array_values($array));

$collection->hasLength(2)->validate($array)); //true
$collection->hasLength(2)->validate($arrayObject)); //true
$collection->hasLength(2)->validate($fixedArray)); //true

$array = [];
$arrayObject = new \ArrayObject($array);
$fixedArray = (new \SplFixedArray())->fromArray(array_values($array));

$collection->hasLength(0)->validate($array)); //true
$collection->hasLength(0)->validate($arrayObject)); //true
$collection->hasLength(0)->validate($fixedArray)); //true

```


#### 4.5.7. isNotEmpty <a name="block4.5.7"></a> [↑](#index_block)

##### Example
```php
$collection = Validator::create()->isArray('propertyName');

$array = ['one' => 'hello', 'two' => 1];
$arrayObject = new \ArrayObject($array);
$fixedArray = (new \SplFixedArray())->fromArray(array_values($array));

$collection->isNotEmpty()->validate($array)); //true
$collection->isNotEmpty()->validate($arrayObject)); //true
$collection->isNotEmpty()->validate($fixedArray)); //true

$array = [];
$arrayObject = new \ArrayObject($array);
$fixedArray = (new \SplFixedArray())->fromArray(array_values($array));

$collection->isNotEmpty()->validate($array)); //false
$collection->isNotEmpty()->validate($arrayObject)); //false
$collection->isNotEmpty()->validate($fixedArray)); //false
```


#### 4.5.8. startsWith <a name="block4.5.8"></a> [↑](#index_block)

##### Example
```php
$collection = Validator::create()->isArray('propertyName');

$array = [1, 2, 3];
$arrayObject = new \ArrayObject($array);
$fixedArray = (new \SplFixedArray())->fromArray($array);

$collection->startsWith(1)->validate($array)); //true
$collection->startsWith(1)->validate($arrayObject)); //true
$collection->startsWith(1)->validate($fixedArray)); //true

$collection->startsWith('1', true)->validate($array)); //false
$collection->startsWith('1', true)->validate($arrayObject)); //false
$collection->startsWith('1', true)->validate($fixedArray)); //false
```


<a name="block4.6"></a>
## 4.6 isFileUpload | file_upload [↑](#index_block)
FileUpload validation is one of the most boring parts of web development, but this validator makes things a breeze.

### One file validation
Using FileUpload validator alone, you can validate single file uploads.

```html
<form method="POST" enctype="multipart/form-data">
  <input name="image" type="file" accept="image/*">
  <input type="submit" value="Submit">
</form>
```
On the server side, validation is done as follows:

```php
$fileValidator = Validator::create()->isFileUpload('image');

$fileValidator
     ->isBetween(0, 3, 'MB', true)
     ->isMimeType(['image/png', 'image/gif', 'image/jpeg'])
     ->hasValidUploadDirectory('./uploads/images')
     ->notOverwritingExistingFile('./uploads/images')
     ->validate('image');
```

### Multiple file validation

For instance, let's say file upload is done using the following form:

```html
<form method="POST" enctype="multipart/form-data">
  <input type="file" name="image[]" multiple="multiple" accept="image/*">
  <input type="submit" value="Submit">
</form>
```

On the server side it is done exactly the same as before! Easy, right? :)


#### 4.6.1. isBetween($minSize, $maxSize, $inclusive = false)  <a name="block4.6.1"></a> [↑](#index_block)

##### Example
```php
$file = Validator::create()->isFileUpload('image');

$file->isBetween(1, 3, 'MB', true)->validate('image');
```

#### 4.6.2. isMimeType(array $allowedTypes)  <a name="block4.6.2"></a> [↑](#index_block)

##### Example
```php
$file = Validator::create()->isFileUpload('image');

$file->isMimeType(['image/png', 'image/gif', 'image/jpeg'])->validate('image');
```

#### 4.6.3. hasFileNameFormat(AbstractValidator $validator)  <a name="block4.6.3"></a> [↑](#index_block)

##### Example
```php
$validator = Validator::create();
$file = $validator->isFileUpload('image');
$stringValidator = $validator->isString('image')->isAlpha();

$file->hasFileNameFormat($stringValidator)->validate('image');
```

#### 4.6.4. hasValidUploadDirectory($uploadDir)  <a name="block4.6.4"></a> [↑](#index_block)

##### Example
```php
$file = Validator::create()->isFileUpload('image');

$file->hasValidUploadDirectory('./uploads/images')->validate('image');
```

#### 4.6.5. notOverwritingExistingFile($uploadDir)  <a name="block4.6.5"></a> [↑](#index_block)

##### Example
```php
$file = Validator::create()->isFileUpload('image');

$file->notOverwritingExistingFile('./uploads/images')->validate('image');
```

#### 4.6.6. hasLength($size)  <a name="block4.6.6"></a> [↑](#index_block)

##### Example
```php
$file = Validator::create()->isFileUpload('image');

$file->hasLength(1)->validate('image');
```

#### 4.6.7. isImage()  <a name="block4.6.7"></a> [↑](#index_block)

##### Example
```php
$file = Validator::create()->isFileUpload('image');

$file->isImage()->validate('image');
```

<a name="block4"></a>
# 4. Quality Code [↑](#index_block)
Testing has been done using PHPUnit and [Travis-CI](https://travis-ci.org). All code has been tested to be compatible from PHP 5.4 up to PHP 5.6 and [HHVM](http://hhvm.com/).

To run the test suite, you need [Composer](http://getcomposer.org):

```bash
    php composer.phar install --dev
    php bin/phpunit
```

<a name="block5"></a>
# 5. Author [↑](#index_block)
Nil Portugués Calderó

 - <contact@nilportugues.com>
 - [http://nilportugues.com](http://nilportugues.com)


<a name="block6"></a>
# 6. License [↑](#index_block)
The Input Validator is licensed under the MIT license.
