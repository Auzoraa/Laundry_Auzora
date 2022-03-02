<?php

namespace App\Imports;

use App\Models\Paket;
use Maatwebsite\Excel\Concerns\ToModel;

class PaketImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Paket([
            'id_outlet'     => $row[1],
            'jenis'    => $row[2],
            'nama_paket'    => $row[3],
            'harga'    => $row[4],
        ]);
    }
}
