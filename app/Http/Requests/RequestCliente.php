<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestCliente extends FormRequest
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
            'nombre' => 'required|string|max:50',
            'apellido_paterno' => 'required|string|max:50',
            'apellido_materno' => 'required|string|max:50',
            'fecha_nacimiento' => 'date_format: "d/m/Y"|required',
            'calle' => 'required|string|max:50',
            'colonia' => 'required|string|max:50',
            'num_ext' => 'required|integer|min:0',
            'codigo_postal' => 'required|integer|min:0',
            'ciudad' => 'required|string|max:50',
            'estado' => 'required|string|max:50',
            'estudio' => 'required|integer|min:0'
        ];
    }
}
