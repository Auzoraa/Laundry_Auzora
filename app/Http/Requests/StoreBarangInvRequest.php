<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBarangInvRequest extends FormRequest
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
            'nama_barang'=> 'required',
            'merk_barang' => 'required',
            'qyt'=> 'required|numeric',
            'kondisi' => 'required',
            'tanggal_pengadaan' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nama_barang.required'=> 'Nama Barang belum diisi',
            'merk_barang.required' => 'Merk Barang Belum diisi',
            'qyt.required'=> 'Qty belum diisi',
            'qyt.numeric'=> 'Qty bukan angka',
            'kondisi.required' => 'Kondisi belum diisi',
            'tanggal_pengadaan.required' => 'Tanggal pengadaan belum diisi',
        ];
    }
}
