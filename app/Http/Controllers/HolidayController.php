<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDate;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Holiday;

class HolidayController extends Controller
{

    public function index()
    {
        return view('holiday');
    }

    public function acceptDate(StoreDate  $request)
    {
        dump(Holiday::isHoliday($request->holiday));
    }
}
