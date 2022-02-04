<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Outlet::all();
        return view('outlet.index', compact('data'));
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
        $data = New Outlet;
        // $data->id = $request->id;
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->tlp = $request->tlp;
        $data->save();

        return redirect('/outlet')->with('outletInput', 'Outlet Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Outlet  $Outlet
     * @return \Illuminate\Http\Response
     */
    public function show(Outlet $Outlet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Outlet  $Outlet
     * @return \Illuminate\Http\Response
     */
    public function edit(Outlet $Outlet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Outlet  $Outlet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Outlet $Outlet)
    {
        $data = Outlet::find($request->id);
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->tlp = $request->tlp;
        $data->save();

        return redirect('/outlet')->with('outletUpdate', 'Outlet Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Outlet  $Outlet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Outlet::find($id);
        $data->delete();
        return redirect('/outlet')->with('outletDelete', 'Outlet Berhasil dihapus'); 
    }
}
