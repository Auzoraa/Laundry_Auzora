<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaketRequest extends FormRequest
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
            'jenis'=> 'required',
            'nama_paket' => 'required',
            'harga' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
        'jenis.required' => 'Data jenis belum dipilih', 
        'nama_paket.required' => 'Nama paket belum diisi',
        'harga.required' => 'Harga belum diisi',
        'harga.numeric' => 'Harga bukan angka',
        ];
    }
}
