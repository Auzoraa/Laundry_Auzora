<?php

namespace App\Imports;

use App\Models\BarangInv;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BarangInvImport implements ToModel, WithHeadingRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new BarangInv([
            'nama_barang'     => $row['nama_barang'],
            'merk_barang'    => $row['merk_barang'],
            'qty'    => $row['qty'],
            'kondisi'    => $row['kondisi'],
            'tanggal_pengadaan'  => Date::excelToDateTimeObject($row['tanggal_pengadaan'])
            ]);
    }

    public function headingRow(): int
    {
        return 3;
    }
}
