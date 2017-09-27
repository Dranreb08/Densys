<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientDentalHistory extends Model
{
    public $timestamps = false;
    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }
}
