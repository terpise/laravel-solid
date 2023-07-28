<?php

namespace Terpise\Solid\Requests;

use Terpise\Solid\Traits\ResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class Request extends FormRequest
{
    use ResponseTrait;
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->responseErrors($validator->errors()->first(), $validator->errors()));
    }
}
