<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = ['nom_complet', 'sexe', 'numero_dossier', 'adresse', 'telephone', 'profession'];

    public function donneesAlerte(){
        return $this->hasMany('App\PatientDonneesAlerte');
    }
}
