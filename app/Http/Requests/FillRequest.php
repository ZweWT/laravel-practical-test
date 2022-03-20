<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FillRequest extends FormRequest
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
            'nickname' => ['max:15', 'nullable'],
            'DOB' => ['date', 'nullable', 'nullable'],
            'phone' => ['nullable', 'regex:/(09)[0-9]{8}/'], 
            'gender' => ['nullable', 'in:male,female,others'],
        ];
    }
}
