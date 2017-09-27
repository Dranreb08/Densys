<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\MedicalHistory;
class MedicalHistoryController extends Controller
{
    public static function get()
    {
        $medical_histories = MedicalHistory::all();
        return $medical_histories;
        // return 'adfa';
    }
    
}
