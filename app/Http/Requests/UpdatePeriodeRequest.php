<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePeriodeRequest extends FormRequest
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
            'tahun' => 'required',
            'mulai' => 'required',
            'selesai' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'tahun' => 'ID harus diisi',
            'mulai' => 'ID Category harus diisi',
            'selesai' => 'Nama harus diisi',
            
        ];
    
    }
}
