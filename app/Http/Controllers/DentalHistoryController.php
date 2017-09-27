<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\DentalHistory;
class DentalHistoryController extends Controller
{
    public static function get()
    {
        $dental_histories = DentalHistory::all();
        return $dental_histories;
        // return 'adfa';
    } 
}
