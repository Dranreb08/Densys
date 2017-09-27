<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalHistory extends Model
{
    public function patient_medical_history()
    {
        return $this->belongsTo('App\PatientMedicalHistory');
    }
}
