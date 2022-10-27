<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCertificateRequest extends FormRequest
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
            'name' =>['required','string'],
            'description' => ['required','string'],
            'Is_published' => ['boolean','nullable'],
            'awarding' => ['required','string'],
            'fees'  => ['required_if:awarding,1','min:1','nullable']
            
        ];
    }
}
