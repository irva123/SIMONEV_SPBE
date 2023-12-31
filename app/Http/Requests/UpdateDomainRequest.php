<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDomainRequest extends FormRequest
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
            'nama_domain' => 'required',
            'bobot_nilai' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nama_domain' => 'Nama harus diisi',
            'bobot_nilai' => 'harus diisi',
        ];
    
    }
}
