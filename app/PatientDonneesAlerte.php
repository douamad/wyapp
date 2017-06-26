<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientDonneesAlerte extends Model
{
    protected $fillable = ['nature', 'type_alerte', 'description'];

    public function patient(){
        return $this->belongsTo('App\Patient');
    }
}
