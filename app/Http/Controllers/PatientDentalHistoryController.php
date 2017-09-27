<?php

namespace App\Http\Controllers;
// use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Log;
use DB;
use App\Http\Requests;
use App\Consultation;
use App\PatientDentalHistory;
use App\PatientMedicalHistory;
class PatientDentalHistoryController extends Controller
{
    public function store(Request $request)
    {
        
        Log::useDailyFiles(storage_path().'/logs/nolie.log');
        Log::info($request->json()->all());  
        // Log::info($request->session()->token());
        // Log::info($request->header('X-Csrf-Token'));      
        // $patient_dental_history = new PatientDentalHistory;
        // $patient_medical_history = new PatientMedicalHistory;
        
        $patient = $request->json()->all();

        if($patient['data']['consultation']['chief_complaint']){
            $consultation = new Consultation;
            $consultation->patient_id = $patient['data']['patient_id'];
            $consultation->dentist_id = 1;
            $consultation->dental_compaint_id = $patient['data']['consultation']['chief_complaint'];
            
            $consultation->save();
        }


        //Saving of patient_dental_histories; use saveMany
        $new_dental_history = array();
        if($patient['data']['dental_history']){
            foreach($patient['data']['dental_history'] as $dental_history_key=>$dental_history_val){
                $new_dental_history[$dental_history_key]['patient_id'] = $patient['data']['patient_id'];
                $new_dental_history[$dental_history_key]['dental_history_id'] = ($dental_history_val?$dental_history_key:null);
            }
            PatientDentalHistory::insert($new_dental_history);
        }
        //Saving of patient_dental_histories
        if($patient['data']['medical_history']){
            $new_medical_history = array();
            foreach($patient['data']['medical_history'] as $medical_history_key=>$medical_history_val){
                $new_medical_history[$medical_history_key]['patient_id'] = $patient['data']['patient_id'];
                $new_medical_history[$medical_history_key]['medical_history_id'] = ($medical_history_val?$medical_history_key:null);
            }
            PatientMedicalHistory::insert($new_medical_history);
        }
        //Use transaction soon!
        // DB::transaction(function() use ($patient_dental_history, $patient_medical_history) {
            
        //     // $question->save();

        //     // /*
        //     //     * insert new record for question category
        //     //     */
        //     // $questionCategory->question_id = $question->id;
        //     // $questionCategory->save();
        // });
    }
    public function update(Request $request, $patient ){
        
        Log::info($request->json()->all());
        $patient_histories = $request->json()->all();
        
        
        foreach($patient_histories['data']['dental_history'] as $key=>$value){
            if($value){
                
                if(!PatientDentalHistory::where('patient_id', $patient)->where('dental_history_id',$key)->count()){
                    Log::info($key.'pasokto');
                    $new_pdh = new PatientDentalHistory;
                    
                    $new_pdh->patient_id = $patient;

                    $new_pdh->dental_history_id = $key;
            
                    $new_pdh->save();
                }
            }else{
                Log::info($key.'deleteto');
                PatientDentalHistory::where('patient_id', $patient)->where('dental_history_id',$key)->delete();
            }
        }

        foreach($patient_histories['data']['medical_history'] as $mhkey=>$mhvalue){
            if($mhvalue){
                if(!PatientMedicalHistory::where('patient_id', $patient)->where('medical_history_id',$mhkey)->count()){
                    Log::info($mhkey.'pasokto');
                    $new_pmh = new PatientMedicalHistory;
                    
                    $new_pmh->patient_id = $patient;

                    $new_pmh->medical_history_id = $mhkey;
            
                    $new_pmh->save();
                }
            }else{
                Log::info($mhkey.'deleteto');
                PatientMedicalHistory::where('patient_id', $patient)->where('medical_history_id',$mhkey)->delete();
            }
        }
    }
}
