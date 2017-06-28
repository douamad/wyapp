<?php

namespace App\Http\Controllers\V1;

use App\Services\V1\PatientService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PatientController extends Controller
{

    protected $patients;
    public function __construct(PatientService $service)
    {
        $this->patients = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parameter = \request()->input();
        $patients = $this->patients->getPatients($parameter);
        return response()->json($patients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $patient = $this->patients->createPatient($request);
            return response()->json($patient, 201);
        }
        catch (\Exception $e){
            return response()->json(['message'=>$e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //return response()->json($request, 200);
        try{
            $patient = $this->patients->updatePatient($request, $id);
            return response()->json($patient, 200);
        }
        catch (ModelNotFoundException $e){
            throw $e;
        }
        catch (\Exception $e){
            return response()->json(['message'=>$e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $patientName = $this->patients->deletePatient($id);
            return response()->json(['message'=>'Patient supprimer avec succée'], 204);
        }
        catch (ModelNotFoundException $e){
            throw $e;
        }
        catch (\Exception $e){
            return response()->json(['message'=>$e->getMessage()]);
        }
    }
}
