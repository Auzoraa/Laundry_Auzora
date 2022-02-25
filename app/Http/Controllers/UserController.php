<?php

namespace App\Http\Controllers;

use app\Models\Member;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = Member::all();
        return view('registrasi.index',compact('data'), [ "title" => "User Management" ]);
    }

    public function store(Request $request)
    {
        $data = New Member;
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->tlp = $request->tlp;
        $data->save();

        return redirect('/registrasi')->with('registrasiInput', 'Member Berhasil ditambahkan');
    }

    public function edit(Request $request, Member $Member)
    {
        $data = Member::find($request->id);
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->tlp = $request->tlp;
        $data->save();

        return redirect('/registrasi')->with('registrasiUpdte', 'Member Berhasil diubah');
    }

    public function destroy( $id)
    {
        $data = Member::find($id);
        $data->delete();
        return redirect('/registrasi')->with('registrasiDelete', 'Member Berhasil dihapus'); 
    }
}
