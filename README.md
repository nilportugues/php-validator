 Input Validator [Work in progress]
=========================================

[![Build Status](https://travis-ci.org/nilportugues/validator.png)](https://travis-ci.org/nilportugues/validator) [![Latest Stable Version](https://poser.pugx.org/nilportugues/validator/v/stable.svg)](https://packagist.org/packages/nilportugues/validator) [![Total Downloads](https://poser.pugx.org/nilportugues/validator/downloads.svg)](https://packagist.org/packages/nilportugues/validator) [![License](https://poser.pugx.org/nilportugues/validator/license.svg)](https://packagist.org/packages/nilportugues/validator)
 
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
        * [3.1.3. between] (#block3.1.3)
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
    * [3.2 Numbers (Integers and Floats)](#block3.2)
    * [3.3 Objects](#block3.3)
    * [3.4 Collections (Arrays)](#block3.4)
* [4. Quality Code](#block4)
* [5. Author](#block5)
* [6. License](#block6)

<a name="block1"></a>
# 1. Installation [↑](#index_block)
The recommended way to install SQL Query Builder is through [Composer](http://getcomposer.org). Just create a ``composer.json`` file and run the ``php composer.phar install`` command to install it:

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

<a name="block3.1"></a>
## 3.1 String [↑](#index_block)
String validation starts when creating a string field in the validator using the `isString` method.

```php
$validator = new \NilPortugues\Validator\Validator();

$username = $validator->isString('username');

```
The following chainable validation options are available for string data:

#### 3.1.1. isAlphanumeric <a name="block3.1.1"></a> [↑](#index_block)

#### 3.1.2. isAlpha <a name="block3.1.2"></a> [↑](#index_block)

#### 3.1.3. between <a name="block3.1.3"></a> [↑](#index_block)

#### 3.1.4. isCharset <a name="block3.1.4"></a> [↑](#index_block)

#### 3.1.5. isAllConsonants <a name="block3.1.5"></a> [↑](#index_block)

#### 3.1.6. contains <a name="block3.1.6"></a> [↑](#index_block)

#### 3.1.7. isControlCharacters <a name="block3.1.7"></a> [↑](#index_block)

#### 3.1.8. isDigit <a name="block3.1.8"></a> [↑](#index_block)

#### 3.1.9. endsWith <a name="block3.1.9"></a> [↑](#index_block)

#### 3.1.10. equals <a name="block3.1.10"></a> [↑](#index_block)

#### 3.1.11. in <a name="block3.1.11"></a> [↑](#index_block)

#### 3.1.12. hasGraphicalCharsOnly <a name="block3.1.12"></a> [↑](#index_block)

#### 3.1.13. hasLength <a name="block3.1.13"></a> [↑](#index_block)

#### 3.1.14. isLowercase <a name="block3.1.14"></a> [↑](#index_block)

#### 3.1.15. notEmpty <a name="block3.1.15"></a> [↑](#index_block)

#### 3.1.16. noWhitespace <a name="block3.1.16"></a> [↑](#index_block)

#### 3.1.17. hasPrintableCharsOnly <a name="block3.1.17"></a> [↑](#index_block)

#### 3.1.18. isPunctuation <a name="block3.1.18"></a> [↑](#index_block)

#### 3.1.19. matchesRegex <a name="block3.1.19"></a> [↑](#index_block)

#### 3.1.20. isSlug <a name="block3.1.20"></a> [↑](#index_block)

#### 3.1.21. isSpace <a name="block3.1.21"></a> [↑](#index_block)

#### 3.1.22. startsWith <a name="block3.1.22"></a> [↑](#index_block)

#### 3.1.23. isUppercase <a name="block3.1.23"></a> [↑](#index_block)

#### 3.1.24. isVersion <a name="block3.1.24"></a> [↑](#index_block)

#### 3.1.25. isVowel <a name="block3.1.25"></a> [↑](#index_block)

#### 3.1.26. isHexDigit <a name="block3.1.26"></a> [↑](#index_block)

<a name="block3.2"></a>
## 3.2 Numbers (Integers and Floats) [↑](#index_block)

<a name="block3.3"></a>
## 3.3 Objects [↑](#index_block)

<a name="block3.4"></a>
## 3.4 Collections (Arrays) [↑](#index_block)

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
SQL Query Builder is licensed under the MIT license.

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
