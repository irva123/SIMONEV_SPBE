<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAspekRequest extends FormRequest
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
            'nama_aspek' => 'required',
            'bobot_nilai' => 'required',
            'id_domain' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nama_aspek' => 'Nama harus diisi',
            'bobot_nilai' => 'harus diisi',
            'id_domain' => 'id domain harus diisi',
        ];
    
    }
}

