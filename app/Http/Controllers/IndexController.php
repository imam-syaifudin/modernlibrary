<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //

    public function index(){

        $buku = Buku::where('hidden',0)->get();

        return view('index',compact('buku'));
    }
}
