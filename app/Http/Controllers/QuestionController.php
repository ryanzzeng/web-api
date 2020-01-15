<?php

namespace App\Http\Controllers;

use App\Question;
use App\Patient;
use App\Http\Requests\Answer\CreateAnswerRequest;
use App\Http\Requests\Answer\UpdateAnswerRequest;

class QuestionController extends Controller
{
    public function index()
    {
        return $this->sendResponse(Question::with('answers')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateAnswerRequest $request)
    {
        $patient = Patient::find($request->patient_id);
        $question = Question::find($request->question_id);
        return $this->sendResponse($patient->saveOrUpdateAnswers($question,$request->answers));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAnswerRequest $request, Question $question)
    {
        $patient = Patient::find($request->patient_id);
        return $this->sendResponse($patient->saveOrUpdateAnswers($question,$request->answers));
    }
}
