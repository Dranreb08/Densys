<?php

namespace App;

use App\User;
use App\PatientDentalHistory;
use App\PatientMedicalHistory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['*'];
    public $timestamps = false;
    // const CREATED_AT = 'insert_datetime';
    // const UPDATED_AT = 'update_datetime';
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    // protected $casts = [
    //     'user_id' => 'int',
    // ];

    public function patient_medical_histories()
    {
        return $this->hasMany('App\PatientMedicalHistory');
    }
    public function patient_dental_histories()
    {
        return $this->hasMany('App\PatientDentalHistory');
    }
    public function consultations()
    {
        return $this->hasMany('App\Consultation');
    }
    
}
