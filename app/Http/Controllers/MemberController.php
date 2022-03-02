<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\MemberExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\MemberImport;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Member::all();
        return view('member.index', compact('data'), [ "title" => "Member" ]);
    }

    public function export() 
    {
        return Excel::download(new MemberExport, 'member.xlsx');
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
 
		// upload ke folder file_member di dalam folder public
		$file->move('file_member',$nama_file);
 
		// import data
        Excel::import(new MemberImport, public_path('/file_member/'.$nama_file));
        
		// alihkan halaman kembali
		return redirect('/member')->with('import', 'Import Berhasil');
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
        $data = New Member;
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->tlp = $request->tlp;
        $data->save();

        return redirect('/member')->with('memberInput', 'Member Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $Member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $id)
    {
        $data = Member::find($id);
        return view('member.index', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $Member
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $Member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $Member)
    {
        $data = Member::find($request->id);
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->tlp = $request->tlp;
        $data->save();

        return redirect('/member')->with('memberUpdate', 'Member Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $Member
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $data = Member::find($id);
        $data->delete();
        return redirect('/member')->with('memberDelete', 'Member Berhasil dihapus'); 
    }

}
