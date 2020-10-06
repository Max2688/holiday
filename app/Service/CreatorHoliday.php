<?php

namespace App\Service;

use App\Service\HolidayDatesStore;
use Illuminate\Support\Carbon;

class CreatorHoliday extends HolidayDatesStore
{
    private $carbon;

    public function __construct(Carbon $carbon)
    {
        $this->carbon = $carbon;
    }

    public function getStore()
    {
        // TODO: Implement getStore() method.
        return new TestHoliday($this->carbon);
    }
}