<?php
/**
 * Created by PhpStorm.
 * User: ext_camara13
 * Date: 14/05/2017
 * Time: 15:47
 */

namespace App\Services\V1;


use App\Patient;
use App\PatientDonneesAlerte;

class PatientDonneesAlerteService
{
    public function getDonneesAlerte(){
        return PatientDonneesAlerte::all();
    }
    public function getPatientDonneesAlerte($patient_id){
        $patient = $patient = Patient::where('id',$patient_id)->firstOrFail();
        return $patient->donneesAlerte();
    }
    public function createDonneesAlerte($req){
        $donneeAlerte = new PatientDonneesAlerte();
        $patient = Patient::where('id',$req->id_patient)->firstOrFail();
        $donneeAlerte->patient_id = $patient->id;
        $donneeAlerte->nature = $req->nature;
        $donneeAlerte->type_alerte = $req->type_alerte;
        $donneeAlerte->description = $req->nature;

        $donneeAlerte->save();
        return $donneeAlerte;
    }
}