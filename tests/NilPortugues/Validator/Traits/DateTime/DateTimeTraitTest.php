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
    public function it_should_check_if_date()
    {
        $date1 = '2012-01-01 00:00:00';
        $date2 = new \DateTime($date1);

        $this->assertTrue(DateTimeTrait::isDateTime($date1));
        $this->assertTrue(DateTimeTrait::isDateTime($date2));
    }

    /**
     * @test
     */
    public function it_should_check_if_date_is_before()
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
    public function it_should_check_if_date_is_after()
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
    public function it_should_check_if_date_is_between()
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
    public function it_should_check_if_is_monday()
    {
        $this->assertTrue(DateTimeTrait::isMonday('2014-09-22'));
    }

    /**
     * @test
     */
    public function it_should_check_if_is_tuesday()
    {
        $this->assertTrue(DateTimeTrait::isTuesday('2014-09-23'));
    }

    /**
     * @test
     */
    public function it_should_check_if_is_wednesday()
    {
        $this->assertTrue(DateTimeTrait::isWednesday('2014-09-24'));
    }

    /**
     * @test
     */
    public function it_should_check_if_is_thursday()
    {
        $this->assertTrue(DateTimeTrait::isThursday('2014-09-25'));
    }

    /**
     * @test
     */
    public function it_should_check_if_is_friday()
    {
        $this->assertTrue(DateTimeTrait::isFriday('2014-09-26'));
    }

    /**
     * @test
     */
    public function it_should_check_if_is_saturday()
    {
        $this->assertTrue(DateTimeTrait::isSaturday('2014-09-27'));
    }

    /**
     * @test
     */
    public function it_should_check_if_is_sunday()
    {
        $this->assertTrue(DateTimeTrait::isSunday('2014-09-28'));
    }

    /**
     * @test
     */
    public function it_should_check_if_is_today()
    {
        $date = new \DateTime('now');

        $this->assertTrue(DateTimeTrait::isToday($date));
    }

    /**
     * @test
     */
    public function it_should_check_if_is_yesterday()
    {
        $date = new \DateTime('now -1 day');

        $this->assertTrue(DateTimeTrait::isYesterday($date));
    }

    /**
     * @test
     */
    public function it_should_check_if_is_tomorrow()
    {
        $date = new \DateTime('now +1 day');

        $this->assertTrue(DateTimeTrait::isTomorrow($date));
    }

    /**
     * @test
     */
    public function it_should_check_if_is_leap_year()
    {
        $date = new \DateTime('2016-01-01');

        $this->assertTrue(DateTimeTrait::isLeapYear($date));
    }

    /**
     * @test
     */
    public function it_should_check_if_is_weekend()
    {
        $this->assertTrue(DateTimeTrait::isWeekend('2014-09-20'));
        $this->assertFalse(DateTimeTrait::isWeekend('2014-09-22'));
    }

    /**
     * @test
     */
    public function it_should_check_if_is_weekday()
    {
        $this->assertFalse(DateTimeTrait::isWeekday('2014-09-20'));
        $this->assertTrue(DateTimeTrait::isWeekday('2014-09-22'));
    }
}
