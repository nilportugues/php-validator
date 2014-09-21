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
    public function it_should_check_if_date()
    {
        $date1 = '2012-01-01 00:00:00';
        $date2 = new \DateTime($date1);

        $this->assertTrue($this->getValidator()->validate($date1));
        $this->assertTrue($this->getValidator()->validate($date2));
    }

    /**
     * @test
     */
    public function it_should_check_if_date_is_before()
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
    public function it_should_check_if_date_is_after()
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
    public function it_should_check_if_date_is_between()
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
}
