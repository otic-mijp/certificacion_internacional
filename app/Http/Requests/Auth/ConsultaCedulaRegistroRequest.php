<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ConsultaCedulaRegistroRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'letra_cedula' => 'required|in:V,E',
            'numero_cedula'      => 'required|numeric|digits_between:6,8',
        ];
    }

    public function messages(): array
    {
        return [
            'numero_cedula.required'       => 'Debe ingresar el número de cédula.',
            'numero_cedula.numeric'        => 'La cédula solo debe contener números.',
            'numero_cedula.digits_between' => 'La cédula debe tener entre 6 y 9 dígitos.',
            'letra_cedula.required'  => 'Seleccione el tipo (V/E).',
            'letra_cedula.in'        => 'El tipo de cédula no es válido.',
        ];
    }
}
