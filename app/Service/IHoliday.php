<?php
namespace App\Service;
use Carbon\CarbonInterface;

interface IHoliday
{

    public function getNewYearHoliday($date = null);
    public function getMayHoliday($date = null);
    public function getChristmasHoliday($date = null);

}