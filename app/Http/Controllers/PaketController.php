<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaketRequest;
use App\Models\Paket;
use App\Models\Outlet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exports\PaketExport;
use App\Imports\PaketImport;
use Maatwebsite\Excel\Facades\Excel;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outlet = Outlet::all();
        $paket = Paket::all();
        return view('paket.index', compact('paket', 'outlet'), [ "title" => "Paket" ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function export() 
    {
        return Excel::download(new PaketExport, 'paket.xlsx');
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
 
		// upload ke folder file_paket di dalam folder public
		$file->move('file_paket',$nama_file);
 
		// import data
        Excel::import(new PaketImport, public_path('/file_paket/'.$nama_file));
        
		// alihkan halaman kembali
		return redirect('/paket')->with('import', 'Import Berhasil');
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaketRequest $request)
    {
        $data = New Paket;
        $data->id_outlet = $request->id_outlet;
        $data->jenis = $request->jenis;
        $data->nama_paket = $request->nama_paket;
        $data->harga = $request->harga;
        $data->save();

        return redirect('/paket')->with('success', 'Input data Paket Berhasil ditambahkan');
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
