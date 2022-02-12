<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:6', 'max:50'],
            'email' => ['required', 'unique:users,email', 'min:3', 'max:50'],
            'password' => ['required'],
            'is_admin' => ['required', 'integer', 'between:0,1'],
            'is_s_admin' => ['required', 'integer', 'between:0,1']
        ];
    }
}
