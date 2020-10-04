<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;

class LoginController extends Controller{

    public function register(Request $request){
        if($request['nombre'] == '' or $request['email'] == '' or $request['password'] == ''){
            return response()->json(['register' => false, 'msg_error' => 'Debe ingresar todos los datos.']);
        }else if($request['password'] != $request['password_confirmation']){
            return response()->json(['register' => false, 'msg_error' => 'Las contraseñas no coinciden']);
        }
        $filaUser = User::where('email', $request['email'])->first();
        if(!$filaUser){
            $filaUser = User::create([
                'nombre' => $request['nombre'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]);
            Auth::loginUsingId($filaUser->id, true);
            
            return response()->json(['register' => true]);
        }else{
            return response()->json(['register' => false, 'msg_error' => 'El email ingresado ya esta registrado en nuestra base de datos']);
        }
    }

    public function login(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, true)) {
            return response()->json(['login' => true]);
        }else{
            return response()->json(['login' => false]);
        }
    }

    public function logout(){
        if(Auth::check()){
            Auth::logout();
            return response()->json(['logout' => true]);
        }else{
            return response()->json(['logout' => false]);
        }

    }

    public function checkLogin(){
        if(Auth::check()){
            return response()->json(['login' => true]);
        }else{
            return response()->json(['login' => false]);
        }
    }
}
