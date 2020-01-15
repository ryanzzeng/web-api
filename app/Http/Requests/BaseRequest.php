<?php

namespace App\Http\Requests;

use App\Http\Traits\Responding;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest as Request;
use Illuminate\Validation\ValidationException;

abstract class BaseRequest extends Request
{
    use Responding;

    /**
     * Return formatting response in new Validation Exception
     *
     * @param  Validator  $validator
     *
     * @throws ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw (new ValidationException($validator,
            $this->sendError(__('messages.validation_failed'), $validator->errors()->toArray(), 400)));
    }
}
