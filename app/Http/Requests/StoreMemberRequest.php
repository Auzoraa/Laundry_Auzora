<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMemberRequest extends FormRequest
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
            'nama'=> 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'tlp'=> 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'nama.required'=> 'Nama Belum diisi',
            'alamat.required' => 'Alamat belum diisi',
            'jenis_kelamin.required' => 'Jenis kelamin belum diisi',
            'tlp.required'=> 'Nomor telepon belum diisi',
            'tlp.numeric'=> 'Nomor telepon bukan angka',
        ];
    }
}
