<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\ScheduleTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\MultipleFormInterface;
use Triquanta\IziTravel\DataType\Schedule;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\Schedule
 */
class ScheduleTest extends \PHPUnit_Framework_TestCase
{

    /**
     * The schedule.
     *
     * @var array[]
     *   Keys are three-letter weekday abbreviations and values are arrays of
     *   opening and closing hours respectively, in a 24-hour format.
     */
    protected $schedule = [];

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\Schedule
     */
    protected $sut;

    public function setUp()
    {
        $this->schedule = [
          'mon' => ['09:00', '17:00'],
          'tue' => ['09:00', '17:00'],
          'wed' => ['09:00', '17:00'],
          'thu' => ['09:00', '17:00'],
          'fri' => ['09:00', '17:00'],
          'sat' => ['09:00', '17:00'],
          'sun' => null,
        ];

        $this->sut = Schedule::createFromJson(json_encode($this->schedule),
          MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     */
    public function testCreateFromJson()
    {
        Schedule::createFromJson(json_encode($this->schedule),
          MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::getMondaySchedule
     */
    public function testGetMondaySchedule()
    {
        $this->assertSame($this->schedule['mon'],
          $this->sut->getMondaySchedule());
    }

    /**
     * @covers ::getTuesdaySchedule
     */
    public function testGetTuesdaySchedule()
    {
        $this->assertSame($this->schedule['tue'],
          $this->sut->getTuesdaySchedule());
    }

    /**
     * @covers ::getWednesdaySchedule
     */
    public function testGetWednesdaySchedule()
    {
        $this->assertSame($this->schedule['wed'],
          $this->sut->getWednesdaySchedule());
    }

    /**
     * @covers ::getThursdaySchedule
     */
    public function testGetThursdaySchedule()
    {
        $this->assertSame($this->schedule['thu'],
          $this->sut->getThursdaySchedule());
    }

    /**
     * @covers ::getFridaySchedule
     */
    public function testGetFridaySchedule()
    {
        $this->assertSame($this->schedule['fri'],
          $this->sut->getFridaySchedule());
    }

    /**
     * @covers ::getSaturdaySchedule
     */
    public function testGetSaturdaySchedule()
    {
        $this->assertSame($this->schedule['sat'],
          $this->sut->getSaturdaySchedule());
    }

    /**
     * @covers ::getSundaySchedule
     */
    public function testGetSundaySchedule()
    {
        $this->assertSame($this->schedule['sun'],
          $this->sut->getSundaySchedule());
    }

}
