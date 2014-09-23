<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/22/14
 * Time: 12:31 AM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\NilPortugues\Validator\Traits\DateTime;

use NilPortugues\Validator\Traits\DateTime\DateTimeTrait;

/**
 * Class DateTimeTraitTest
 * @package Tests\NilPortugues\Validator\Traits\DateTime
 */
class DateTimeTraitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function itShouldCheckIfDate()
    {
        $date1 = '2012-01-01 00:00:00';
        $date2 = new \DateTime($date1);

        $this->assertTrue(DateTimeTrait::isDateTime($date1));
        $this->assertTrue(DateTimeTrait::isDateTime($date2));
    }

    /**
     * @test
     */
    public function itShouldCheckIfDateIsBefore()
    {
        $date1 = '2012-01-01 00:00:00';
        $date2 = new \DateTime($date1);

        $limit1 = '2013-12-31 23:59:59';

        $this->assertTrue(DateTimeTrait::isBefore($date1, $limit1, false));
        $this->assertTrue(DateTimeTrait::isBefore($date2, $limit1, false));

        $this->assertTrue(DateTimeTrait::isBefore($date1, $date1, true));
        $this->assertTrue(DateTimeTrait::isBefore($date2, $date2, true));

        $limit2 = '2010-01-01 00:00:00';

        $this->assertFalse(DateTimeTrait::isBefore($date1, $limit2));
        $this->assertFalse(DateTimeTrait::isBefore($date2, $limit2));
    }

    /**
     * @test
     */
    public function itShouldCheckIfDateIsAfter()
    {
        $date1 = '2014-01-01 00:00:00';
        $date2 = new \DateTime($date1);

        $limit1 = '2013-12-31 23:59:59';

        $this->assertTrue(DateTimeTrait::isAfter($date1, $limit1, false));
        $this->assertTrue(DateTimeTrait::isAfter($date2, $limit1, false));

        $this->assertTrue(DateTimeTrait::isAfter($date1, $date1, true));
        $this->assertTrue(DateTimeTrait::isAfter($date2, $date2, true));

        $limit2 = '2015-01-01 00:00:00';

        $this->assertFalse(DateTimeTrait::isAfter($date1, $limit2));
        $this->assertFalse(DateTimeTrait::isAfter($date2, $limit2));
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

        $this->assertTrue(DateTimeTrait::isBetween($date1, $minDate, $maxDate, false));
        $this->assertTrue(DateTimeTrait::isBetween($date2, $minDate, $maxDate, false));

        $this->assertTrue(DateTimeTrait::isBetween($date1, $minDate, $maxDate, true));
        $this->assertTrue(DateTimeTrait::isBetween($date2, $minDate, $maxDate, true));

        $minDate = '2013-12-01 00:00:00';
        $maxDate = '2013-12-30 00:00:00';

        $this->assertFalse(DateTimeTrait::isBetween($date1, $minDate, $maxDate, false));
        $this->assertFalse(DateTimeTrait::isBetween($date1, $minDate, $maxDate, true));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsMonday()
    {
        $this->assertTrue(DateTimeTrait::isMonday('2014-09-22'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsTuesday()
    {
        $this->assertTrue(DateTimeTrait::isTuesday('2014-09-23'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsWednesday()
    {
        $this->assertTrue(DateTimeTrait::isWednesday('2014-09-24'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsThursday()
    {
        $this->assertTrue(DateTimeTrait::isThursday('2014-09-25'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsFriday()
    {
        $this->assertTrue(DateTimeTrait::isFriday('2014-09-26'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsSaturday()
    {
        $this->assertTrue(DateTimeTrait::isSaturday('2014-09-27'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsSunday()
    {
        $this->assertTrue(DateTimeTrait::isSunday('2014-09-28'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsToday()
    {
        $date = new \DateTime('now');

        $this->assertTrue(DateTimeTrait::isToday($date));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsYesterday()
    {
        $date = new \DateTime('now -1 day');

        $this->assertTrue(DateTimeTrait::isYesterday($date));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsTomorrow()
    {
        $date = new \DateTime('now +1 day');

        $this->assertTrue(DateTimeTrait::isTomorrow($date));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsLeapYear()
    {
        $date = new \DateTime('2016-01-01');

        $this->assertTrue(DateTimeTrait::isLeapYear($date));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsWeekend()
    {
        $this->assertTrue(DateTimeTrait::isWeekend('2014-09-20'));
        $this->assertFalse(DateTimeTrait::isWeekend('2014-09-22'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsWeekday()
    {
        $this->assertFalse(DateTimeTrait::isWeekday('2014-09-20'));
        $this->assertTrue(DateTimeTrait::isWeekday('2014-09-22'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsMorning()
    {
        $this->assertTrue(DateTimeTrait::isMorning('07:20:15'));
        $this->assertFalse(DateTimeTrait::isMorning('20:15:00'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsAfternoon()
    {
        $this->assertTrue(DateTimeTrait::isAftenoon('12:00:00'));
        $this->assertFalse(DateTimeTrait::isAftenoon('20:15:00'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsEvening()
    {
        $this->assertTrue(DateTimeTrait::isEvening('18:00:00'));
        $this->assertFalse(DateTimeTrait::isEvening('07:15:00'));
    }

    /**
     * @test
     */
    public function itShouldCheckIfIsNight()
    {
        $this->assertTrue(DateTimeTrait::isNight('01:00:00'));
        $this->assertFalse(DateTimeTrait::isNight('12:15:00'));
    }
}
