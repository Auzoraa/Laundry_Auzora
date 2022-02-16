<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Outlet;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paket = Paket::all();
        $outlet = Outlet::all();
        return view('paket.index', compact('paket', 'outlet'), [ "title" => "Paket" ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = New Paket;
        // $data->id = $request->id;
        $data->id_outlet = $request->id_outlet;
        $data->jenis = $request->jenis;
        $data->nama_paket = $request->nama_paket;
        $data->harga = $request->harga;
        $data->save();

        return redirect('/paket')->with('paketInput', 'Paket Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paket  $Paket
     * @return \Illuminate\Http\Response
     */
    public function show(Paket $Paket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paket  $Paket
     * @return \Illuminate\Http\Response
     */
    public function edit(Paket $Paket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paket  $Paket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paket $Paket)
    {
        $data = Paket::find($request->id);
        $data->id_outlet = $request->id_outlet;
        $data->jenis = $request->jenis;
        $data->nama_paket = $request->nama_paket;
        $data->harga = $request->harga;
        $data->save();

        return redirect('/paket')->with('paketUpdate', 'Paket Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paket  $Paket
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Paket::find($id);
        $data->delete();
        return redirect('/paket')->with('paketDelete', 'Paket Berhasil dihapus'); 
    }
}
