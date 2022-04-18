<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            
            'cover_image'       => ['required', 'mimes:png,jpg,', 'max:2048'],
            'title'             => ['required', 'max:200', 'min:5'],
            'category_id'       => ['required'],
            'edition'           => ['required', 'min:5'],
            'publisher'         => ['required', 'min:5'],
            'auther'            => ['required', 'min:5'],
            'bcopies'           => ['required','numeric' ,'min:5'],
            'published_at'      => ['required'],
            
        ];
    }
}
