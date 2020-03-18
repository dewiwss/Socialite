<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function UserLogout(){
        Auth::logout();
        return redirect('login');
    }
}
