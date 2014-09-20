<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/18/14
 * Time: 12:34 AM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\NilPortugues\Validator\Attribute\String;

use NilPortugues\Validator\Validator;

/**
 * Class StringTest
 * @package Tests\NilPortugues\Validator\Attribute\String
 */
class StringTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return \NilPortugues\Validator\Attribute\String\String
     */
    protected function getValidator()
    {
        $validator = new Validator();

        return $validator->isString('propertyName');
    }

    /**
     * @test
     */
    public function it_should_check_string_is_string()
    {
        $value = 'asdsdadds';
        $result = $this->getValidator()->validate($value);
        $this->assertTrue($result);

        $value = new \StdClass();
        $result = $this->getValidator()->validate($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function it_should_check_string_is_alphanumeric()
    {
        $value = 'Qwerty1234';
        $result = $this->getValidator()->isAlphanumeric()->validate($value);
        $this->assertTrue($result);

        $value = '';
        $result = $this->getValidator()->isAlphanumeric()->validate($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function it_should_check_string_is_alpha()
    {
        $value = 'querty';
        $result = $this->getValidator()->isAlpha()->validate($value);
        $this->assertTrue($result);

        $value = 'querty123';
        $result = $this->getValidator()->isAlpha()->validate($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function it_should_check_string_is_between()
    {
        $value = 'Nil';
        $result = $this->getValidator()->isBetween(2, 4, false)->validate($value);
        $this->assertTrue($result);

        $value = 'Nilo';
        $result = $this->getValidator()->isBetween(2, 4, true)->validate($value);
        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function it_should_check_string_is_between_exception()
    {
        $this->setExpectedException('\InvalidArgumentException');
        $this->getValidator()->isBetween(4, 2, false)->validate('Nil');
    }

    /**
     * @test
     */
    public function it_should_check_string_is_charset()
    {
        $value = 'Portugués';

        $result = $this->getValidator()->isCharset(['UTF-8'])->validate($value);

        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function it_should_check_string_is_all_consonants()
    {
        $value = 'a';
        $result = $this->getValidator()->isAllConsonants()->validate($value);
        $this->assertFalse($result);

        $value = 'bs';
        $result = $this->getValidator()->isAllConsonants()->validate($value);
        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function it_should_check_string_is_contains()
    {
        $value = 'AAAAAAAaaaA';
        $contains = 'aaa';
        $identical = true;
        $result = $this->getValidator()->contains($contains, $identical)->validate($value);
        $this->assertTrue($result);

        $value = 'AAAAAAA123A';
        $contains = 123;
        $identical = false;
        $result = $this->getValidator()->contains($contains, $identical)->validate($value);
        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function it_should_check_string_is_control_characters()
    {
        $value = "\n\t";
        $result = $this->getValidator()->isControlCharacters()->validate($value);
        $this->assertTrue($result);

        $value = "\nHello\tWorld";
        $result = $this->getValidator()->isControlCharacters()->validate($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function it_should_check_string_is_digit()
    {
        $value = 'A';
        $result = $this->getValidator()->isDigit()->validate($value);
        $this->assertFalse($result);

        $value = 145.6;
        $result = $this->getValidator()->isDigit()->validate($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function it_should_check_string_is_endsWith()
    {
        $value = 'AAAAAAAaaaA';
        $contains = 'aaaA';
        $identical = true;
        $result = $this->getValidator()->endsWith($contains, $identical)->validate($value);
        $this->assertTrue($result);

        $value = 'AAAAAAA123';
        $contains = 123;
        $identical = false;
        $result = $this->getValidator()->endsWith($contains, $identical)->validate($value);
        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function it_should_check_string_is_equals()
    {
        $value = 'hello';
        $comparedValue = 'hello';
        $identical = true;
        $result = $this->getValidator()->equals($comparedValue, $identical)->validate($value);
        $this->assertTrue($result);

        $value = '1';
        $comparedValue = 1;
        $identical = false;
        $result = $this->getValidator()->equals($comparedValue, $identical)->validate($value);

        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function it_should_check_string_is_in()
    {
        $haystack = 'a12245 asdhsjasd 63-211';
        $value = "122";
        $identical = false;
        $result = $this->getValidator()->in($haystack, $identical)->validate($value);
        $this->assertTrue($result);

        $haystack = 'a12245 asdhsjasd 63-211';
        $value = '5 asd';
        $identical = true;
        $result = $this->getValidator()->in($haystack, $identical)->validate($value);
        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function it_should_check_string_is_graph()
    {
        $value = 'arf12';
        $result = $this->getValidator()->hasGraphicalCharsOnly()->validate($value);
        $this->assertTrue($result);

        $value = "asdf\n\r\t";
        $result = $this->getValidator()->hasGraphicalCharsOnly()->validate($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function it_should_check_string_is_length()
    {
        $value = 'abcdefgh';
        $length = 5;
        $result = $this->getValidator()->hasLength($length)->validate($value);
        $this->assertFalse($result);

        $value = 'abcdefgh';
        $length = 8;
        $result = $this->getValidator()->hasLength($length)->validate($value);
        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function it_should_check_string_is_lowercase()
    {
        $value = 'strtolower';
        $result = $this->getValidator()->isLowercase()->validate($value);
        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function it_should_check_string_is_not_empty()
    {
        $value = 'a';
        $result = $this->getValidator()->notEmpty()->validate($value);
        $this->assertTrue($result);

        $value = '';
        $result = $this->getValidator()->notEmpty()->validate($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function it_should_check_string_is_no_whitespace()
    {
        $value = 'aaaaa';
        $result = $this->getValidator()->noWhitespace()->validate($value);
        $this->assertTrue($result);

        $value = 'lorem ipsum';
        $result = $this->getValidator()->noWhitespace()->validate($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function it_should_check_string_is_printable()
    {
        $value = 'LMKA0$% _123';
        $result = $this->getValidator()->hasPrintableCharsOnly()->validate($value);
        $this->assertTrue($result);

        $value = "LMKA0$%\t_123";
        $result = $this->getValidator()->hasPrintableCharsOnly()->validate($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function it_should_check_string_is_punctuation()
    {
        $value = '&,.;[]';
        $result = $this->getValidator()->isPunctuation()->validate($value);
        $this->assertTrue($result);

        $value = 'a';
        $result = $this->getValidator()->isPunctuation()->validate($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function it_should_check_string_is_regex()
    {
        $value = 'a';
        $regex = '/[a-z]/';
        $result = $this->getValidator()->matchesRegex($regex)->validate($value);
        $this->assertTrue($result);

        $value = 'A';
        $regex = '/[a-z]/';
        $result = $this->getValidator()->matchesRegex($regex)->validate($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function it_should_check_string_is_slug()
    {
        $value = 'hello-world-yeah';
        $result = $this->getValidator()->isSlug()->validate($value);
        $this->assertTrue($result);

        $value = '-hello-world-yeah';
        $result = $this->getValidator()->isSlug()->validate($value);
        $this->assertFalse($result);

        $value = 'hello-world-yeah-';
        $result = $this->getValidator()->isSlug()->validate($value);
        $this->assertFalse($result);

        $value = 'hello-world----yeah';
        $result = $this->getValidator()->isSlug()->validate($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function it_should_check_string_is_space()
    {
        $value = '    ';
        $result = $this->getValidator()->isSpace()->validate($value);
        $this->assertTrue($result);

        $value = 'e e';
        $result = $this->getValidator()->isSpace()->validate($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function it_should_check_string_is_starts_with1()
    {
        $value = 'aaaAAAAAAAA';
        $contains = 'aaaA';
        $identical = true;
        $result = $this->getValidator()->startsWith($contains, $identical)->validate($value);
        $this->assertTrue($result);

        $value = '123AAAAAAA';
        $contains = 123;
        $identical = false;
        $result = $this->getValidator()->startsWith($contains, $identical)->validate($value);
        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function it_should_check_string_is_uppercase()
    {
        $value = 'AAAAAA';
        $result = $this->getValidator()->isUppercase()->validate($value);
        $this->assertTrue($result);

        $value = 'aaaa';
        $result = $this->getValidator()->isUppercase()->validate($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function it_should_check_string_is_version()
    {
        $value = '1.0.2';
        $result = $this->getValidator()->isVersion()->validate($value);
        $this->assertTrue($result);

        $value = '1.0.2-beta';
        $result = $this->getValidator()->isVersion()->validate($value);
        $this->assertTrue($result);

        $value = '1.0';
        $result = $this->getValidator()->isVersion()->validate($value);
        $this->assertTrue($result);

        $value = '1.0.2 beta';
        $result = $this->getValidator()->isVersion()->validate($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function it_should_check_string_is_vowel()
    {
        $value = 'aeA';
        $result = $this->getValidator()->isVowel()->validate($value);
        $this->assertTrue($result);

        $value = 'cds';
        $result = $this->getValidator()->isVowel()->validate($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function it_should_check_string_is_xdigit()
    {
        $value = '100';
        $result = $this->getValidator()->isHexDigit()->validate($value);
        $this->assertTrue($result);

        $value = 'h0000';
        $result = $this->getValidator()->isHexDigit()->validate($value);
        $this->assertFalse($result);
    }

    public function it_should_stop_validation_on_first_error()
    {
        $value = '@aaa';
        $validator = $this->getValidator();

        $result = $validator->isAlphanumeric()->validate($value, true);

        $this->assertFalse($result);
        $this->assertNotEmpty($validator->getErrors());
    }
}
