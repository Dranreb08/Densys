<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\DentalComplaint;
class DentalComplaintController extends Controller
{
    public static function get()
    {
        $dental_complaints = DentalComplaint::orderBy('name', 'asc')->get();
        return $dental_complaints;
        // return 'adfa';
    } 
}
