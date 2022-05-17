<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|string|min:4|max:255|unique:users',
            'email' => 'required|email|min:8|max:255|unique:users',
            'password' => 'required|string|min:8|max:255',
            'role_id' => 'required|integer|min:1|max:3|exists:roles,id',
            'avatar' => 'nullable|image|mimes:png,jpg|max:4096'
        ];
    }
}
