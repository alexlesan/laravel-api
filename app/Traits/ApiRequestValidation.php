<?php

namespace App\Traits;

use \Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;


trait ApiRequestValidation
{
    /**
     * handle failed requests and return json error messages
     *
     * @param \Illuminate\Contracts\Validation\Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors(),
        ], 422));
    }
}