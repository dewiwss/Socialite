<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchJurnalController extends Controller
{
    public function index(){
        return view('jurnal.jurnal');
    }
}
