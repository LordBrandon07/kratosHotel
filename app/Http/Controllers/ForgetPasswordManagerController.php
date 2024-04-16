<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;




class ForgetPasswordManagerController extends Controller
{
    function forgetPassword (){
        return view ("forget-password");
    }

    function forgetPasswordPost (Request $request){
        $request-> validate([
            "email"=> "required|email|exists:users",
        ]);

        $token = Str::random(length:64);
    

        DB::table('password_resets')->insert([
            'email'=> $request->email,
            'token'=> $token,
            'created_at'=> Carbon::now()
        ]);

        return view ("new-password", compact ('token'));
    }
    
   
    function resetPassword($token){
        return view ("new-password", compact ('token'));
    }


    function resetPasswordPost(Request $request){
        $request->validate([
            "email"=>"required|email|exists:users",
            "password"=>"required|string|min:8|regex:/^(?=.*[A-Z])(?=.*\d).+$/|confirmed",
            "password_confirmation" =>"required"
        ]);


        $updatePassword = DB::table ('password_resets')->where([
            "email"=>$request->email,
            "token"=>$request->token
        ])->first();


        if (!$updatePassword){
            return redirect()->to(route("reset.password"))->with("error","invalid");
        }
    

        User::where("email",$request->email)->update(["password"=> Hash::make($request->password)]);

        DB::table("password_resets")->where(["email"=>$request->email])->delete();

        return redirect()->to (route("login"))->with("success","restablecimiento de contraseña exitoso"); 
}

}