<?php

namespace App\Http\Controllers;

use App\Models\BarangInv;
use Illuminate\Http\Request;
use App\Exports\BarangInvExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BarangInvImport;

class BarangInvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = BarangInv::all();
        return view('barang_inv.index', compact('data'), ['title' => 'Barang Inventaris']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function export() 
    {
        return Excel::download(new BarangInvExport, 'barang_inv.xlsx');
    }

    public function import_excel(Request $request) 
	{
		// validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_barangInv di dalam folder public
		$file->move('file_barangInv',$nama_file);
 
		// import data
        Excel::import(new BarangInvImport, public_path('/file_barangInv/'.$nama_file));
        
		// alihkan halaman kembali
		return redirect('/barangInv');
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = New barangInv;
        $data->nama_barang = $request->nama_barang;
        $data->merk_barang = $request->merk_barang;
        $data->qty = $request->qty;
        $data->kondisi = $request->kondisi;
        $data->tanggal_pengadaan = $request->tanggal_pengadaan;
        $data->save();

        return redirect('/barangInv')->with('barangInvInput', 'Member Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BarangInv  $barangInv
     * @return \Illuminate\Http\Response
     */
    public function show(BarangInv $barangInv)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BarangInv  $barangInv
     * @return \Illuminate\Http\Response
     */
    public function edit(BarangInv $barangInv)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BarangInv  $barangInv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BarangInv $barangInv)
    {
        $data = BarangInv::find($request->id);
        $data->nama_barang = $request->nama_barang;
        $data->merk_barang = $request->merk_barang;
        $data->qty = $request->qty;
        $data->kondisi = $request->kondisi;
        $data->tanggal_pengadaan = $request->tanggal_pengadaan;
        $data->save();

        return redirect('/barangInv')->with('barangInvUpdate', 'Barang Berhasil diubah');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BarangInv  $barangInv
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = BarangInv::find($id);
        $data->delete();
        return redirect('/barangInv')->with('barangInvDelete', 'Barang Berhasil dihapus'); 
    }
}
