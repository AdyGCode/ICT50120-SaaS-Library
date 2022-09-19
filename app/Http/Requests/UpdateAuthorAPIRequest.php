<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateAuthorAPIRequest extends FormRequest
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
            'given_name' => [
                'max:64',
            ],
            'family_name' => [
                'required_without:given_name',
                'max:128',
            ],
            'is_company' => [
                'boolean',
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
            'family_name.required_without' => 'Either a given or family name is required.',
            'is_company' => 'Company must be set to True or False',
        ];
    }

}
