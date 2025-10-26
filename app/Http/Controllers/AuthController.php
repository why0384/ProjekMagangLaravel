<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        $data = [
            "title"         => "Login",
        ];
        return view('auth/login', $data);
    }

    public function loginProses(Request $request){
        $request->validate([
            'email'     =>'required',
            'password'  =>'required',
        ],[
            'email.required'    => 'Email tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
        ]);

        $data = array(
            'email'     =>$request -> email,
            'password'     =>$request -> password,
        );

        if (Auth::attempt($data)){
            return redirect()->route('dashboard');
        } else {
            return redirect()->back();
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
