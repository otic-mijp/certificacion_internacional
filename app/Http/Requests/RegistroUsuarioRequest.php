<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegistroUsuarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // El correo debe ser único y coincidir con la confirmación
            'correo_electronico' => ['required', 'email', 'confirmed', 'max:255', 'unique:users,email'],

            // Validación de teléfonos con formato venezolano (11 dígitos: 04XX1234567)
            'telefono_celular'   => ['required', 'string', 'regex:/^(0412|0414|0424|0416|0426)\d{7}$/'],
            'telefono_local'     => ['nullable', 'string', 'regex:/^(02)\d{9}$/'],

            // IDs de ubicación y profesión
            'profesion_id'       => ['required', 'exists:profesiones,id'],
            'pais_id'            => ['required', 'exists:paises,id'],
            'estado_id'          => ['required', 'exists:estados,id'],
            'municipio_id'       => ['required', 'exists:municipios,id'],
            'parroquia_id'       => ['required', 'exists:parroquias,id'],

            // Dirección detallada
            'direccion'          => ['required', 'string', 'min:10', 'max:500'],

            // Seguridad según tus requisitos específicos
            'password'           => [
                'required',
                'confirmed',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols() // Acepta #$%&*-+
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'correo_electronico.required'  => 'El correo electrónico es obligatorio.',
            'correo_electronico.confirmed' => 'La confirmación del correo no coincide.',
            'correo_electronico.unique'    => 'Este correo ya se encuentra registrado.',
            'profesion_id.required'        => 'Debe seleccionar una profesión de la lista.',
            'pais_id.required'             => 'El país de ubicación es obligatorio.',
            'estado_id.required'           => 'El estado es obligatorio.',
            'direccion.required'           => 'Por favor, detalle su dirección de domicilio.',
            'password.required'            => 'La contraseña es obligatoria.',
            'password.confirmed'           => 'Las contraseñas no coinciden.',
            'password'                     => 'La contraseña no cumple con los requisitos de seguridad.',
        ];
    }
}
