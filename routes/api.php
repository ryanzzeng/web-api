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

//View the patient's question with answers
Route::get('/showPatientWithAnswer/{id}', 'PatientController@showPatientWithAnswer');
//Create and update an Patient's Answers to Question
Route::resource('questions','QuestionController')->only('store','update');
