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
    public function itShouldCheckStringIsString()
    {
        $value  = 'asdsdadds';
        $result = $this->getValidator()->validate($value);
        $this->assertTrue($result);

        $value  = new \StdClass();
        $result = $this->getValidator()->validate($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsAlphanumeric()
    {
        $value  = 'Qwerty1234';
        $result = $this->getValidator()->isAlphanumeric()->validate($value);
        $this->assertTrue($result);

        $value  = '';
        $result = $this->getValidator()->isAlphanumeric()->validate($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsAlpha()
    {
        $value  = 'querty';
        $result = $this->getValidator()->isAlpha()->validate($value);
        $this->assertTrue($result);

        $value  = 'querty123';
        $result = $this->getValidator()->isAlpha()->validate($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsBetween()
    {
        $value  = 'Nil';
        $result = $this->getValidator()->isBetween(2, 4, false)->validate($value);
        $this->assertTrue($result);

        $value  = 'Nilo';
        $result = $this->getValidator()->isBetween(2, 4, true)->validate($value);
        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsBetweenException()
    {
        $this->setExpectedException('\InvalidArgumentException');
        $this->getValidator()->isBetween(4, 2, false)->validate('Nil');
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsCharset()
    {
        $value = 'Portugués';

        $result = $this->getValidator()->isCharset(['UTF-8'])->validate($value);

        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsAllConsonants()
    {
        $value  = 'a';
        $result = $this->getValidator()->isAllConsonants()->validate($value);
        $this->assertFalse($result);

        $value  = 'bs';
        $result = $this->getValidator()->isAllConsonants()->validate($value);
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
        $result    = $this->getValidator()->contains($contains, $identical)->validate($value);
        $this->assertTrue($result);

        $value     = 'AAAAAAA123A';
        $contains  = 123;
        $identical = false;
        $result    = $this->getValidator()->contains($contains, $identical)->validate($value);
        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsControlCharacters()
    {
        $value  = "\n\t";
        $result = $this->getValidator()->isControlCharacters()->validate($value);
        $this->assertTrue($result);

        $value  = "\nHello\tWorld";
        $result = $this->getValidator()->isControlCharacters()->validate($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsDigit()
    {
        $value  = 'A';
        $result = $this->getValidator()->isDigit()->validate($value);
        $this->assertFalse($result);

        $value  = 145.6;
        $result = $this->getValidator()->isDigit()->validate($value);
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
        $result    = $this->getValidator()->endsWith($contains, $identical)->validate($value);
        $this->assertTrue($result);

        $value     = 'AAAAAAA123';
        $contains  = 123;
        $identical = false;
        $result    = $this->getValidator()->endsWith($contains, $identical)->validate($value);
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
        $result        = $this->getValidator()->equals($comparedValue, $identical)->validate($value);
        $this->assertTrue($result);

        $value         = '1';
        $comparedValue = 1;
        $identical     = false;
        $result        = $this->getValidator()->equals($comparedValue, $identical)->validate($value);

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
        $result    = $this->getValidator()->in($haystack, $identical)->validate($value);
        $this->assertTrue($result);

        $haystack  = 'a12245 asdhsjasd 63-211';
        $value     = '5 asd';
        $identical = true;
        $result    = $this->getValidator()->in($haystack, $identical)->validate($value);
        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsGraph()
    {
        $value  = 'arf12';
        $result = $this->getValidator()->hasGraphicalCharsOnly()->validate($value);
        $this->assertTrue($result);

        $value  = "asdf\n\r\t";
        $result = $this->getValidator()->hasGraphicalCharsOnly()->validate($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsLength()
    {
        $value  = 'abcdefgh';
        $length = 5;
        $result = $this->getValidator()->hasLength($length)->validate($value);
        $this->assertFalse($result);

        $value  = 'abcdefgh';
        $length = 8;
        $result = $this->getValidator()->hasLength($length)->validate($value);
        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsLowercase()
    {
        $value  = 'strtolower';
        $result = $this->getValidator()->isLowercase()->validate($value);
        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsNotEmpty()
    {
        $value  = 'a';
        $result = $this->getValidator()->notEmpty()->validate($value);
        $this->assertTrue($result);

        $value  = '';
        $result = $this->getValidator()->notEmpty()->validate($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsNoWhitespace()
    {
        $value  = 'aaaaa';
        $result = $this->getValidator()->noWhitespace()->validate($value);
        $this->assertTrue($result);

        $value  = 'lorem ipsum';
        $result = $this->getValidator()->noWhitespace()->validate($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsPrintable()
    {
        $value  = 'LMKA0$% _123';
        $result = $this->getValidator()->hasPrintableCharsOnly()->validate($value);
        $this->assertTrue($result);

        $value  = "LMKA0$%\t_123";
        $result = $this->getValidator()->hasPrintableCharsOnly()->validate($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsPunctuation()
    {
        $value  = '&,.;[]';
        $result = $this->getValidator()->isPunctuation()->validate($value);
        $this->assertTrue($result);

        $value  = 'a';
        $result = $this->getValidator()->isPunctuation()->validate($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsRegex()
    {
        $value  = 'a';
        $regex  = '/[a-z]/';
        $result = $this->getValidator()->matchesRegex($regex)->validate($value);
        $this->assertTrue($result);

        $value  = 'A';
        $regex  = '/[a-z]/';
        $result = $this->getValidator()->matchesRegex($regex)->validate($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsSlug()
    {
        $value  = 'hello-world-yeah';
        $result = $this->getValidator()->isSlug()->validate($value);
        $this->assertTrue($result);

        $value  = '-hello-world-yeah';
        $result = $this->getValidator()->isSlug()->validate($value);
        $this->assertFalse($result);

        $value  = 'hello-world-yeah-';
        $result = $this->getValidator()->isSlug()->validate($value);
        $this->assertFalse($result);

        $value  = 'hello-world----yeah';
        $result = $this->getValidator()->isSlug()->validate($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsSpace()
    {
        $value  = '    ';
        $result = $this->getValidator()->isSpace()->validate($value);
        $this->assertTrue($result);

        $value  = 'e e';
        $result = $this->getValidator()->isSpace()->validate($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsStartsWith1()
    {
        $value     = 'aaaAAAAAAAA';
        $contains  = 'aaaA';
        $identical = true;
        $result    = $this->getValidator()->startsWith($contains, $identical)->validate($value);
        $this->assertTrue($result);

        $value     = '123AAAAAAA';
        $contains  = 123;
        $identical = false;
        $result    = $this->getValidator()->startsWith($contains, $identical)->validate($value);
        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsUppercase()
    {
        $value  = 'AAAAAA';
        $result = $this->getValidator()->isUppercase()->validate($value);
        $this->assertTrue($result);

        $value  = 'aaaa';
        $result = $this->getValidator()->isUppercase()->validate($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsVersion()
    {
        $value  = '1.0.2';
        $result = $this->getValidator()->isVersion()->validate($value);
        $this->assertTrue($result);

        $value  = '1.0.2-beta';
        $result = $this->getValidator()->isVersion()->validate($value);
        $this->assertTrue($result);

        $value  = '1.0';
        $result = $this->getValidator()->isVersion()->validate($value);
        $this->assertTrue($result);

        $value  = '1.0.2 beta';
        $result = $this->getValidator()->isVersion()->validate($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsVowel()
    {
        $value  = 'aeA';
        $result = $this->getValidator()->isVowel()->validate($value);
        $this->assertTrue($result);

        $value  = 'cds';
        $result = $this->getValidator()->isVowel()->validate($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldCheckStringIsXdigit()
    {
        $value  = '100';
        $result = $this->getValidator()->isHexDigit()->validate($value);
        $this->assertTrue($result);

        $value  = 'h0000';
        $result = $this->getValidator()->isHexDigit()->validate($value);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldStopValidationOnFirstError()
    {
        $value     = '@aaa';
        $validator = $this->getValidator();

        $result = $validator->isAlphanumeric()->validate($value, true);

        $this->assertFalse($result);
        $this->assertNotEmpty($validator->getErrors());
    }

    /**
     * @test
     */
    public function itShouldCheckIfHasLowercase()
    {
        $this->assertTrue($this->getValidator()->hasLowercase()->validate('HELLOWOrLD'));
        $this->assertTrue($this->getValidator()->hasLowercase(3)->validate('HeLLoWOrLD'));

        $this->assertFalse($this->getValidator()->hasLowercase()->validate('HELLOWORLD'));
        $this->assertFalse($this->getValidator()->hasLowercase(3)->validate('el'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfHasUppercase()
    {
        $this->assertTrue($this->getValidator()->hasUppercase()->validate('hello World'));
        $this->assertTrue($this->getValidator()->hasUppercase(2)->validate('Hello World'));

        $this->assertFalse($this->getValidator()->hasUppercase()->validate('hello world'));
        $this->assertFalse($this->getValidator()->hasUppercase(2)->validate('helloWorld'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfHasNumeric()
    {
        $this->assertTrue($this->getValidator()->hasNumeric()->validate('hell0 W0rld'));
        $this->assertTrue($this->getValidator()->hasNumeric(3)->validate('H3ll0 W0rld'));

        $this->assertFalse($this->getValidator()->hasNumeric()->validate('hello world'));
        $this->assertFalse($this->getValidator()->hasNumeric(2)->validate('h3lloWorld'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfHasSpecialCharacters()
    {
        $this->assertTrue($this->getValidator()->hasSpecialCharacters()->validate('hell0@W0rld'));
        $this->assertTrue($this->getValidator()->hasSpecialCharacters(2)->validate('H3ll0@W0@rld'));

        $this->assertFalse($this->getValidator()->hasSpecialCharacters()->validate('hello world'));
        $this->assertFalse($this->getValidator()->hasSpecialCharacters(2)->validate('h3llo@World'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsEmail()
    {
        $this->assertTrue($this->getValidator()->isEmail()->validate('hello@world.com'));
        $this->assertTrue($this->getValidator()->isEmail()->validate('hello.earth@world.com'));
        $this->assertTrue($this->getValidator()->isEmail()->validate('hello.earth+moon@world.com'));
        $this->assertTrue($this->getValidator()->isEmail()->validate('hello@subdomain.world.com'));
        $this->assertTrue($this->getValidator()->isEmail()->validate('hello.earth@subdomain.world.com'));
        $this->assertTrue($this->getValidator()->isEmail()->validate('hello.earth+moon@subdomain.world.com'));
        $this->assertTrue($this->getValidator()->isEmail()->validate('hello.earth+moon@127.0.0.1'));

        $this->assertFalse($this->getValidator()->isEmail()->validate('hello.earth+moon@localhost'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsUrl()
    {
        $this->assertTrue($this->getValidator()->isUrl()->validate('http://google.com'));
        $this->assertTrue($this->getValidator()->isUrl()->validate('http://google.com/robots.txt'));
        $this->assertTrue($this->getValidator()->isUrl()->validate('https://google.com'));
        $this->assertTrue($this->getValidator()->isUrl()->validate('https://google.com/robots.txt'));
        $this->assertTrue($this->getValidator()->isUrl()->validate('//google.com'));
        $this->assertTrue($this->getValidator()->isUrl()->validate('//google.com/robots.txt'));
    }

    /**
     * @test
     */
    public function itShouldValidateUUID()
    {
        $this->assertTrue($this->getValidator()->isUUID()->validate('6ba7b810-9dad-11d1-80b4-00c04fd430c8'));
        $this->assertTrue($this->getValidator()->isUUID()->validate('6ba7b811-9dad-11d1-80b4-00c04fd430c8'));
        $this->assertTrue($this->getValidator()->isUUID()->validate('6ba7b812-9dad-11d1-80b4-00c04fd430c8'));
        $this->assertTrue($this->getValidator()->isUUID()->validate('6ba7b814-9dad-11d1-80b4-00c04fd430c8'));
        $this->assertTrue($this->getValidator()->isUUID()->validate('00000000-0000-0000-0000-000000000000'));

        $this->assertTrue($this->getValidator()->isUUID(false)->validate('6ba7b810-9dad-11d1-80b4-00c04fd430c8'));
        $this->assertTrue($this->getValidator()->isUUID(false)->validate('6ba7b811-9dad-11d1-80b4-00c04fd430c8'));
        $this->assertTrue($this->getValidator()->isUUID(false)->validate('6ba7b812-9dad-11d1-80b4-00c04fd430c8'));
        $this->assertTrue($this->getValidator()->isUUID(false)->validate('6ba7b814-9dad-11d1-80b4-00c04fd430c8'));
        $this->assertTrue($this->getValidator()->isUUID(false)->validate('00000000-0000-0000-0000-000000000000'));

        $this->assertFalse($this->getValidator()->isUUID()->validate('{6ba7b810-9dad-11d1-80b4-00c04fd430c8}'));
        $this->assertFalse($this->getValidator()->isUUID()->validate('216f-ff40-98d9-11e3-a5e2-0800-200c-9a66'));
        $this->assertFalse($this->getValidator()->isUUID()->validate('{216fff40-98d9-11e3-a5e2-0800200c9a66}'));
        $this->assertFalse($this->getValidator()->isUUID()->validate('216fff4098d911e3a5e20800200c9a66'));

        $this->assertTrue($this->getValidator()->isUUID(false)->validate('{6ba7b810-9dad-11d1-80b4-00c04fd430c8}'));
        $this->assertTrue($this->getValidator()->isUUID(false)->validate('216f-ff40-98d9-11e3-a5e2-0800-200c-9a66'));
        $this->assertTrue($this->getValidator()->isUUID(false)->validate('{216fff40-98d9-11e3-a5e2-0800200c9a66}'));
        $this->assertTrue($this->getValidator()->isUUID(false)->validate('216fff4098d911e3a5e20800200c9a66'));
    }
}
