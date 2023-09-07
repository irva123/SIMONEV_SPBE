<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateIndikatorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return [
            'nama_indikator' => 'required',
            'bobot_nilai' => 'required',
            'id_domain' => 'required',
            'id_aspek' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nama_indikator' => 'Nama harus diisi',
            'bobot_nilai' => 'Nilai bobot harus diisi',
            'id_domain' => 'id domain harus diisi',
            'id_aspek' => 'id aspek harus diisi',
        ];
    
    }
}
