<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/17/14
 * Time: 8:44 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\NilPortugues\Validator\Validation\String;

use NilPortugues\Validator\Validation\String\StringValidation;

/**
 * Class StringValidationTest
 * @package Tests\NilPortugues\Validator\Validation\StringAttribute
 */
class StringValidationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function itShouldCheckStringIsString()
    {
        $value  = 'asdsdadds';
        $result = StringValidation::isString($value);
        $this->assertTrue($result);

        $value  = new \StdClass();
        $result = StringValidation::isString($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsAlphanumeric()
    {
        $value  = 'Qwerty1234';
        $result = StringValidation::isAlphanumeric($value);
        $this->assertTrue($result);

        $value  = '';
        $result = StringValidation::isAlphanumeric($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsAlpha()
    {
        $value  = 'querty';
        $result = StringValidation::isAlpha($value);
        $this->assertTrue($result);

        $value  = 'querty123';
        $result = StringValidation::isAlpha($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsBetween()
    {
        $value  = 'Nil';
        $result = StringValidation::isBetween($value, 2, 4, false);
        $this->assertTrue($result);

        $value  = 'Nilo';
        $result = StringValidation::isBetween($value, 2, 4, true);
        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsBetweenException()
    {
        $this->setExpectedException('\InvalidArgumentException');
        StringValidation::isBetween('Nil', 12, 4, false);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsCharset()
    {
        $value = 'Portugués';

        $result = StringValidation::isCharset($value, 'UTF-8');

        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsAllConsonants()
    {
        $value  = 'a';
        $result = StringValidation::isAllConsonants($value);
        $this->assertFalse($result);

        $value  = 'bs';
        $result = StringValidation::isAllConsonants($value);
        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsContains()
    {
        $value     = 'AAAAAAAaaaA';
        $contains  = 'aaa';
        $identical = true;
        $result    = StringValidation::contains($value, $contains, $identical);
        $this->assertTrue($result);

        $value     = 'AAAAAAA123A';
        $contains  = 123;
        $identical = false;
        $result    = StringValidation::contains($value, $contains, $identical);
        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsControlCharacters()
    {
        $value  = "\n\t";
        $result = StringValidation::isControlCharacters($value);
        $this->assertTrue($result);

        $value  = "\nHello\tWorld";
        $result = StringValidation::isControlCharacters($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsDigit()
    {
        $value  = 'A';
        $result = StringValidation::isDigit($value);
        $this->assertFalse($result);

        $value  = 145.6;
        $result = StringValidation::isDigit($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsEndsWith()
    {
        $value     = 'AAAAAAAaaaA';
        $contains  = 'aaaA';
        $identical = true;
        $result    = StringValidation::endsWith($value, $contains, $identical);
        $this->assertTrue($result);

        $value     = 'AAAAAAA123';
        $contains  = 123;
        $identical = false;
        $result    = StringValidation::endsWith($value, $contains, $identical);
        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsEquals()
    {
        $value         = 'hello';
        $comparedValue = 'hello';
        $identical     = true;
        $result        = StringValidation::equals($value, $comparedValue, $identical);
        $this->assertTrue($result);

        $value         = '1';
        $comparedValue = 1;
        $identical     = false;
        $result        = StringValidation::equals($value, $comparedValue, $identical);

        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsIn()
    {
        $haystack  = 'a12245 asdhsjasd 63-211';
        $value     = "122";
        $identical = false;
        $result    = StringValidation::in($value, $haystack, $identical);
        $this->assertTrue($result);

        $haystack  = 'a12245 asdhsjasd 63-211';
        $value     = '5 asd';
        $identical = true;
        $result    = StringValidation::in($value, $haystack, $identical);
        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsGraph()
    {
        $value  = 'arf12';
        $result = StringValidation::hasGraphicalCharsOnly($value);
        $this->assertTrue($result);

        $value  = "asdf\n\r\t";
        $result = StringValidation::hasGraphicalCharsOnly($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsLength()
    {
        $value  = 'abcdefgh';
        $length = 5;
        $result = StringValidation::hasLength($value, $length);
        $this->assertFalse($result);

        $value  = 'abcdefgh';
        $length = 8;
        $result = StringValidation::hasLength($value, $length);
        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsLowercase()
    {
        $value  = 'strtolower';
        $result = StringValidation::isLowercase($value);
        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsNotEmpty()
    {
        $value  = 'a';
        $result = StringValidation::notEmpty($value);
        $this->assertTrue($result);

        $value  = '';
        $result = StringValidation::notEmpty($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsNoWhitespace()
    {
        $value  = 'aaaaa';
        $result = StringValidation::noWhitespace($value);
        $this->assertTrue($result);

        $value  = 'lorem ipsum';
        $result = StringValidation::noWhitespace($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsPrintable()
    {
        $value  = 'LMKA0$% _123';
        $result = StringValidation::hasPrintableCharsOnly($value);
        $this->assertTrue($result);

        $value  = "LMKA0$%\t_123";
        $result = StringValidation::hasPrintableCharsOnly($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsPunctuation()
    {
        $value  = '&,.;[]';
        $result = StringValidation::isPunctuation($value);
        $this->assertTrue($result);

        $value  = 'a';
        $result = StringValidation::isPunctuation($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsRegex()
    {
        $value  = 'a';
        $regex  = '/[a-z]/';
        $result = StringValidation::matchesRegex($value, $regex);
        $this->assertTrue($result);

        $value  = 'A';
        $regex  = '/[a-z]/';
        $result = StringValidation::matchesRegex($value, $regex);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsSlug()
    {
        $value  = 'hello-world-yeah';
        $result = StringValidation::isSlug($value);
        $this->assertTrue($result);

        $value  = '-hello-world-yeah';
        $result = StringValidation::isSlug($value);
        $this->assertFalse($result);

        $value  = 'hello-world-yeah-';
        $result = StringValidation::isSlug($value);
        $this->assertFalse($result);

        $value  = 'hello-world----yeah';
        $result = StringValidation::isSlug($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsSpace()
    {
        $value  = '    ';
        $result = StringValidation::isSpace($value);
        $this->assertTrue($result);

        $value  = 'e e';
        $result = StringValidation::isSpace($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsStartsWith()
    {
        $value     = 'aaaAAAAAAAA';
        $contains  = 'aaaA';
        $identical = true;
        $result    = StringValidation::startsWith($value, $contains, $identical);
        $this->assertTrue($result);

        $value     = '123AAAAAAA';
        $contains  = 123;
        $identical = false;
        $result    = StringValidation::startsWith($value, $contains, $identical);
        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsUppercase()
    {
        $value  = 'AAAAAA';
        $result = StringValidation::isUppercase($value);
        $this->assertTrue($result);

        $value  = 'aaaa';
        $result = StringValidation::isUppercase($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsVersion()
    {
        $value  = '1.0.2';
        $result = StringValidation::isVersion($value);
        $this->assertTrue($result);

        $value  = '1.0.2-beta';
        $result = StringValidation::isVersion($value);
        $this->assertTrue($result);

        $value  = '1.0';
        $result = StringValidation::isVersion($value);
        $this->assertTrue($result);

        $value  = '1.0.2 beta';
        $result = StringValidation::isVersion($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsVowel()
    {
        $value  = 'aeA';
        $result = StringValidation::isVowel($value);
        $this->assertTrue($result);

        $value  = 'cds';
        $result = StringValidation::isVowel($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsHexDigit()
    {
        $value  = '100';
        $result = StringValidation::isHexDigit($value);
        $this->assertTrue($result);

        $value  = 'h0000';
        $result = StringValidation::isHexDigit($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldCheckIfHasLowercaseAndUppercase()
    {
        $this->assertTrue(StringValidation::hasLowercase('HELLOWOrLD'));
        $this->assertTrue(StringValidation::hasLowercase('HeLLoWOrLD', 3));

        $this->assertFalse(StringValidation::hasLowercase('HELLOWORLD'));
        $this->assertFalse(StringValidation::hasLowercase('el', 3));

        $this->assertTrue(StringValidation::hasUppercase('hello World'));
        $this->assertTrue(StringValidation::hasUppercase('Hello World', 2));

        $this->assertFalse(StringValidation::hasUppercase('hello world'));
        $this->assertFalse(StringValidation::hasUppercase('helloWorld', 2));
    }

    /**
     * @test
     */
    public function itShouldCheckIfHasNumeric()
    {
        $this->assertTrue(StringValidation::hasNumeric('hell0 W0rld'));
        $this->assertTrue(StringValidation::hasNumeric('H3ll0 W0rld', 3));

        $this->assertFalse(StringValidation::hasNumeric('hello world'));
        $this->assertFalse(StringValidation::hasNumeric('h3lloWorld', 2));
    }

    /**
     * @test
     */
    public function itShouldCheckIfHasSpecialCharacters()
    {
        $this->assertTrue(StringValidation::hasSpecialCharacters('hell0@W0rld'));
        $this->assertTrue(StringValidation::hasSpecialCharacters('H3ll0@W0@rld', 2));

        $this->assertFalse(StringValidation::hasSpecialCharacters('hello world'));
        $this->assertFalse(StringValidation::hasSpecialCharacters('h3llo@World', 2));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsEmail()
    {
        $this->assertTrue(StringValidation::isEmail('hello@world.com'));
        $this->assertTrue(StringValidation::isEmail('hello.earth@world.com'));
        $this->assertTrue(StringValidation::isEmail('hello.earth+moon@world.com'));
        $this->assertTrue(StringValidation::isEmail('hello@subdomain.world.com'));
        $this->assertTrue(StringValidation::isEmail('hello.earth@subdomain.world.com'));
        $this->assertTrue(StringValidation::isEmail('hello.earth+moon@subdomain.world.com'));
        $this->assertTrue(StringValidation::isEmail('hello.earth+moon@127.0.0.1'));

        $this->assertFalse(StringValidation::isEmail('hello.earth+moon@localhost'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsUrl()
    {
        $this->assertTrue(StringValidation::isUrl('http://google.com'));
        $this->assertTrue(StringValidation::isUrl('http://google.com/robots.txt'));
        $this->assertTrue(StringValidation::isUrl('https://google.com'));
        $this->assertTrue(StringValidation::isUrl('https://google.com/robots.txt'));
        $this->assertTrue(StringValidation::isUrl('//google.com'));
        $this->assertTrue(StringValidation::isUrl('//google.com/robots.txt'));
    }

    /**
     * @test
     */
    public function itShouldValidateUUID()
    {
        $this->assertTrue(StringValidation::isUUID('6ba7b810-9dad-11d1-80b4-00c04fd430c8'));
        $this->assertTrue(StringValidation::isUUID('6ba7b811-9dad-11d1-80b4-00c04fd430c8'));
        $this->assertTrue(StringValidation::isUUID('6ba7b812-9dad-11d1-80b4-00c04fd430c8'));
        $this->assertTrue(StringValidation::isUUID('6ba7b814-9dad-11d1-80b4-00c04fd430c8'));
        $this->assertTrue(StringValidation::isUUID('00000000-0000-0000-0000-000000000000'));

        $this->assertTrue(StringValidation::isUUID('6ba7b810-9dad-11d1-80b4-00c04fd430c8', false));
        $this->assertTrue(StringValidation::isUUID('6ba7b811-9dad-11d1-80b4-00c04fd430c8', false));
        $this->assertTrue(StringValidation::isUUID('6ba7b812-9dad-11d1-80b4-00c04fd430c8', false));
        $this->assertTrue(StringValidation::isUUID('6ba7b814-9dad-11d1-80b4-00c04fd430c8', false));
        $this->assertTrue(StringValidation::isUUID('00000000-0000-0000-0000-000000000000', false));

        $this->assertFalse(StringValidation::isUUID('{6ba7b810-9dad-11d1-80b4-00c04fd430c8}'));
        $this->assertFalse(StringValidation::isUUID('216f-ff40-98d9-11e3-a5e2-0800-200c-9a66'));
        $this->assertFalse(StringValidation::isUUID('{216fff40-98d9-11e3-a5e2-0800200c9a66}'));
        $this->assertFalse(StringValidation::isUUID('216fff4098d911e3a5e20800200c9a66'));

        $this->assertTrue(StringValidation::isUUID('{6ba7b810-9dad-11d1-80b4-00c04fd430c8}', false));
        $this->assertTrue(StringValidation::isUUID('216f-ff40-98d9-11e3-a5e2-0800-200c-9a66', false));
        $this->assertTrue(StringValidation::isUUID('{216fff40-98d9-11e3-a5e2-0800200c9a66}', false));
        $this->assertTrue(StringValidation::isUUID('216fff4098d911e3a5e20800200c9a66', false));
    }
}
