<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('login', 'V1\UserController@login');
Route::post('register', 'V1\UserController@register');

Route::group(['middleware' => 'auth:api'], function(){
    Route::post('/details', 'V1\UserController@details');
});
Route::resource('/v1/patients', 'V1\PatientController');
Route::resource('/v1/donneesalerte', 'V1\PatientDonneesAlerteController');