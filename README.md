 Input Validator [Work in progress]
=========================================

[![Build Status](https://travis-ci.org/nilportugues/validator.png)](https://travis-ci.org/nilportugues/validator) [![Coverage Status](https://coveralls.io/repos/nilportugues/validator/badge.png?branch=master)](https://coveralls.io/r/nilportugues/validator?branch=master) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/nilportugues/validator/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/nilportugues/validator/?branch=master) [![SensioLabsInsight](https://insight.sensiolabs.com/projects/9fbb4900-70b9-49f6-b7d5-a9f560cdb036/mini.png)](https://insight.sensiolabs.com/projects/9fbb4900-70b9-49f6-b7d5-a9f560cdb036) [![Latest Stable Version](https://poser.pugx.org/nilportugues/validator/v/stable.svg)](https://packagist.org/packages/nilportugues/validator) [![Total Downloads](https://poser.pugx.org/nilportugues/validator/downloads.svg)](https://packagist.org/packages/nilportugues/validator) [![License](https://poser.pugx.org/nilportugues/validator/license.svg)](https://packagist.org/packages/nilportugues/validator)
 
A simple, powerful and elegant stand-alone validation library with no dependencies.

<a name="index_block"></a>
* [1. Installation](#block1)
* [2. Usage](#block2)
  * [2.1. Validate all](#block2.1)
  * [2.2. Stop on first error](#block2.2)
* [3. Methods](#block3)
    * [3.1 String](#block3.1)
        * [3.1.1. isAlphanumeric] (#block3.1.1)
        * [3.1.2. isAlpha] (#block3.1.2)
        * [3.1.3. isBetween] (#block3.1.3)
        * [3.1.4. isCharset] (#block3.1.4)
        * [3.1.5. isAllConsonants] (#block3.1.5)
        * [3.1.6. contains] (#block3.1.6)
        * [3.1.7. isControlCharacters] (#block3.1.7)
        * [3.1.8. isDigit] (#block3.1.8)
        * [3.1.9. endsWith] (#block3.1.9)
        * [3.1.10. equals] (#block3.1.10)
        * [3.1.11. in] (#block3.1.11)
        * [3.1.12. hasGraphicalCharsOnly] (#block3.1.12)
        * [3.1.13. hasLength] (#block3.1.13)
        * [3.1.14. isLowercase] (#block3.1.14)
        * [3.1.15. notEmpty] (#block3.1.15)
        * [3.1.16. noWhitespace] (#block3.1.16)
        * [3.1.17. hasPrintableCharsOnly] (#block3.1.17)
        * [3.1.18. isPunctuation] (#block3.1.18)
        * [3.1.19. matchesRegex] (#block3.1.19)
        * [3.1.20. isSlug] (#block3.1.20)
        * [3.1.21. isSpace] (#block3.1.21)
        * [3.1.22. startsWith] (#block3.1.22)
        * [3.1.23. isUppercase] (#block3.1.23)
        * [3.1.24. isVersion] (#block3.1.24)
        * [3.1.25. isVowel] (#block3.1.25)
        * [3.1.26. isHexDigit] (#block3.1.26)
        * [3.1.27. hasLowercase] (#block3.1.27)
        * [3.1.28. hasUppercase] (#block3.1.28)
        * [3.1.29. hasNumeric] (#block3.1.29)
        * [3.1.30. hasSpecialCharacters] (#block3.1.30)
        * [3.1.31. isEmail] (#block3.1.31)
        * [3.1.32. isUrl] (#block3.1.32)
    * [3.2 Numbers (Integers and Floats)](#block3.2)
        * [3.2.1. isNotZero] (#block3.2.1)
        * [3.2.2. isPositive] (#block3.2.2)
        * [3.2.3. isNegative] (#block3.2.3)
        * [3.2.4. isBetween] (#block3.2.4)
        * [3.2.5. isOdd] (#block3.2.5)
        * [3.2.6. isEven] (#block3.2.6)
        * [3.2.7. isMultiple] (#block3.2.7)
    * [3.3 Objects](#block3.3)
        * [3.3.1. isInstanceOf] (#block3.3.1)
        * [3.3.2. hasProperty] (#block3.3.2)
        * [3.3.3. hasMethod] (#block3.3.3)
        * [3.3.4. hasParentClass] (#block3.3.4)
        * [3.3.5. isChildOf] (#block3.3.5)
        * [3.3.6. inheritsFrom] (#block3.3.6)
        * [3.3.7. hasInterface] (#block3.3.7)
    * [3.4 DateTime](#block3.4)
        * [3.4.1. isAfter] (#block3.4.1)
        * [3.4.2. isBefore] (#block3.4.2)
        * [3.4.3. isBetween] (#block3.4.3)
        * [3.4.4. isWeekend] (#block3.4.4)
        * [3.4.5. isWeekday] (#block3.4.5)
        * [3.4.6. isMonday] (#block3.4.6)
        * [3.4.7. isTuesday] (#block3.4.7)
        * [3.4.8. isWednesday] (#block3.4.8)
        * [3.4.9. isThursday] (#block3.4.9)
        * [3.4.10. isFriday] (#block3.4.10)
        * [3.4.11. isSaturday] (#block3.4.11)
        * [3.4.12. isSunday] (#block3.4.12)
        * [3.4.13. isToday] (#block3.4.13)
        * [3.4.14. isYesterday] (#block3.4.14)
        * [3.4.15. isTomorrow] (#block3.4.15)
        * [3.4.16. isLeapYear] (#block3.4.16)
        * [3.4.17. isMorning] (#block3.4.17)
        * [3.4.18. isAftenoon] (#block3.4.18)
        * [3.4.19. isEvening] (#block3.4.19)
        * [3.4.20. isNight] (#block3.4.20)
    * [3.5 Collections (Arrays)](#block3.5)
        * [3.5.1. each] (#block3.5.1)
        * [3.5.2. hasKeyFormat] (#block3.5.2)
        * [3.5.3. endsWith] (#block3.5.3)
        * [3.5.4. contains] (#block3.5.4)
        * [3.5.5. hasKey] (#block3.5.5)
        * [3.5.6. length] (#block3.5.6)
        * [3.5.7. isNotEmpty] (#block3.5.7)
        * [3.5.8. startsWith] (#block3.5.8)
* [4. Quality Code](#block4)
* [5. Author](#block5)
* [6. License](#block6)

<a name="block1"></a>
# 1. Installation [↑](#index_block)
The recommended way to install the Input Validator is through [Composer](http://getcomposer.org). Just create a ``composer.json`` file and run the ``php composer.phar install`` command to install it:

```json
    {
        "require": {
            "nilportugues/validator": "dev-master"
        }
    }
```

<a name="block2"></a>
# 2. Usage [↑](#index_block)

The Validator interface is 100% human-friendly and readable. By default, it supports 2 validation styles, full validation and partial validation.

<a name="block2.1"></a>
### 2.1. Validate All [↑](#index_block)

When writing validator input data it is expected to be match a set of rules. If one or more of these rules fail, a collection of errors is returned. This is the default behaviour for `validate($input)`.

Here's how you would validate an input `age`.

```php
$validator = new \NilPortugues\Validator\Validator();

$age = $validator->isInteger('age');
$result = $age->isPositive()->isBetween(0, 100, true)->validate(28);
```

<a name="block2.2"></a>
### 2.2. Stop on first error [↑](#index_block)

Sometimes, fast validation checks are needed when validating input data. This is possible by passing `true` as the second argument to the `validate` method. 

For instance, in the following code `isBetween`is never executed.

```php
$validator = new \NilPortugues\Validator\Validator();

$age = $validator->isInteger('age');
$result = $age->isPositive()->isBetween(0, 100, true)->validate(-10, true);
```


<a name="block3"></a>
# 3. Methods [↑](#index_block)

All data type validators share 2 basic methods:

- **isRequired**
- **isNotNull**

Its usage is fairly simple:

```php
$validator = new \NilPortugues\Validator\Validator();

$username = $validator->isString('username');

$username->isRequired()->validate('Nil'); //true
$username->isNotNull()->validate(''); //false

//Or combined...
$username->isRequired()->isNotNull()->validate('Nil'); //true
```

For optional data, wrap the validator function within an if with an `isset($value)` clause and validate using `isNotNull`.

For instance, suppose gender is a value from 0 to 2 (male, female, other) and is a non-mandatory value:

```php
$validator = new \NilPortugues\Validator\Validator();

$genderValue = $validator->isInteger('gender');
$result = true;

if (isset($gender)) {
    $result = $genderValue->isNotNull()->isBetween(0, 2, true)->validate($gender);
}

return $result;
```



<a name="block3.1"></a>
## 3.1 String [↑](#index_block)
String validation starts when creating a string field in the validator using the `isString` method.

```php
$validator = new \NilPortugues\Validator\Validator();

$username = $validator->isString('username');
```
The following chainable validation options are available for string data:

#### 3.1.1. isAlphanumeric <a name="block3.1.1"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$string = $validator->isString('propertyName');

$string->isAlphanumeric()->validate('28a'); // true
$string->isAlphanumeric()->validate('hello@example.com'); // false
```

#### 3.1.2. isAlpha <a name="block3.1.2"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$string = $validator->isString('propertyName');

$string->isAlpha()->validate('Hello World'); // true
$string->isAlpha()->validate('28a'); // false
$string->isAlpha()->validate('hello@example.com'); // false
```

#### 3.1.3. isBetween <a name="block3.1.3"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$string = $validator->isString('propertyName');

$string->isBetween(2, 4)->validate('Nilo'); //false
$string->isBetween(2, 4, true)->validate('Nilo'); //true
```

#### 3.1.4. isCharset <a name="block3.1.4"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$string = $validator->isString('propertyName');

$string->isCharset(['UTF-8'])->validate('Portugués'); //true
```

#### 3.1.5. isAllConsonants <a name="block3.1.5"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$string = $validator->isString('propertyName');

$string->isAllConsonants()->validate('a'); //false
$string->isAllConsonants()->validate('bs'); //true
```

#### 3.1.6. contains <a name="block3.1.6"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$string = $validator->isString('propertyName');

$string->contains(123)->validate('AAAAAAA123A'); //true
$string->contains(123, true)->validate('AAAAAAA123A'); //false
```

#### 3.1.7. isControlCharacters <a name="block3.1.7"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$string = $validator->isString('propertyName');

$string->isControlCharacters()->validate("\n\t"); //true
$string->isControlCharacters()->validate("\nHello\tWorld"); //false
```

#### 3.1.8. isDigit <a name="block3.1.8"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$string = $validator->isString('propertyName');

$string->isDigit()->validate('10'); //true

$string->isDigit()->validate('A'); //false
$string->isDigit()->validate(145.6); //false
```

#### 3.1.9. endsWith <a name="block3.1.9"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$string = $validator->isString('propertyName');

$string->endsWith('aaaA')->validate('AAAAAAAaaaA'); //true
$string->endsWith(123, true)->validate('AAAAAAA123'); //false
```

#### 3.1.10. equals <a name="block3.1.10"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$string = $validator->isString('propertyName');

$string->equals('hello')->validate('hello'); //true

$string->equals(1)->validate('1'); //true
$string->equals(1, true)->validate('1'); //false
```

#### 3.1.11. in <a name="block3.1.11"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$string = $validator->isString('propertyName');

$string->in('a12245 asdhsjasd 63-211', true)->validate('5 asd'); //true
$string->in(122, true)->validate('a12245 asdhsjasd 63-211'); //false
```

#### 3.1.12. hasGraphicalCharsOnly <a name="block3.1.12"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$string = $validator->isString('propertyName');

$string->hasGraphicalCharsOnly()->validate('arf12'); //true
$string->hasGraphicalCharsOnly()->validate("asdf\n\r\t"); //false
```

#### 3.1.13. hasLength <a name="block3.1.13"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$string = $validator->isString('propertyName');

$string->hasLength(5)->validate('abcdefgh'); //false
$string->hasLength(8)->validate('abcdefgh'); //true
```

#### 3.1.14. isLowercase <a name="block3.1.14"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$string = $validator->isString('propertyName');

$string->isLowercase()->validate('strtolower'); //true
$string->isLowercase()->validate('strtolOwer'); //false
```

#### 3.1.15. notEmpty <a name="block3.1.15"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$string = $validator->isString('propertyName');

$string->notEmpty()->validate('a'); //true
$string->notEmpty()->validate(''); //false
```

#### 3.1.16. noWhitespace <a name="block3.1.16"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$string = $validator->isString('propertyName');

$string->noWhitespace()->validate('aaaaa'); //true
$string->noWhitespace()->validate('lorem ipsum'); //false
```

#### 3.1.17. hasPrintableCharsOnly <a name="block3.1.17"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$string = $validator->isString('propertyName');

$string->hasPrintableCharsOnly()->validate("LMKA0$%_123"); //true
$string->hasPrintableCharsOnly()->validate("LMKA0$%\t_123"); //false
```

#### 3.1.18. isPunctuation <a name="block3.1.18"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$string = $validator->isString('propertyName');

$string->isPunctuation()->validate('&,.;'); //true
$string->isPunctuation()->validate('a'); //false
```

#### 3.1.19. matchesRegex <a name="block3.1.19"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$string = $validator->isString('propertyName');

$string->matchesRegex('/[a-z]/')->validate('a'); //true
$string->matchesRegex('/[a-z]/')->validate('A'); //false
```

#### 3.1.20. isSlug <a name="block3.1.20"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$string = $validator->isString('propertyName');

$string->isSlug()->validate('hello-world-yeah'); //true

$string->isSlug()->validate('-hello-world-yeah'); //false
$string->isSlug()->validate('hello-world-yeah-'); //false
$string->isSlug()->validate('hello-world----yeah'); //false
```

#### 3.1.21. isSpace <a name="block3.1.21"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$string = $validator->isString('propertyName');

$string->isSpace()->validate('    '); //true
$string->isSpace()->validate('e e'); //false
```

#### 3.1.22. startsWith <a name="block3.1.22"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$string = $validator->isString('propertyName');

$string->startsWith('aaaA')->validate('aaaAAAAAAAA'); //true
$string->startsWith(123, true)->validate('123AAAAAAA'); //false
```

#### 3.1.23. isUppercase <a name="block3.1.23"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$string = $validator->isString('propertyName');

$string->isUppercase()->validate('AAAAAA'); //true
$string->isUppercase()->validate('aaaa'); //false
```

#### 3.1.24. isVersion <a name="block3.1.24"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$string = $validator->isString('propertyName');

$string->isVersion()->validate('1.0.2'); //true
$string->isVersion()->validate('1.0.2-beta'); //true
$string->isVersion()->validate('1.0'); //true
$string->isVersion()->validate('1.0.2 beta'); //false
```

#### 3.1.25. isVowel <a name="block3.1.25"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$string = $validator->isString('propertyName');

$string->isVowel()->validate('aeA'); //true
$string->isVowel()->validate('cds'); //false
```

#### 3.1.26. isHexDigit <a name="block3.1.26"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$string = $validator->isString('propertyName');

$string->isHexDigit()->validate(100); //true
$string->isHexDigit()->validate('h0000'); //false
```

#### 3.1.27. hasLowercase <a name="block3.1.27"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$string = $validator->isString('propertyName');

$string->hasLowercase()->validate('HELLOWOrLD'); //true
$string->hasLowercase(3)->validate('HeLLoWOrLD'); //true

$string->hasLowercase()->validate('HELLOWORLD'); //false
$string->hasLowercase(3)->validate('el'); //false
```

#### 3.1.28. hasUppercase <a name="block3.1.28"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$string = $validator->isString('propertyName');

$string->hasUppercase()->validate('hello World'); //true
$string->hasUppercase(2)->validate('Hello World'); //true

$string->hasUppercase()->validate('hello world'); //false
$string->hasUppercase(2)->validate('helloWorld'); //false
```

#### 3.1.29. hasNumeric <a name="block3.1.29"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$string = $validator->isString('propertyName');

$string->hasNumeric()->validate('hell0 W0rld'); //true
$string->hasNumeric(3)->validate('H3ll0 W0rld'); //true

$string->hasNumeric()->validate('hello world'); //false
$string->hasNumeric(2)->validate('h3lloWorld'); //false
```

#### 3.1.30. hasSpecialCharacters <a name="block3.1.30"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$string = $validator->isString('propertyName');

$string->hasSpecialCharacters()->validate('hell0@W0rld'); //true
$string->hasSpecialCharacters(2)->validate('H3ll0@W0@rld'); //true

$string->hasSpecialCharacters()->validate('hello world'); //false
$string->hasSpecialCharacters(2)->validate('h3llo@World'); //false
```

#### 3.1.31. isEmail <a name="block3.1.31"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$string = $validator->isString('propertyName');

$string->isEmail()->validate('hello@world.com'); //true
$string->isEmail()->validate('hello.earth@world.com'); //true
$string->isEmail()->validate('hello.earth+moon@world.com'); //true
$string->isEmail()->validate('hello@subdomain.world.com'); //true
$string->isEmail()->validate('hello.earth@subdomain.world.com'); //true
$string->isEmail()->validate('hello.earth+moon@subdomain.world.com'); //true
$string->isEmail()->validate('hello.earth+moon@127.0.0.1'); //true

$string->isEmail()->validate('hello.earth+moon@localhost'); //false
```

#### 3.1.32. isUrl <a name="block3.1.32"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$string = $validator->isString('propertyName');

$string->->isUrl()->validate('http://google.com'); //true
$string->->isUrl()->validate('http://google.com/robots.txt'); //true
$string->->isUrl()->validate('https://google.com'); //true
$string->->isUrl()->validate('https://google.com/robots.txt'); //true
$string->->isUrl()->validate('//google.com'); //true
$string->->isUrl()->validate('//google.com/robots.txt'); //true
```


<a name="block3.2"></a>
## 3.2 Numbers (Integers and Floats) [↑](#index_block)

Number validation comes in two flavours, `Integers` and `Floats`. Both validators share the same method interface, but internal implementation is different.

To use these validators, do as follows:

```php
$validator = new \NilPortugues\Validator\Validator();

$integer = $validator->isInteger('propertyName');

$float = $validator->isFloat('propertyName');
```

#### 3.2.1. isNotZero  <a name="block3.2.1"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$integer = $validator->isInteger('propertyName');

$integer->isNotZero()->validate(1); //true
$integer->isNotZero()->validate(0); //false
```

#### 3.2.2. isPositive  <a name="block3.2.2"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$integer = $validator->isInteger('propertyName');

$integer->isPositive()->validate(1); //true
$integer->isPositive()->validate(-10); //false
```

#### 3.2.3. isNegative  <a name="block3.2.3"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$integer = $validator->isInteger('propertyName');

$integer->isNegative()->validate(-10); //true
$integer->isNegative()->validate(1); //false
```

#### 3.2.4. isBetween  <a name="block3.2.4"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$integer = $validator->isInteger('propertyName');

$integer->isBetween(10,20, false)->validate(13); //true
$integer->isBetween(10, 20, true)->validate(10); //false
```

#### 3.2.5. isOdd  <a name="block3.2.5"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$integer = $validator->isInteger('propertyName');

$integer->isOdd()->validate(3); //true
$integer->isOdd()->validate(2); //false
```

#### 3.2.6. isEven  <a name="block3.2.6"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$integer = $validator->isInteger('propertyName');

$integer->isEven()->validate(2); //true
$integer->isEven()->validate(3); //false
```

#### 3.2.7. isMultiple  <a name="block3.2.7"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$integer = $validator->isInteger('propertyName');

$integer->isMultiple(2)->validate(4); //true
$integer->isMultiple(2)->validate(3); //false
```


<a name="block3.3"></a>
## 3.3 Objects [↑](#index_block)

#### 3.3.1. isInstanceOf<a name="block3.3.1"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$object = $validator->isObject('propertyName');

$object->isInstanceOf('DateTime')->validate(new \DateTime()); //true

$object->isInstanceOf('DateTime')->validate(new \stdClass()); //false
$object->isInstanceOf('DateTime')->validate('a'); //false
```

#### 3.3.2. hasProperty<a name="block3.3.2"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$object = $validator->isObject('propertyName');

$dummy = new Dummy();

$object->hasProperty('userName')->validate($dummy); //true
$object->hasProperty('password')->validate($dummy); //false
```

#### 3.3.3. hasMethod<a name="block3.3.3"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$object = $validator->isObject('propertyName');

$dummy = new Dummy();

$object->hasMethod('getUserName')->validate($dummy); //true
$object->hasMethod('getPassword')->validate($dummy); //false
```

#### 3.3.4. hasParentClass<a name="block3.3.4"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$object = $validator->isObject('propertyName');

$object->hasParentClass()->validate(new Dummy()); //true
$object->hasParentClass()->validate(new \stdClass()); //false
```

#### 3.3.5. isChildOf<a name="block3.3.5"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$object = $validator->isObject('propertyName');

$dummy = new Dummy(); // class Dummy extends \DateTime

$object->isChildOf('DateTime')->validate($dummy); //true
$object->isChildOf('DateTimeZone')->validate($dummy); //false
```

#### 3.3.6. inheritsFrom<a name="block3.3.6"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$object = $validator->isObject('propertyName');

$dummy = new Dummy(); // class Dummy extends \DateTime

$object->inheritsFrom('DateTime')->validate($dummy); //true
$object->inheritsFrom('DateTimeZone')->validate($dummy); //false
```

#### 3.3.7. hasInterface<a name="block3.3.7"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$object = $validator->isObject('propertyName');

$object->hasInterface('Tests\NilPortugues\Validator\Resources\DummyInterface')->validate($dummy); //true
$object->inheritsFrom('DateTimeZone')->validate($dummy); //false
```


<a name="block3.4"></a>
## 3.4 DateTime  [↑](#index_block)
DateTime Validator accepts `\DateTime` objects and `strings` variables representing **valid date formats**.

As you will see in the following examples, either two are allowed as parameters for any `date` value.

#### 3.4.1. isAfter <a name="block3.4.1"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();

$datetime = $validator->isDateTime('propertyName');
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

#### 3.4.2. isBefore <a name="block3.4.2"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();

$datetime = $validator->isDateTime('propertyName');
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

#### 3.4.3. isBetween <a name="block3.4.3"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();

$datetime = $validator->isDateTime('propertyName');
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

#### 3.4.4. isWeekend <a name="block3.4.4"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$datetime = $validator->isDateTime('propertyName');

$datetime->isWeekend()->validate('2014-09-20'); // true
$datetime->isWeekend()->validate('2014-09-22'); // false
```
#### 3.4.5. isWeekday <a name="block3.4.5"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$datetime = $validator->isDateTime('propertyName');

$datetime->isWeekday()->validate('2014-09-20'); // false
$datetime->isWeekday()->validate('2014-09-22'); // true
```
#### 3.4.6. isMonday <a name="block3.4.6"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$datetime = $validator->isDateTime('propertyName');

$datetime->isMonday()->validate('2014-09-22'); // true
```
#### 3.4.7. isTuesday <a name="block3.4.7"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$datetime = $validator->isDateTime('propertyName');

$datetime->isTuesday()->validate('2014-09-23'); // true
```
#### 3.4.8. isWednesday <a name="block3.4.8"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$datetime = $validator->isDateTime('propertyName');

$datetime->isWednesday()->validate('2014-09-24'); // true
```
#### 3.4.9. isThursday <a name="block3.4.9"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$datetime = $validator->isDateTime('propertyName');

$datetime->isThursday()->validate('2014-09-25'); // true
```
#### 3.4.10. isFriday <a name="block3.4.10"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$datetime = $validator->isDateTime('propertyName');

$datetime->isFriday()->validate('2014-09-26'); // true
```
#### 3.4.11. isSaturday <a name="block3.4.11"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$datetime = $validator->isDateTime('propertyName');

$datetime->isSaturday()->validate('2014-09-27'); // true
```
#### 3.4.12. isSunday <a name="block3.4.12"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$datetime = $validator->isDateTime('propertyName');

$datetime->isSunday()->validate('2014-09-28'); // true
```
#### 3.4.13. isToday <a name="block3.4.13"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$datetime = $validator->isDateTime('propertyName');

$date = new \DateTime('now');

$datetime->isToday()->validate($date); // true
```
#### 3.4.14. isYesterday <a name="block3.4.14"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$datetime = $validator->isDateTime('propertyName');

$date = new \DateTime('now -1 day');

$datetime->isYesterday()->validate($date); // true
```
#### 3.4.15. isTomorrow <a name="block3.4.15"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$datetime = $validator->isDateTime('propertyName');

$date = new \DateTime('now +1 day');

$datetime->isTomorrow()->validate($date); // true
```
#### 3.4.16. isLeapYear <a name="block3.4.16"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$datetime = $validator->isDateTime('propertyName');

$date = new \DateTime('2016-01-01');

$datetime->isLeapYear()->validate($date); // true
```

#### 3.4.17. isMorning <a name="block3.4.17"></a> [↑](#index_block)

##### Example

```php
$validator = new \NilPortugues\Validator\Validator();
$datetime = $validator->isDateTime('propertyName');
```

#### 3.4.18. isAftenoon <a name="block3.4.18"></a> [↑](#index_block)

##### Example

```php
$validator = new \NilPortugues\Validator\Validator();
$datetime = $validator->isDateTime('propertyName');
```

#### 3.4.19. isEvening <a name="block3.4.19"></a> [↑](#index_block)

##### Example

```php
$validator = new \NilPortugues\Validator\Validator();
$datetime = $validator->isDateTime('propertyName');
```

#### 3.4.20. isNight <a name="block3.4.20"></a> [↑](#index_block)

##### Example

```php
$validator = new \NilPortugues\Validator\Validator();
$datetime = $validator->isDateTime('propertyName');
```

<a name="block3.5"></a>
## 3.5 Collections (Arrays) [↑](#index_block)
Collections are data structures that hold other data structures or same type variables.

Supported PHP data structures for the Collection validator are:

- array
- ArrayObject
- SplFixedArray

#### 3.5.1. each <a name="block3.5.1"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
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

#### 3.5.2. hasKeyFormat <a name="block3.5.2"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$collection = $validator->isArray('propertyName');

$array = ['one' => 'hello', 'two' => 'world'];
$arrayObject = new \ArrayObject($array);
$fixedArray = (new \SplFixedArray())->fromArray(array_values($array));

$validator = new Validator();
$keyIsString = $validator->isString('key')->isAlpha();
$keyIsInteger = $validator->isInteger('key')->isPositive();

$collection->hasKeyFormat($keyIsString)->validate($array); //true
$collection->hasKeyFormat($keyIsString)->validate($arrayObject); //true
$collection->hasKeyFormat($keyIsInteger)->validate($fixedArray); //true

```

#### 3.5.3. endsWith <a name="block3.5.3"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$collection = $validator->isArray('propertyName');

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

#### 3.5.4. contains <a name="block3.5.4"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$collection = $validator->isArray('propertyName');

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

#### 3.5.5. hasKey <a name="block3.5.5"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$collection = $validator->isArray('propertyName');

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

#### 3.5.6. length <a name="block3.5.6"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$collection = $validator->isArray('propertyName');

$array = ['one' => 'hello', 'two' => 1];
$arrayObject = new \ArrayObject($array);
$fixedArray = (new \SplFixedArray())->fromArray(array_values($array));

$collection->length(2)->validate($array)); //true
$collection->length(2)->validate($arrayObject)); //true
$collection->length(2)->validate($fixedArray)); //true

$array = [];
$arrayObject = new \ArrayObject($array);
$fixedArray = (new \SplFixedArray())->fromArray(array_values($array));

$collection->length(0)->validate($array)); //true
$collection->length(0)->validate($arrayObject)); //true
$collection->length(0)->validate($fixedArray)); //true

```


#### 3.5.7. isNotEmpty <a name="block3.5.7"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$collection = $validator->isArray('propertyName');

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


#### 3.5.8. startsWith <a name="block3.5.8"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$collection = $validator->isArray('propertyName');

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


<a name="block3.5"></a>
## 3.6 FileUpload (Arrays) [↑](#index_block)
FileUpload validation is one of the most boring parts of web development.

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
$validator = new \NilPortugues\Validator\Validator();
$fileValidator = $validator->isFileUpload('image');

$fileValidator
     ->isBetween(1, 3, 'MB', true)
     ->isMimeType(['image/png', 'image/gif', 'image/jpg'])
     ->hasValidUploadDirectory('./uploads/images')
     ->notOverwritingExistingFile('./uploads/images')
     ->validate($_FILES);
```

## Multiple file validation
In combination with the Collection Validator, validator for multiple files is possible.

For instance, let's say file upload is done using the following form:

```html
<form method="POST" enctype="multipart/form-data">
  <input type="file" name="image[]" multiple="multiple" accept="image/*">
  <input type="submit" value="Submit">
</form>
```

On the server side, validation is done as follows:

```php
$validator = new \NilPortugues\Validator\Validator();
$fileValidator = $validator->isFileUpload('image');
$fileCollection = $validator->isArray('multi_upload');

//Build the validator, but don't call validate method, we'll be passing it.
$fileValidator
     ->isBetween(1, 3, 'MB', true)
     ->isMimeType(['image/png', 'image/gif', 'image/jpg'])
     ->hasValidUploadDirectory('./uploads/images')
     ->notOverwritingExistingFile('./uploads/images');

//Validate upload collection
$fileCollection
     ->isNotEmpty()
     ->each($fileValidator)
     ->validate($_FILES);

```

#### 3.6.1. isBetween($minSize, $maxSize, $inclusive = false)  <a name="block3.6.1"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$file = $validator->isFileUpload('oneFile');

$file->isBetween(1, 3, 'MB', true)->validate($_FILES);
```

#### 3.6.2. isMimeType(array $allowedTypes)  <a name="block3.6.2"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$file = $validator->isFileUpload('oneFile');

$file->isMimeType(['image/png', 'image/gif', 'image/jpg'])->validate($_FILES);
```

#### 3.6.3. hasFileNameFormat(AbstractValidator $validator)  <a name="block3.6.3"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$file = $validator->isFileUpload('oneFile');
$stringValidator = $validator->isString('oneFile')->isAlpha();

$file->hasFileNameFormat($stringValidator)->validate($_FILES);
```

#### 3.6.4. hasValidUploadDirectory($uploadDir)  <a name="block3.6.4"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$file = $validator->isFileUpload('oneFile');

$file->hasValidUploadDirectory('./uploads/images')->validate($_FILES);
```

#### 3.6.5. notOverwritingExistingFile($uploadDir)  <a name="block3.6.5"></a> [↑](#index_block)

##### Example
```php
$validator = new \NilPortugues\Validator\Validator();
$file = $validator->isFileUpload('oneFile');

$file->notOverwritingExistingFile('./uploads/images')->validate($_FILES);
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

```
Copyright (c) 2014 Nil Portugués Calderó

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
```
