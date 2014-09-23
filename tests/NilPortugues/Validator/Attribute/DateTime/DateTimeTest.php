<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/21/14
 * Time: 9:16 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\NilPortugues\Validator\Attribute\DateTime;

use NilPortugues\Validator\Validator;

/**
 * Class DateTimeTest
 * @package Tests\NilPortugues\Validator\Attribute\DateTime
 */
class DateTimeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return \NilPortugues\Validator\Attribute\DateTime\DateTime
     */
    protected function getValidator()
    {
        $validator = new Validator();

        return $validator->isDateTime('propertyName');
    }

    /**
     * @test
     */
    public function itShouldCheckIfDate()
    {
        $date1 = '2012-01-01 00:00:00';
        $date2 = new \DateTime($date1);

        $this->assertTrue($this->getValidator()->validate($date1));
        $this->assertTrue($this->getValidator()->validate($date2));
    }

    /**
     * @test
     */
    public function itShouldCheckIfDateIsBefore()
    {
        $date1 = '2012-01-01 00:00:00';
        $date2 = new \DateTime($date1);

        $limit1 = '2013-12-31 23:59:59';

        $this->assertTrue($this->getValidator()->isBefore($limit1, false)->validate($date1));
        $this->assertTrue($this->getValidator()->isBefore($limit1, false)->validate($date2));

        $this->assertTrue($this->getValidator()->isBefore($date1, true)->validate($date1));
        $this->assertTrue($this->getValidator()->isBefore($date2, true)->validate($date2));

        $limit2 = '2010-01-01 00:00:00';

        $this->assertFalse($this->getValidator()->isBefore($limit2)->validate($date1));
        $this->assertFalse($this->getValidator()->isBefore($limit2)->validate($date2));
    }

    /**
     * @test
     */
    public function itShouldCheckIfDateIsAfter()
    {
        $date1 = '2014-01-01 00:00:00';
        $date2 = new \DateTime($date1);

        $limit1 = '2013-12-31 23:59:59';

        $this->assertTrue($this->getValidator()->isAfter($limit1, false)->validate($date1));
        $this->assertTrue($this->getValidator()->isAfter($limit1, false)->validate($date2));

        $this->assertTrue($this->getValidator()->isAfter($date1, true)->validate($date1));
        $this->assertTrue($this->getValidator()->isAfter($date2, true)->validate($date2));

        $limit2 = '2015-01-01 00:00:00';

        $this->assertFalse($this->getValidator()->isAfter($limit2)->validate($date1));
        $this->assertFalse($this->getValidator()->isAfter($limit2)->validate($date2));
    }

    /**
     * @test
     */
    public function itShouldCheckIfDateIsBetween()
    {
        $date1 = '2014-01-01 00:00:00';
        $date2 = new \DateTime($date1);

        $minDate = '2013-01-01 00:00:00';
        $maxDate = '2015-01-01 00:00:00';

        $this->assertTrue($this->getValidator()->isBetween($minDate, $maxDate, false)->validate($date1));
        $this->assertTrue($this->getValidator()->isBetween($minDate, $maxDate, false)->validate($date2));

        $this->assertTrue($this->getValidator()->isBetween($minDate, $maxDate, true)->validate($date1));
        $this->assertTrue($this->getValidator()->isBetween($minDate, $maxDate, true)->validate($date2));

        $minDate = '2013-12-01 00:00:00';
        $maxDate = '2013-12-30 00:00:00';

        $this->assertFalse($this->getValidator()->isBetween($minDate, $maxDate, false)->validate($date1));
        $this->assertFalse($this->getValidator()->isBetween($minDate, $maxDate, true)->validate($date1));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsMonday()
    {
        $this->assertTrue($this->getValidator()->isMonday()->validate('2014-09-22'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsTuesday()
    {
        $this->assertTrue($this->getValidator()->isTuesday()->validate('2014-09-23'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsWednesday()
    {
        $this->assertTrue($this->getValidator()->isWednesday()->validate('2014-09-24'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsThursday()
    {
        $this->assertTrue($this->getValidator()->isThursday()->validate('2014-09-25'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsFriday()
    {
        $this->assertTrue($this->getValidator()->isFriday()->validate('2014-09-26'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsSaturday()
    {
        $this->assertTrue($this->getValidator()->isSaturday()->validate('2014-09-27'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsSunday()
    {
        $this->assertTrue($this->getValidator()->isSunday()->validate('2014-09-28'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsToday()
    {
        $date = new \DateTime('now');

        $this->assertTrue($this->getValidator()->isToday()->validate($date));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsYesterday()
    {
        $date = new \DateTime('now -1 day');

        $this->assertTrue($this->getValidator()->isYesterday()->validate($date));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsTomorrow()
    {
        $date = new \DateTime('now +1 day');

        $this->assertTrue($this->getValidator()->isTomorrow()->validate($date));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsLeapYear()
    {
        $date = new \DateTime('2016-01-01');

        $this->assertTrue($this->getValidator()->isLeapYear()->validate($date));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsWeekend()
    {
        $this->assertTrue($this->getValidator()->isWeekend()->validate('2014-09-20'));
        $this->assertFalse($this->getValidator()->isWeekend()->validate('2014-09-22'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsWeekday()
    {
        $this->assertFalse($this->getValidator()->isWeekday()->validate('2014-09-20'));
        $this->assertTrue($this->getValidator()->isWeekday()->validate('2014-09-22'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsMorning()
    {
        $this->assertTrue($this->getValidator()->isMorning()->validate('07:20:15'));
        $this->assertFalse($this->getValidator()->isMorning()->validate('20:15:00'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsAfternoon()
    {
        $this->assertTrue($this->getValidator()->isAftenoon()->validate('12:00:00'));
        $this->assertFalse($this->getValidator()->isAftenoon()->validate('20:15:00'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsEvening()
    {
        $this->assertTrue($this->getValidator()->isEvening()->validate('18:00:00'));
        $this->assertFalse($this->getValidator()->isEvening()->validate('07:15:00'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsNight()
    {
        $this->assertTrue($this->getValidator()->isNight()->validate('01:00:00'));
        $this->assertFalse($this->getValidator()->isNight()->validate('12:15:00'));
    }
}
