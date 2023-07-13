<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProgressRequest extends FormRequest
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
            'nama_progress' => 'required',
            'mulai' => 'required',
            'selesai' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nama_progress' => 'ID harus diisi',
            'mulai' => 'ID Category harus diisi',
            'selesai' => 'Nama harus diisi',
            
        ];
    
    }
}
