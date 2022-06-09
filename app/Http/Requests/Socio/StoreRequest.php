<?php

namespace App\Http\Requests\Socio;

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
            'usuario_id' => 'required|integer|exists:users,id',
            'nombre_socio' => 'required|string|min:3|max:255',
            'apellidos' => 'required|string|min:4|max:255',
            'fecha_nacimiento' => 'required|string|min:8|max:10',
            'telefono' => 'required|string|min:9|max:9',
            'direccion' => 'required|string|min:10|max:255',
            'padrino' => 'nullable|string|min:3|max:255',
            'motocicleta' => 'required|string|min:3|max:255',
            'foto_carnet' => 'nullable|image|mimes:png,jpg|max:1024'
        ];
    }
}
