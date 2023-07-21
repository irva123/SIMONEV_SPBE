<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'username' => 'required',
            'password' => 'required',
            'nama_lengkap' => 'required',
            'nip' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'role' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'username' => 'username harus diisi',
            'password' => 'password harus diisi',
            'nama_lengkap' => 'nama harus diisi',
            'nip' => 'nip harus diisi',
            'email' => 'email harus diisi',
            'no_hp' => 'nomer harus diisi',
            'role' => 'role harus diisi',
            
        ];
    
    }
}