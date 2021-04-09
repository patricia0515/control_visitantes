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
            't_visita' => 'required'


            /* 'imagen'   =>  'required|mimes:jpg,jpeg,bmp,png', */
        ];
    }
}
