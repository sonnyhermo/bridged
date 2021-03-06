<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBankRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required',
            'description' => 'required',
            'coverage' => 'required',
            'logo' => 'mimes:jpeg,bmp,png'
        ];
    }

    public function attributes()
    {
        return[
            'name' => 'bank name'
        ];

    }
}
