<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PatientController extends Controller
{
    /**
     * Display the specified resource with answers.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function showPatientWithAnswer($id)
    {
        $patient = Patient::find($id);
        if(!$patient){
            throw new ModelNotFoundException('Patient not found.');
        }else{
            $questions= $patient->answers()->with('question')->get();
            return $this->sendResponse($questions);
        }
    }
}
