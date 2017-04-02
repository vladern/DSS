<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'=>'min:4|max:100|required',
            'email'=>'min:5|max:100|unique:users|required',
            'password'=>'min:8|max:100|required',
            'nick'=>'min:3|max:100'
        ];
    }
}
