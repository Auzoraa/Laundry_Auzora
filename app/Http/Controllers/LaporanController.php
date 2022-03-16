<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    // public function index(Request $request)
    // {
    //     $tanggalAwal = date('Y-m-d', mktime(0, 0, 0, date('m'), 1, date('Y')));
    //     $tanggalAkhir = date('Y-m-d');

    //     if ($request->has('tanggal_awal') && $request->tanggal_awal != "" && $request->has('tanggal_akhir') && $request->tanggal_akhir) {
    //         $tanggalAwal = $request->tanggal_awal;
    //         $tanggalAkhir = $request->tanggal_akhir;
    //     }

    //     return view('laporan.index', compact('tanggalAwal', 'tanggalAkhir'), [ "title" => "Laporan" ]);
    // }

    // public function getData($awal, $akhir)
    // {
    //     $no = 1;
    //     $data = array();

    //     while (strtotime($awal) <= strtotime($akhir)) {
    //         $tanggal = $awal;
    //         $awal = date('Y-m-d', strtotime("+1 day", strtotime($awal)));

    //         $nama_paket = Paket::where('created_at', 'LIKE', "%$tanggal%");
    //         $harga = Paket::where('created_at', 'LIKE', "%$tanggal%");
    //         // $total_pengeluaran = Pengeluaran::where('created_at', 'LIKE', "%$tanggal%")->sum('nominal');

    //         // $pendapatan = $total_penjualan - $total_pembelian - $total_pengeluaran;
    //         // $total_pendapatan += $pendapatan;

    //         $row = array();
    //         $row['DT_RowIndex'] = $no++;
    //         $row['created_at'] = date($tanggal, false);
    //         $row['nama_paket'] = ($nama_paket);
    //         $row['harga'] = ($harga);

    //         $data[] = $row;
    //     }

    //     $data[] = [
    //         'DT_RowIndex' => '',
    //         'created_at' => '',
    //         'nama_paket' => '',
    //         'harga' => '',
    //         // 'pengeluaran' => 'Total Pendapatan',
    //         // 'pendapatan' => number_format($total_pendapatan),
    //     ];

    //     return $data;
    // }

    // public function data($awal, $akhir)
    // {
    //     $data = $this->getData($awal, $akhir);
    //     return DataTables()
    //         ->of($data)
    //         ->make(true);
    // }

    // public function exportPDF($data, $sta)
    // {
    //     $data = $this->index($start_date, $end_date);
    //     $pdf  = PDF::loadView('laporan.pdf', compact('start_date', 'end_date', 'data'));
    //     $pdf->setPaper('a4', 'potrait');
        
    //     return $pdf->stream('Laporan-'. date('Y-m-d-his') .'.pdf');
    // }

    public function cetak_pdf(Request $r)
    {
    	$laporan = Transaksi::whereBetween('tgl', [$r->start_date,$r->end_date]);
 
    	$pdf = PDF::loadview('laporan.laporan_pdf',['laporan'=>$laporan]);
    	return $pdf->download('laporan-pdf');
    }

    public function index(Request $request)
    {
        if (request()->start_date || request()->end_date) {
        $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
        $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
        $data = Transaksi::whereBetween('transaksi.created_at',[$start_date,$end_date])
        ->join('member', 'transaksi.id_member','=','member.id')
        ->select('transaksi.*','member.nama')
        ->get();
        $total = Transaksi::whereBetween('transaksi.created_at',[$start_date,$end_date])
        ->get()
        ->sum('total');
        
    } else {
        $data = Transaksi::latest()
        ->join('member', 'transaksi.id_member','=','member.id')
        ->select('transaksi.*', 'member.nama')
        ->get();
        $total = DB::table('transaksi')
        ->get()
        ->sum('total');
    }
    
    return view('laporan.index', compact('data', 'total'), ["title" => "Laporan"]);
    
    }
    
}
