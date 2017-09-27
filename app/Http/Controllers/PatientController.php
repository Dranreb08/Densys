<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Patient;
use Log;
use DB;
class PatientController extends Controller
{
    /**
     * The task repository instance.
     *
     * @var TaskRepository
     */


    /**
     * Create a new controller instance.
     *
     * @param  TaskRepository  $tasks
     * @return void
     */
    public function __construct()
    {
        Log::useDailyFiles(storage_path().'/logs/nolie.log');
        $this->middleware('auth');
    }

    /**
     * Display a list of all of the patients.
     *
     * @param  Request  $request
     * @return Response
     */
	
    public function index()
    {
        // $patients = DB::table('patients')
        //             ->join('patient_dental_histories', 'patients.id', '=', 'patient_dental_histories.patient_id')
        //             ->join('patient_medical_histories', 'patients.id', '=', 'patient_medical_histories.patient_id')
        //             ->select('patients.*', 'patient_dental_histories.dental_history_id', 'patient_medical_histories.medical_history_id')
        //             ->where('patients.id',1)
        //             ->get();
        // $patients = Patient::with('patient_dental_histories','patient_medical_histories')->get();
        // $patients = Patient::find(1);
        // foreach($patients->patient_dental_histories as $patient_dental_history)
        //     $patient_dental_history->patient_id;
        // Log::info($patients);
        // Debugbar::info($patients);
		return view('patients.index');
    }

    /**
     * Create a new patient.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        
        // $this->validate($request, [
        //     'name' => 'required|max:255',
        // ]);
       
        Log::info($request->json()->all());
        $patient_detail = $request->all();
        
        $patient = new Patient;
        foreach ($patient_detail['data'] as $patient_detail_key=>$patient_detail_val)
            $patient->$patient_detail_key = $patient_detail_val;
       
        // if($patient->save())
        if($patient->save()){
            $data['message'] = 'Patient saved.';
            $data['patient_id'] = $patient->id;
        }else
            $data['message'] = 'Patient saving failed.';
        // Log::info($patient->id);
        
        return view('common.json', [
            'data' => $data
        ]);

    }
    public function search($patient)
    {
        if($patient){
            if (strpos($patient,',') !== false) {
                $name_size=strlen($patient);
                $last_name_determiner=strcspn($patient,",");
                $last_name_searched=substr($patient, 0, $last_name_determiner);
                $first_name_searched=substr($patient, $last_name_determiner+2, $name_size);
                $searched_patients = Patient::where('surname','like',"%$last_name_searched%")->orWhere('surname','like',"%$first_name_searched%")->get();
            }
            else
                $searched_patients = Patient::where('surname','like',"%$patient%")->orWhere('first_name','like',"%$patient%")->get();
            if($searched_patients->count()){
                $searched_patients->load('consultations','patient_dental_histories','patient_medical_histories');
                $patients = array();
                foreach ($searched_patients as $key => $value) {
                    $patients[$value['id']]= $value;
                }
            }
                
            return view('common.json', [
                'data' => (empty($patients)?'Patient not found':$patients)
            ]);
        }  
    }
    
	 public function update(Request $request, Patient $patient)
    {
        //$this->authorize('destroy', $task);
		//$tobeupdated = $this->task($task);
        // $patient = App\Patient::find($patient->id);
 
        // $patient->surname = $request->surname;
         
        // $patient->save();
		if(Patient::where('id', $patient->id)->update(['surname' => $request->surname,'first_name'=>$request->first_name,'middle_name'=>$request->middle_name]))
			return redirect('/patients')->with('message', 'Saved!');;
		
            // $values=array('column1'=>'value','column2'=>'value2');
            // ItemTable::whereIn('primary_key','value')->update($values);
        //$task->delete();

        //
    }
    public function destroy(Request $request, Patient $patient)
    {
        // $this->authorize('destroy', $patient);
		
        $patient->delete();
        return back();
    }
}
