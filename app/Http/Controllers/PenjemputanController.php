<?php

namespace App\Http\Controllers;

use App\Models\Penjemputan;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Http\Requests\StorePenjemputanRequest;
use App\Http\Requests\UpdatePenjemputanRequest;
use App\Exports\PenjemputanExport;
use App\Imports\PenjemputanImport;
use Maatwebsite\Excel\Facades\Excel;

class PenjemputanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $member = Member::all();
        $penjemputan = Penjemputan::latest()
        ->join('member', 'penjemputan.id_member','=','member.id')
        ->select('penjemputan.*', 'member.nama', 'member.alamat', 'member.tlp')
        ->get();
        return view('penjemputan.index',compact('penjemputan', 'member'), ['title'=>'Penjemputan Barang']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePenjemputanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePenjemputanRequest $request)
    {
        $data = New Penjemputan;
        $data->id_member = $request->id_member;
        $data->petugas = $request->petugas;
        $data->status = $request->status;
        $data->save();

        return redirect('/penjemputan')->with('success', 'Data penjemputan Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penjemputan  $penjemputan
     * @return \Illuminate\Http\Response
     */
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
		$file->move('file_penjemputan',$nama_file);
 
		// import data
        Excel::import(new PenjemputanImport, public_path('/file_penjemputan/'.$nama_file));
        
		// alihkan halaman kembali
		return redirect('/penjemputan')->with('import', 'Import Berhasil');
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penjemputan  $penjemputan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penjemputan $penjemputan)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePenjemputanRequest  $request
     * @param  \App\Models\Penjemputan  $penjemputan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePenjemputanRequest $request, Penjemputan $penjemputan)
    {
        $data = Penjemputan::find($request->id);
        $data->id_member = $request->id_member;
        $data->petugas = $request->petugas;
        $data->status = $request->status;
        $data->save();

        return redirect('/penjemputan')->with('penjemputanUpdate', 'Data penjemputan Berhasil diubah');
    }
    
    public function export() 
    {
        return Excel::download(new PenjemputanExport, 'PenjemputanBarang.xlsx');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penjemputan  $penjemputan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Penjemputan::find($id);
        $data->delete();
        return redirect('/penjemputan')->with('penjemputanDelete', 'Data penjemputan Berhasil dihapus'); 
    }
}
