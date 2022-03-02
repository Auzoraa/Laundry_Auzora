<?php

namespace App\Imports;

use App\Models\Outlet;
use Maatwebsite\Excel\Concerns\ToModel;

class OutletImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Outlet([
            'nama'     => $row[1],
            'alamat'    => $row[2],
            'tlp'    => $row[3],
        ]);
    }
}
