<?php

namespace App;

use Exception;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name',
    ];


    /**
     * Relationship answers
     */
    public function answers()
    {
        return $this->belongsToMany(Answer::class);
    }

    /**
     * @param $question
     * @param $answers
     * @throws Exception
     */
    public function saveOrUpdateAnswers($question,$answers)
    {
        if (!$this->validateQuestionType($question, $answers)) {
            throw new Exception('You can only choose 1 answer for this question');
        }

        if ($this->validateQuestionAnswer($question, $answers)) {
            $this->answers()->wherePivot('question_id', $question->id)->detach();
            foreach ($answers as $answer) {
                $this->answers()->attach($answer, ['question_id' => $question->id]);
            }
        } else {
            throw new Exception('Invalid conbination for answer and question');
        }
    }

    /**
     * @param $question
     * @param $answer
     * @return bool
     */
    public function validateQuestionType($question,$answer)
    {
        // radio and select can only choose 1 answer while checkbox can choose multiple answers
        if($question->type === 'radio' || $question->type === 'select')
        {
            return count($answer) === 1;
        }else{
            return true;
        }
    }

    /**
     * @param $question
     * @param $answers
     * @return bool
     */
    public function validateQuestionAnswer($question,$answers)
    {
        foreach ($answers as $answer){
            if(!$question->hasAnswerOf($answer)){
                return false;
            }
        }
        return true;
    }
}
