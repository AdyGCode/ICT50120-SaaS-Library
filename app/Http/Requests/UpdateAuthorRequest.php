<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAuthorRequest extends FormRequest
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
                'required_without:family_name',
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
}
