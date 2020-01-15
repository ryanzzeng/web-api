<?php

namespace App\Http\Requests\Answer;

use App\Http\Requests\BaseRequest;

class CreateAnswerRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'patient_id' => 'required|integer|exists:patients,id',
            'question_id' => 'required|integer|exists:questions,id',
            'answers' => 'required|array|min:1'
        ];
    }
}
