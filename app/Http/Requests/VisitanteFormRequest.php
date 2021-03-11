<?php

namespace control_visitantes\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VisitanteFormRequest extends FormRequest
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
            'documento' => 'required|max:20',
            'empresa' => 'required|max:50',
            'nombre' => 'required|max:50',
            'apellido' => 'required|max:50',
            'contacto' => 'required|max:20',
            'rh' => 'required',
            'eps' => 'required',
            't_visita' => 'required',
            


            'direccion' => 'required|max:50',
            'barrio' => 'required|max:50',

            'email' => 'required|max:50',
            'nombre_acudiente' => 'required|max:50',
            'apellidos_acudiente' => 'required|max:50',
            'tel_acudiente' => 'required|max:15',
            'email_acudiente' => 'required|max:50',
            'parentesco_acu' => 'required|max:50',
            'funcionario' => 'required',
            'categoria' => 'required',
            'foto' => 'mimes:jpeg,bmp,png'
        ];
    }
}
