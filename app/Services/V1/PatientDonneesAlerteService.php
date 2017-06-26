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
    public function getPatientDonneesAlerte(Patient $patient){
        return $patient->donneesAlerte();
    }
}