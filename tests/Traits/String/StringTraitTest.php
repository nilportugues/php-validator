<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/17/14
 * Time: 8:44 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\NilPortugues\Validator\Traits\String;

use NilPortugues\Validator\Traits\String\StringTrait;

/**
 * Class StringTraitTest
 * @package Tests\NilPortugues\Validator\Traits\String
 */
class StringTraitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function itShouldCheckStringIsString()
    {
        $value  = 'asdsdadds';
        $result = StringTrait::isString($value);
        $this->assertTrue($result);

        $value  = new \StdClass();
        $result = StringTrait::isString($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsAlphanumeric()
    {
        $value  = 'Qwerty1234';
        $result = StringTrait::isAlphanumeric($value);
        $this->assertTrue($result);

        $value  = '';
        $result = StringTrait::isAlphanumeric($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsAlpha()
    {
        $value  = 'querty';
        $result = StringTrait::isAlpha($value);
        $this->assertTrue($result);

        $value  = 'querty123';
        $result = StringTrait::isAlpha($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsBetween()
    {
        $value  = 'Nil';
        $result = StringTrait::isBetween($value, 2, 4, false);
        $this->assertTrue($result);

        $value  = 'Nilo';
        $result = StringTrait::isBetween($value, 2, 4, true);
        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsBetweenException()
    {
        $this->setExpectedException('\InvalidArgumentException');
        StringTrait::isBetween('Nil', 12, 4, false);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsCharset()
    {
        $value = 'Portugués';

        $result = StringTrait::isCharset($value, 'UTF-8');

        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsAllConsonants()
    {
        $value  = 'a';
        $result = StringTrait::isAllConsonants($value);
        $this->assertFalse($result);

        $value  = 'bs';
        $result = StringTrait::isAllConsonants($value);
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
        $result    = StringTrait::contains($value, $contains, $identical);
        $this->assertTrue($result);

        $value     = 'AAAAAAA123A';
        $contains  = 123;
        $identical = false;
        $result    = StringTrait::contains($value, $contains, $identical);
        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsControlCharacters()
    {
        $value  = "\n\t";
        $result = StringTrait::isControlCharacters($value);
        $this->assertTrue($result);

        $value  = "\nHello\tWorld";
        $result = StringTrait::isControlCharacters($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsDigit()
    {
        $value  = 'A';
        $result = StringTrait::isDigit($value);
        $this->assertFalse($result);

        $value  = 145.6;
        $result = StringTrait::isDigit($value);
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
        $result    = StringTrait::endsWith($value, $contains, $identical);
        $this->assertTrue($result);

        $value     = 'AAAAAAA123';
        $contains  = 123;
        $identical = false;
        $result    = StringTrait::endsWith($value, $contains, $identical);
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
        $result        = StringTrait::equals($value, $comparedValue, $identical);
        $this->assertTrue($result);

        $value         = '1';
        $comparedValue = 1;
        $identical     = false;
        $result        = StringTrait::equals($value, $comparedValue, $identical);

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
        $result    = StringTrait::in($value, $haystack, $identical);
        $this->assertTrue($result);

        $haystack  = 'a12245 asdhsjasd 63-211';
        $value     = '5 asd';
        $identical = true;
        $result    = StringTrait::in($value, $haystack, $identical);
        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsGraph()
    {
        $value  = 'arf12';
        $result = StringTrait::hasGraphicalCharsOnly($value);
        $this->assertTrue($result);

        $value  = "asdf\n\r\t";
        $result = StringTrait::hasGraphicalCharsOnly($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsLength()
    {
        $value  = 'abcdefgh';
        $length = 5;
        $result = StringTrait::hasLength($value, $length);
        $this->assertFalse($result);

        $value  = 'abcdefgh';
        $length = 8;
        $result = StringTrait::hasLength($value, $length);
        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsLowercase()
    {
        $value  = 'strtolower';
        $result = StringTrait::isLowercase($value);
        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsNotEmpty()
    {
        $value  = 'a';
        $result = StringTrait::notEmpty($value);
        $this->assertTrue($result);

        $value  = '';
        $result = StringTrait::notEmpty($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsNoWhitespace()
    {
        $value  = 'aaaaa';
        $result = StringTrait::noWhitespace($value);
        $this->assertTrue($result);

        $value  = 'lorem ipsum';
        $result = StringTrait::noWhitespace($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsPrintable()
    {
        $value  = 'LMKA0$% _123';
        $result = StringTrait::hasPrintableCharsOnly($value);
        $this->assertTrue($result);

        $value  = "LMKA0$%\t_123";
        $result = StringTrait::hasPrintableCharsOnly($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsPunctuation()
    {
        $value  = '&,.;[]';
        $result = StringTrait::isPunctuation($value);
        $this->assertTrue($result);

        $value  = 'a';
        $result = StringTrait::isPunctuation($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsRegex()
    {
        $value  = 'a';
        $regex  = '/[a-z]/';
        $result = StringTrait::matchesRegex($value, $regex);
        $this->assertTrue($result);

        $value  = 'A';
        $regex  = '/[a-z]/';
        $result = StringTrait::matchesRegex($value, $regex);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsSlug()
    {
        $value  = 'hello-world-yeah';
        $result = StringTrait::isSlug($value);
        $this->assertTrue($result);

        $value  = '-hello-world-yeah';
        $result = StringTrait::isSlug($value);
        $this->assertFalse($result);

        $value  = 'hello-world-yeah-';
        $result = StringTrait::isSlug($value);
        $this->assertFalse($result);

        $value  = 'hello-world----yeah';
        $result = StringTrait::isSlug($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsSpace()
    {
        $value  = '    ';
        $result = StringTrait::isSpace($value);
        $this->assertTrue($result);

        $value  = 'e e';
        $result = StringTrait::isSpace($value);
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
        $result    = StringTrait::startsWith($value, $contains, $identical);
        $this->assertTrue($result);

        $value     = '123AAAAAAA';
        $contains  = 123;
        $identical = false;
        $result    = StringTrait::startsWith($value, $contains, $identical);
        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsUppercase()
    {
        $value  = 'AAAAAA';
        $result = StringTrait::isUppercase($value);
        $this->assertTrue($result);

        $value  = 'aaaa';
        $result = StringTrait::isUppercase($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsVersion()
    {
        $value  = '1.0.2';
        $result = StringTrait::isVersion($value);
        $this->assertTrue($result);

        $value  = '1.0.2-beta';
        $result = StringTrait::isVersion($value);
        $this->assertTrue($result);

        $value  = '1.0';
        $result = StringTrait::isVersion($value);
        $this->assertTrue($result);

        $value  = '1.0.2 beta';
        $result = StringTrait::isVersion($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsVowel()
    {
        $value  = 'aeA';
        $result = StringTrait::isVowel($value);
        $this->assertTrue($result);

        $value  = 'cds';
        $result = StringTrait::isVowel($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsHexDigit()
    {
        $value  = '100';
        $result = StringTrait::isHexDigit($value);
        $this->assertTrue($result);

        $value  = 'h0000';
        $result = StringTrait::isHexDigit($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldCheckIfHasLowercaseAndUppercase()
    {
        $this->assertTrue(StringTrait::hasLowercase('HELLOWOrLD'));
        $this->assertTrue(StringTrait::hasLowercase('HeLLoWOrLD', 3));

        $this->assertFalse(StringTrait::hasLowercase('HELLOWORLD'));
        $this->assertFalse(StringTrait::hasLowercase('el', 3));

        $this->assertTrue(StringTrait::hasUppercase('hello World'));
        $this->assertTrue(StringTrait::hasUppercase('Hello World', 2));

        $this->assertFalse(StringTrait::hasUppercase('hello world'));
        $this->assertFalse(StringTrait::hasUppercase('helloWorld', 2));
    }

    /**
     * @test
     */
    public function itShouldCheckIfHasNumeric()
    {
        $this->assertTrue(StringTrait::hasNumeric('hell0 W0rld'));
        $this->assertTrue(StringTrait::hasNumeric('H3ll0 W0rld', 3));

        $this->assertFalse(StringTrait::hasNumeric('hello world'));
        $this->assertFalse(StringTrait::hasNumeric('h3lloWorld', 2));
    }

    /**
     * @test
     */
    public function itShouldCheckIfHasSpecialCharacters()
    {
        $this->assertTrue(StringTrait::hasSpecialCharacters('hell0@W0rld'));
        $this->assertTrue(StringTrait::hasSpecialCharacters('H3ll0@W0@rld', 2));

        $this->assertFalse(StringTrait::hasSpecialCharacters('hello world'));
        $this->assertFalse(StringTrait::hasSpecialCharacters('h3llo@World', 2));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsEmail()
    {
        $this->assertTrue(StringTrait::isEmail('hello@world.com'));
        $this->assertTrue(StringTrait::isEmail('hello.earth@world.com'));
        $this->assertTrue(StringTrait::isEmail('hello.earth+moon@world.com'));
        $this->assertTrue(StringTrait::isEmail('hello@subdomain.world.com'));
        $this->assertTrue(StringTrait::isEmail('hello.earth@subdomain.world.com'));
        $this->assertTrue(StringTrait::isEmail('hello.earth+moon@subdomain.world.com'));
        $this->assertTrue(StringTrait::isEmail('hello.earth+moon@127.0.0.1'));

        $this->assertFalse(StringTrait::isEmail('hello.earth+moon@localhost'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsUrl()
    {
        $this->assertTrue(StringTrait::isUrl('http://google.com'));
        $this->assertTrue(StringTrait::isUrl('http://google.com/robots.txt'));
        $this->assertTrue(StringTrait::isUrl('https://google.com'));
        $this->assertTrue(StringTrait::isUrl('https://google.com/robots.txt'));
        $this->assertTrue(StringTrait::isUrl('//google.com'));
        $this->assertTrue(StringTrait::isUrl('//google.com/robots.txt'));
    }

    /**
     * @test
     */
    public function itShouldValidateUUID()
    {
        $this->assertTrue(StringTrait::isUUID('6ba7b810-9dad-11d1-80b4-00c04fd430c8'));
        $this->assertTrue(StringTrait::isUUID('6ba7b811-9dad-11d1-80b4-00c04fd430c8'));
        $this->assertTrue(StringTrait::isUUID('6ba7b812-9dad-11d1-80b4-00c04fd430c8'));
        $this->assertTrue(StringTrait::isUUID('6ba7b814-9dad-11d1-80b4-00c04fd430c8'));
        $this->assertTrue(StringTrait::isUUID('00000000-0000-0000-0000-000000000000'));

        $this->assertTrue(StringTrait::isUUID('6ba7b810-9dad-11d1-80b4-00c04fd430c8', false));
        $this->assertTrue(StringTrait::isUUID('6ba7b811-9dad-11d1-80b4-00c04fd430c8', false));
        $this->assertTrue(StringTrait::isUUID('6ba7b812-9dad-11d1-80b4-00c04fd430c8', false));
        $this->assertTrue(StringTrait::isUUID('6ba7b814-9dad-11d1-80b4-00c04fd430c8', false));
        $this->assertTrue(StringTrait::isUUID('00000000-0000-0000-0000-000000000000', false));

        $this->assertFalse(StringTrait::isUUID('{6ba7b810-9dad-11d1-80b4-00c04fd430c8}'));
        $this->assertFalse(StringTrait::isUUID('216f-ff40-98d9-11e3-a5e2-0800-200c-9a66'));
        $this->assertFalse(StringTrait::isUUID('{216fff40-98d9-11e3-a5e2-0800200c9a66}'));
        $this->assertFalse(StringTrait::isUUID('216fff4098d911e3a5e20800200c9a66'));

        $this->assertTrue(StringTrait::isUUID('{6ba7b810-9dad-11d1-80b4-00c04fd430c8}', false));
        $this->assertTrue(StringTrait::isUUID('216f-ff40-98d9-11e3-a5e2-0800-200c-9a66', false));
        $this->assertTrue(StringTrait::isUUID('{216fff40-98d9-11e3-a5e2-0800200c9a66}', false));
        $this->assertTrue(StringTrait::isUUID('216fff4098d911e3a5e20800200c9a66', false));
    }
}
