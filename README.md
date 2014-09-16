# Input Validator [Work in progress]

A simple, powerful and elegant stand-alone validation library with no dependencies.

<a name="index_block"></a>
* [1. Installation](#block1)
* [2. Usage](#block2)
* [3. Methods](#block3)
    * [3.1 String](#block3.1)
    * [3.2 Numbers (Integers and Floats)](#block3.2)
    * [3.3 Objects](#block3.3)
    * [3.4 Collections (Arrays)](#block3.4)
* [4. Quality Code](#block4)
* [5. Author](#block5)
* [6. License](#block6)

<a name="block1"></a>
## 1. Installation [↑](#index_block)
The recommended way to install SQL Query Builder is through [Composer](http://getcomposer.org). Just create a ``composer.json`` file and run the ``php composer.phar install`` command to install it:

```json
    {
        "require": {
            "nilportugues/validator": "dev-master"
        }
    }
```

<a name="block2"></a>
## 2. Usage

The Validator interface is 100% human-friendly and readable. Here's how you would validate an input `age`.

```php
$validator = new \NilPortugues\Validator\Validator();

$result = $validator
    ->isInteger('age')
    ->isPositive()
    ->isBetween(0, 100, true)
    ->validate(28);

var_dump($result); //true
var_dump($validator->getErrors()); // []

```
Clean and easy, right?

<a name="block3"></a>
## 3. Methods

<a name="block3.1"></a>
### 3.1 String

<a name="block3.2"></a>
### 3.2 Numbers (Integers and Floats)

<a name="block3.3"></a>
### 3.3 Objects

<a name="block3.4"></a>
### 3.4 Collections (Arrays)

<a name="block4"></a>
## 4. Quality Code [↑](#index_block)
Testing has been done using PHPUnit and [Travis-CI](https://travis-ci.org). All code has been tested to be compatible from PHP 5.4 up to PHP 5.6 and [HHVM](http://hhvm.com/).

To run the test suite, you need [Composer](http://getcomposer.org):

```bash
    php composer.phar install --dev
    php bin/phpunit
```


<a name="block5"></a>
## 5. Author [↑](#index_block)
Nil Portugués Calderó

 - <contact@nilportugues.com>
 - [http://nilportugues.com](http://nilportugues.com)


<a name="block6"></a>
## 6. License [↑](#index_block)
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
