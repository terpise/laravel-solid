<?php

namespace Terpise\Solid\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Terpise\Solid\Traits\ResponseTrait;

class Request extends FormRequest
{
    use ResponseTrait;

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->responseErrors($validator->errors()->first(), $validator->errors()));
    }
}
