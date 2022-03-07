<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DasarController extends Controller
{
    public function index()
    {
        return view('dasar.index',[ "title" => "Dasar" ]);
    }
}
