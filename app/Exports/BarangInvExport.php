<?php

namespace App\Exports;

use App\Models\BarangInv;
use Maatwebsite\Excel\Concerns\FromCollection;

class BarangInvExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return BarangInv::all();
    }
}
