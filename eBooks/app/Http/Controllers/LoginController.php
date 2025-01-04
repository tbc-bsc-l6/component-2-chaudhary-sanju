<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    // This method will show login page for customer
    public function index(){
        return view('login');
    }

    // This method will authenticate user
    public function authenticate(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->passes()){
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                return redirect()->route('account.dashboard');

            }
            else{
                return redirect()-> route('account.login') -> with('error','Either email or password doesnot match.');
            }



        }
        else{
            return redirect()->route('account.login')
            ->withInput()
            ->withErrors($validator);
        }
    }

    // This method will show register page for customer
    public function register(Request $request){
        return view('register');
    }

    public function processRegister(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        if($validator->passes()){

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = 'customer';
            $user->save();

            return redirect()-> route('account.login') -> with('success', 'Account Register Successful.');
        }
        else{
            return redirect()->route('account.register')
            ->withInput()
            ->withErrors($validator);
        }

    }

    public function logout(){
        Auth::logout();
        return redirect()->route('account.login');
    }
}
