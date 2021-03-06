<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoginRequest;
use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function authenticate(StoreLoginRequest $request)
    {
            $credentials = $request->validate([
                'name' => 'required',
                'password' => 'required'
            ]);
    
            if(Auth::attempt($credentials)){
                $request->session()->regenerate();
                if(Auth::user()->role == 'admin'){
                    return redirect()->route('home');
                }elseif(Auth::user()->role == 'kasir'){
                    return redirect()->route('home');
                }elseif(Auth::user()->role == 'owner'){
                    return redirect()->route('home');
                }
                return redirect()->intended('home')->with('loginBerhasil', 'Login Berhasil');
            }
    
            return back()->with('loginError', 'Login gagal');
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function show(Login $login)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function edit(Login $login)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Login $login)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function destroy(Login $login)
    {
        //
    }
}
