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
    public function getPatients(){
        return Patient::all();
    }
}