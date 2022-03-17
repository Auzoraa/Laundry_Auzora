<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePenjemputanRequest extends FormRequest
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
            'id_member'=> 'required',
            'petugas' => 'required',
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'id_member.required'=> 'Nama Pelanggan belum dipilih!',
            'petugas.required'=> 'Nama Petugas belum diisi!',
            'status.required'=> 'Status belum diisi!',
        ];
    }
}
