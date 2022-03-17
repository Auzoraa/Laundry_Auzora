<?php

namespace App\Imports;

use App\Models\Penjemputan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PenjemputanImport implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new Penjemputan([
            'id_member'     => $row['id_member'],
            'petugas'    => $row['petugas'],
            'status'    => $row['status'], 
        ]);
    }

    public function headingRow(): int
    {
        return 3;
    }
}
