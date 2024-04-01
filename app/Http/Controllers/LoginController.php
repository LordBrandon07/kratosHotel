<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(){
        
        return view('auth.login');
    }

    public function store(Request $request){
        $this->validate($request, [
            'documento'=>'required',
            'password'=>'required'  
        ]);

        if(!auth()->attempt($request->only('documento', 'password'))){
            return back()->with('mensaje', 'Credenciales incorrectas');
        }
        return view('home');
    }
}
