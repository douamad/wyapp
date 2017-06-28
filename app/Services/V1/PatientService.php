<?php
/**
 * Created by PhpStorm.
 * User: ext_camara13
 * Date: 14/05/2017
 * Time: 13:58
 */

namespace App\Services\V1;


use App\Patient;

class PatientService
{
    public function getPatients($parameter){
        return Patient::all()->mapWithKeys(['patientDataController']);
    }

    public function createPatient($req){
        $patient = new Patient();
        $patient->nom_complet = $req->nom_complet;
        $patient->sexe = $req->sexe;
        $patient->adresse = $req->adresse;
        $patient->numero_dossier = $req->numero_dossier;
        $patient->telephone = $req->telephone;
        $patient->profession = $req->profession;

        $patient->save();

        return $patient;
    }
    public function updatePatient($req, $patient_id){
        $patient = Patient::where('id',$patient_id)->firstOrFail();
        $patient->nom_complet = $req->input('nom_complet');
        $patient->sexe = $req->input('sexe');
        $patient->adresse = $req->input('adresse');
        $patient->numero_dossier = $req->input('numero_dossier');
        $patient->telephone = $req->input('telephone');
        $patient->profession = $req->input('profession');

        $patient->save();

        return $patient;
    }

    public function deletePatient($patient_id){
        $patient = Patient::where('id',$patient_id)->firstOrFail();
        $patientName = $patient->nom_complet;
        $patient->delete();
        return $patientName;
    }
}