<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // the method will show dashboard page for customer
    public function index(){
        $user = Auth::user();
        return view('dashboard', compact('user'));
    }
}
