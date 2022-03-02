<?php

namespace App\Imports;

use App\Models\BarangInv;
use Maatwebsite\Excel\Concerns\ToModel;

class BarangInvImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new BarangInv([
            'nama_barang'     => $row[1],
            'merk_barang'    => $row[2],
            'qty'    => $row[3],
            'kondisi'    => $row[4],
            'tanggal_pengadaan'    => $row[5],
        ]);
    }
}
