<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DentalComplaint extends Model
{
    public function consultations()
    {
        return $this->belongsTo('App\Consultation');
    }
}
