<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransaksi;
use App\Models\DetailTransaksi;
use App\Models\Transaksi;
use App\Models\Member;
use App\Models\Paket;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['member'] = Member::get();
        $data['paket'] = Paket::get();
        // $data['paket'] = Paket::where('id_outlet', auth()->user()->id_outlet)->get();
        return view('transaksi.index', $data, [ "title" => "Transaksi" ]);
    }

    private function generateKodeInvoice(){
        $last = Transaksi::orderBy('id', 'desc')->first();
        $last = ($last == null?1:$last->id + 1);
        $kode = sprintf('TKI'.date('Ymd').'%06d', $last);
        
        return $kode;
    } 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransaksi $request)
    {
        $request['id_outlet'] = auth()->user()->id_outlet;
        $request['kode_invoice'] = $this->generateKodeInvoice();
        $request['tgl_bayar'] = ($request->bayar == 0?NULL:date('Y-m-d H:i:s'));
        $request['status'] = 'baru';
        // $request['total'] = $request->total;
        $request['dibayar'] = ($request->bayar == 0?'belum_dibayar':'dibayar');
        $request['id_user'] = auth()->user()->id;

        //input transaksi
        $input_transaksi = Transaksi::create($request->all());
        if($input_transaksi == null){
            return back()->withErrors([
                'transaksi' => 'Input transaksi gagal!',
                ]);
        }

        //input detail pembelian
        foreach($request->id_paket as $item =>$v){
            $input_detail = DetailTransaksi::create([
                'id_transaksi' => $input_transaksi->id,
                'id_paket' => $request->id_paket[$item],
                'qty' => $request->qty[$item],
                'keterangan' => ''
            ]);
        }
        return redirect()->back()->with('transSuccess', 'Transaksi berhasil dilakukan!!');
    }

    public function notaKecil()
    {
        $transaksi = Transaksi::find(session('id)'));
        
        $detail = Transaksi::with('id_outlet')
            ->where('id)', session('id)'))
            ->get();
        
        return view('transaksi.nota_kecil', compact('transaksi', 'detail'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
