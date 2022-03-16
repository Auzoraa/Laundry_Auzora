<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use app\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('user.index',compact('data'), [ "title" => "User Management" ]);
    }

    public function store(StoreUserRequest $request)
    { 
        $validatedData = $request->validate([
            'name'=> 'required|max:16',
            'email' => 'required|max:255',
            'id_outlet' => 'required|max:255',
            'role' => 'required',
            'password' => 'required|max:255',
        ]);
        
        $validatedData['password']=Hash::make($validatedData['password']);

        User::create($validatedData);
        // $request->session()->flash('success', 'Registrasi berhasil!');
        return redirect('/user')->with('success', 'User berhasil ditambahkan!');
    }

    public function edit(Request $request, User $User)
    {
        $data = User::find($request->id);
        $validatedData = $request->validate([
            'name'=> 'required|max:16',
            'email' => 'required|max:255',
            'id_outlet' => 'required|max:255',
            'role' => 'required',
            'password' => 'required|max:255',
        ]);
        $validatedData['password']=Hash::make($validatedData['password']);

        User::update($validatedData);

        return redirect('/user')->with('success', 'User Berhasil diubah');
    }

    public function destroy( $id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect('/user')->with('success', 'User Berhasil dihapus'); 
    }
}
