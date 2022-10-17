<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\Request;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterAPIRequest extends Request
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
            ],
            'email' => [
                'required',
                'string',
                'email',
                'unique:users',
            ],
            'password' => [
                'required',
                'min:8',
            ]
        ];
    }


    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'data' => $validator->errors(),
            ])
        );
    }


    public function messages()
    {
        return [
            'name.required' => 'A name is required',
            'email.required' => 'An eMail address is required',
            'email.unique' => 'A unique eMail address is required',
            'email.email' => 'A valid eMail address is required',
            'password.min' => 'The password must be at least 8 characters long'
        ];
    }

}

