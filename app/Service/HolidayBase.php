<?php

namespace App\Service;
use App\Service\CreatorHoliday;
use Illuminate\Support\Carbon;

class HolidayBase
{

    public function isHoliday($date = null)
    {
        $date = Carbon::parse($date);
        $holiday = new CreatorHoliday($date);
        $arrHolidays = $holiday->getStore()->getHolidays($date);

        if (in_array($date->toDateString(), array_keys($arrHolidays)))
        {
            return $arrHolidays[$date->toDateString()];
        } else if (Carbon::parse($date)->dayOfWeek == 6 ||Carbon::parse($date)->dayOfWeek == 0){
            return 'It\'s weekend';
        }

        return 'It\'s working day';
    }
}