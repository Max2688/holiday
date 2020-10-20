<?php

namespace App\Service;
use App\Service\IHoliday;
use Illuminate\Support\Carbon;

class TestHoliday implements IHoliday  {

    private $carbon;

    public function __construct(Carbon $carbon)
    {
        $this->carbon = $carbon;
    }

    public function getHolidays($dates = null)
    {
        is_array($dates) || $dates = [$dates];

        foreach ($dates as $index => $date)
        {
            $dates[$index] = $this->carbon->parse($date);
        }

        $holidays = [];

        foreach ($dates as $date)
        {
            $holidays[$this->getNewYearHoliday($date)] = '1st of January';
            $holidays[$this->getMayHoliday($date)] = 'From 1st of May till 7th of May';
            $holidays[$this->getChristmasHoliday($date)] = '7th of January';
            $holidays[$this->getDayOfMonth($date,1)] = 'Monday of the 3rd week of January';
            $holidays[$this->getDayOfMonth($date,3)] = 'Monday of the last week of March';
            $holidays[$this->getDayOfMonth($date,11)] = 'Thursday of the 4th week of November';
        }

        return $holidays;
    }

    public function getNewYearHoliday($date = null)
    {
        $date = $this->carbon->parse($date);

        $dayOfWeek = $this->carbon->parse("{$date->year}-01-01")->dayOfWeek;

        $newYearHoliday = "{$date->year}-01-01";
        $dayOfWeek == 0 && $newYearHoliday = "{$date->year}-01-02";
        $dayOfWeek == 6 && $newYearHoliday = "{$date->year}-01-03";

        return $newYearHoliday;
    }

    public function getMayHoliday($date = null)
    {
        $date = $this->carbon->parse($date);

        $dayOfWeek = $this->carbon->parse("{$date->year}-05-01")->dayOfWeek;
        $earlyMayHoliday = "{$date->year}-05-01";

        $dayOfWeek == 0 && $earlyMayHoliday = "{$date->year}-05-02";
        $dayOfWeek == 1 && $earlyMayHoliday = "{$date->year}-05-01";
        $dayOfWeek == 2 && $earlyMayHoliday = "{$date->year}-05-07";
        $dayOfWeek == 3 && $earlyMayHoliday = "{$date->year}-05-06";
        $dayOfWeek == 4 && $earlyMayHoliday = "{$date->year}-05-05";
        $dayOfWeek == 5 && $earlyMayHoliday = "{$date->year}-05-04";
        $dayOfWeek == 6 && $earlyMayHoliday = "{$date->year}-05-03";

        return $earlyMayHoliday;
    }

    public function getChristmasHoliday($date = null)
    {
        $date = $this->carbon->parse($date);

        $dayOfWeek = $this->carbon->parse("{$date->year}-01-07")->dayOfWeek;

        $christmasHoliday = "{$date->year}-01-07";
        $dayOfWeek == 0 && $christmasHoliday = "{$date->year}-01-08";

        return $christmasHoliday;
    }

    public function getDayOfMonth($date = null, $month = null)
    {
        $date = $this->carbon->parse($date);
        $dayOfWeek = $date->dayOfWeek;
        $week = $date->weekOfMonth;
        $dateOfDay = false;
        $dayOfWeek == 1 && $month == 1 && $week == 3 && $dateOfDay = "{$date->year}-01-{$date->day}";
        $dayOfWeek == 1 && $month == 3 && $dateOfDay = "{$date->year}-03-{$date->endOfWeek(1)->day}";
        $dayOfWeek == 4 && $month == 11 && $week == 4 && $dateOfDay = "{$date->year}-11-{$date->day}";

        return $dateOfDay;
    }



}