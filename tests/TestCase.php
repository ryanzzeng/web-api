<?php

namespace Tests;

use App\Question;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function testValidPatient()
    {
        $response = $this->get('/api/showPatientWithAnswer/1');
        $response->assertStatus(200);
    }

    public function testInValidPatient()
    {
        $response = $this->get('/api/showPatientWithAnswer/12');
        $response->assertStatus(404);
    }

    public function testAddAnswerToCheckboxQuestion()
    {
        $question = Question::where('type','checkbox')->first();
        $answer_ids = $question->answers()->get()->pluck('id')->all();
        $response = $this->post('/api/questions',[
            "patient_id" => 1,
            "question_id"=> $question->id,
            "answers" => $answer_ids
        ]);
        $response->assertStatus(200);
    }

    public function testAddAnswerToRadioQuestion()
    {
        $answer_id = [];
        $question = Question::where('type','radio')->first();
        array_push($answer_id,$question->answers()->first()->id);
        $response = $this->post('/api/questions',[
            "patient_id" => 1,
            "question_id"=> $question->id,
            "answers" => $answer_id
        ]);
        $response->assertStatus(200);
    }
}
