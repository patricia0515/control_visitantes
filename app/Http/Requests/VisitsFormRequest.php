<?php

namespace control_visitantes\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VisitsFormRequest extends FormRequest
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
        // return [
        //     'reg_pertenencias' => 'required|max:20',
        //     'descripcion' => 'required|max:50',
        //     'serial' => 'required|max:50',
        //     'motivo' => 'required|max:50',
        //     'sede' => 'required|max:20',
        //     't_visitante' => 'required',
        //     'visit' => 'required',
        //     'resp_visita' => 'required',
        //     'reg_vehicle' => 'required',
        //     'vehicle' => 'required',
        //     'files' => 'required',
        // ];
    }
}
