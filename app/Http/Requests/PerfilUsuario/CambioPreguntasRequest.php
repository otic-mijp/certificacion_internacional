<?php

namespace App\Http\Requests\PerfilUsuario;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CambioPreguntasRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'pregunta_1_id' => 'required|exists:preguntas_seguridad,id',
            'respuesta_1'   => 'required|string|min:3|max:255',
            'pregunta_2_id' => 'required|exists:preguntas_seguridad,id|different:pregunta_1_id',
            'respuesta_2'   => 'required|string|min:3|max:255',
        ];
    }
    public function messages(): array
    {
        return [
            'pregunta_1_id.required' => 'La primera pregunta es obligatoria.',
            'pregunta_1_id.exists'   => 'La pregunta seleccionada no es válida.',
            'respuesta_1.required'   => 'La primera respuesta es obligatoria.',
            'respuesta_1.min'        => 'La respuesta debe tener al menos 3 caracteres.',

            'pregunta_2_id.required'  => 'La segunda pregunta es obligatoria.',
            'pregunta_2_id.exists'    => 'La pregunta seleccionada no es válida.',
            'pregunta_2_id.different' => 'Debes elegir dos preguntas diferentes.',
            'respuesta_2.required'    => 'La segunda respuesta es obligatoria.',
            'respuesta_2.min'         => 'La respuesta debe tener al menos 3 caracteres.',
        ];
    }
}
