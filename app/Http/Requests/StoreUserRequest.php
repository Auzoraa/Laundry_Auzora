<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name'=> 'required',
            'email' => 'required|email',
            'id_outlet' => 'required|numeric',
            'role' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama belum diisi!', 
            'email.required' => 'Email paket belum diisi!',
            'email.email' => 'Email bukan email!',
            'id_outlet.required' => 'Id Outlet belum diisi',
            'id_outlet.numeric' => 'Id Outlet bukan angka',
            'role.required' => 'Role belum diisi',
        ];
    }
}
