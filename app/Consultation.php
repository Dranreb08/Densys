<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    public $timestamps = false;
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
