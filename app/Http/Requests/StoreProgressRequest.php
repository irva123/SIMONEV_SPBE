<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProgressRequest extends FormRequest
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
            'nama_progress' => 'Nama harus diisi',
            'mulai' => 'Tanggal Mulai harus diisi',
            'selesai' => 'Tanggal Selesai harus diisi',
            
        ];
    
    }
}
