<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Log;
use App\PatientDentalHistory;
class PatientMedicalHistoryController extends Controller
{
    public function store(Request $request)
    {
        
        Log::useDailyFiles(storage_path().'/logs/nolie.log');
        Log::info($request->medical_history);
        // $patient_dental_history = new PatientDentalHistory;
        // foreach($request->medical_history as $dental_history_key=>$dental_history_val){
        //     $patient_dental_history['patient_id'] = 1;
        //     $patient_dental_history['dental_history_id'] = $dental_history_val;
        //     $patient_dental_history->save();
        // }
        // return redirect('/patients');
    }
    
}
