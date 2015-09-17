<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/22/14
 * Time: 12:31 AM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\NilPortugues\Validator\Validation\DateTime;

use NilPortugues\Validator\Validation\DateTime\DateTimeValidation;

/**
 * Class DateTimeValidatorTest
 * @package Tests\NilPortugues\Validator\Validation\DateTimeAttribute
 */
class DateTimeValidatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function itShouldCheckIfDate()
    {
        $date1 = '2012-01-01 00:00:00';
        $date2 = new \DateTime($date1);

        $this->assertTrue(DateTimeValidation::isDateTime($date1));
        $this->assertTrue(DateTimeValidation::isDateTime($date2));
    }

    /**
     * @test
     */
    public function itShouldCheckIfDateIsBefore()
    {
        $date1 = '2012-01-01 00:00:00';
        $date2 = new \DateTime($date1);

        $limit1 = '2013-12-31 23:59:59';

        $this->assertTrue(DateTimeValidation::isBefore($date1, $limit1, false));
        $this->assertTrue(DateTimeValidation::isBefore($date2, $limit1, false));

        $this->assertTrue(DateTimeValidation::isBefore($date1, $date1, true));
        $this->assertTrue(DateTimeValidation::isBefore($date2, $date2, true));

        $limit2 = '2010-01-01 00:00:00';

        $this->assertFalse(DateTimeValidation::isBefore($date1, $limit2));
        $this->assertFalse(DateTimeValidation::isBefore($date2, $limit2));
    }

    /**
     * @test
     */
    public function itShouldCheckIfDateIsAfter()
    {
        $date1 = '2014-01-01 00:00:00';
        $date2 = new \DateTime($date1);

        $limit1 = '2013-12-31 23:59:59';

        $this->assertTrue(DateTimeValidation::isAfter($date1, $limit1, false));
        $this->assertTrue(DateTimeValidation::isAfter($date2, $limit1, false));

        $this->assertTrue(DateTimeValidation::isAfter($date1, $date1, true));
        $this->assertTrue(DateTimeValidation::isAfter($date2, $date2, true));

        $limit2 = '2015-01-01 00:00:00';

        $this->assertFalse(DateTimeValidation::isAfter($date1, $limit2));
        $this->assertFalse(DateTimeValidation::isAfter($date2, $limit2));
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

        $this->assertTrue(DateTimeValidation::isBetween($date1, $minDate, $maxDate, false));
        $this->assertTrue(DateTimeValidation::isBetween($date2, $minDate, $maxDate, false));

        $this->assertTrue(DateTimeValidation::isBetween($date1, $minDate, $maxDate, true));
        $this->assertTrue(DateTimeValidation::isBetween($date2, $minDate, $maxDate, true));

        $minDate = '2013-12-01 00:00:00';
        $maxDate = '2013-12-30 00:00:00';

        $this->assertFalse(DateTimeValidation::isBetween($date1, $minDate, $maxDate, false));
        $this->assertFalse(DateTimeValidation::isBetween($date1, $minDate, $maxDate, true));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsMonday()
    {
        $this->assertTrue(DateTimeValidation::isMonday('2014-09-22'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsTuesday()
    {
        $this->assertTrue(DateTimeValidation::isTuesday('2014-09-23'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsWednesday()
    {
        $this->assertTrue(DateTimeValidation::isWednesday('2014-09-24'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsThursday()
    {
        $this->assertTrue(DateTimeValidation::isThursday('2014-09-25'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsFriday()
    {
        $this->assertTrue(DateTimeValidation::isFriday('2014-09-26'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsSaturday()
    {
        $this->assertTrue(DateTimeValidation::isSaturday('2014-09-27'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsSunday()
    {
        $this->assertTrue(DateTimeValidation::isSunday('2014-09-28'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsToday()
    {
        $date = new \DateTime('now');

        $this->assertTrue(DateTimeValidation::isToday($date));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsYesterday()
    {
        $date = new \DateTime('now -1 day');

        $this->assertTrue(DateTimeValidation::isYesterday($date));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsTomorrow()
    {
        $date = new \DateTime('now +1 day');

        $this->assertTrue(DateTimeValidation::isTomorrow($date));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsLeapYear()
    {
        $date = new \DateTime('2016-01-01');

        $this->assertTrue(DateTimeValidation::isLeapYear($date));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsWeekend()
    {
        $this->assertTrue(DateTimeValidation::isWeekend('2014-09-20'));
        $this->assertFalse(DateTimeValidation::isWeekend('2014-09-22'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsWeekday()
    {
        $this->assertFalse(DateTimeValidation::isWeekday('2014-09-20'));
        $this->assertTrue(DateTimeValidation::isWeekday('2014-09-22'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsMorning()
    {
        $this->assertTrue(DateTimeValidation::isMorning('07:20:15'));
        $this->assertFalse(DateTimeValidation::isMorning('20:15:00'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsAfternoon()
    {
        $this->assertTrue(DateTimeValidation::isAftenoon('12:00:00'));
        $this->assertFalse(DateTimeValidation::isAftenoon('20:15:00'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsEvening()
    {
        $this->assertTrue(DateTimeValidation::isEvening('18:00:00'));
        $this->assertFalse(DateTimeValidation::isEvening('07:15:00'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsNight()
    {
        $this->assertTrue(DateTimeValidation::isNight('01:00:00'));
        $this->assertFalse(DateTimeValidation::isNight('12:15:00'));
    }
}
