<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Paket;
use Illuminate\Http\Request;
use PDF;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $data['member'] = Member::get();
        $data['paket'] = Paket::get();

        return view('laporan.index', $data, ["title" => "Laporan"]);
    }

    // public function getData($awal, $akhir)
    // {
    //     $no = 1;
    //     $data = array();

    //     while (strtotime($awal) <= strtotime($akhir)) {
    //         $tanggal = $awal;
    //         $awal = date('Y-m-d', strtotime("+1 day", strtotime($awal)));

    //         $row = array();
    //         $row['DT_RowIndex'] = $no++;
    //         $row['tanggal'] = date($tanggal, false);
    //         $row['penjualan'] = format_number($total_penjualan);
    //         $row['pembelian'] = format_number($total_pembelian);
    //         $row['pengeluaran'] = format_number($total_pengeluaran);
    //         $row['pendapatan'] = format_number($pendapatan);

    //         $data[] = $row;
    //     }

    //     $data[] = [
    //         'DT_RowIndex' => '',
    //         'tanggal' => '',
    //         'penjualan' => '',
    //         'pembelian' => '',
    //         'pengeluaran' => 'Total Pendapatan',
    //         'pendapatan' => format_number($total_pendapatan),
    //     ];

    //     return $data;
    // }

    // public function data($awal, $akhir)
    // {
    //     $data = $this->getData($awal, $akhir);

    //     return datatables()
    //         ->of($data)
    //         ->make(true);
    // }

    // public function exportPDF($awal, $akhir)
    // {
    //     $data = $this->getData($awal, $akhir);
    //     $pdf  = PDF::loadView('laporan.pdf', compact('awal', 'akhir', 'data'));
    //     $pdf->setPaper('a4', 'potrait');
        
    //     return $pdf->stream('Laporan-pendapatan-'. date('Y-m-d-his') .'.pdf');
    // }
}
