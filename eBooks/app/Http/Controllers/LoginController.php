<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    // This method will show login page for customer
    public function index(){
        return view('login');
    }
}
