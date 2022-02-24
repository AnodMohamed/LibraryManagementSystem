<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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

            'name'              => ['required', 'unique:users,name', 'max:200', 'min:5'],
            'email'             => ['required', 'unique:users,email','max:200', 'min:5','email'],
            'password'         => [ 'required', 'regex:/(?=.*[a-zA-Z])(?=.*[0-9])/', 'min:8', 'max:30'],

        ];
    }
}
