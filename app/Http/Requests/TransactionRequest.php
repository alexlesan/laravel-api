<?php

namespace App\Http\Requests;

use App\Traits\ApiRequestValidation;
use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
{
    use ApiRequestValidation;
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
            'amount' => ['required', 'regex:/^\d*(\.\d{2})?$/']
        ];
    }

    public function messages()
    {
        return [
          'amount.required' => 'Please specify an amount',
          'amount.regex' => 'The amount seems to be wrong format.'
        ];
    }
}
