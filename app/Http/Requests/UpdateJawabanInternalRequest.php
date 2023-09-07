<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class UpdateJawabanInternalRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id_periode' => 'required|String',
            'id_indikator' => 'required|String',
            'level_terpilih_internal' => 'required|numeric',
            'level_terpilih_eksternal' => 'numeric',
            'uraian_kriteria1' => 'required|String',
            'uraian_kriteria2' => 'required|String',
            'uraian_kriteria3' => 'required|String',
            'uraian_kriteria4' => 'required|String',
            'uraian_kriteria5' => 'required|String',
            'id_user_internal' => 'required|String',
            'id_user_eksternal' => 'String',
            'uraian_eksternal' => 'String',
        ];
    }
}
