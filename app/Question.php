<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'type',
    ];

    /**
     * Relationship answers
     */
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function hasAnswerOf($answer_id)
    {
        return $this->answers()
            ->where('id','=',$answer_id)
            ->where('question_id', '=', $this->id)
            ->exists();
    }
}
