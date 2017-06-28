<?php

namespace App\Http\Controllers\V1;

use App\Services\V1\PatientDonneesAlerteService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PatientDonneesAlerteController extends Controller
{
    protected $donneesAlerte;
    public function __construct(PatientDonneesAlerteService $service)
    {
        $this->donneesAlerte = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donneesAlertes = $this->donneesAlerte->getDonneesAlerte();
        return response()->json($donneesAlertes);
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
            $donneesAlerte = $this->donneesAlerte->createDonneesAlerte($request);
            return response()->json($donneesAlerte, 201);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
