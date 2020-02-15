<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOfficial extends FormRequest
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
            'identification_card' => 'required|unique:users|min:5|max:15',
            'names' => 'required|min:4|max:120',
            'surnames' => 'required|min:4|max:120',
            'email' => 'email|required|unique:users',
            'password' => 'required|min:6|confirmed' 
        ];
    }
}
