<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class AuthController extends Controller
{
    public function register(Request $request){

        $request->validate([
            'username' => 'required|max:255',
            'email' => 'required|max:50|email|unique:users',
            'password' => 'required|min:3|confirmed'
        ]);

        $user = User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

    return redirect()->route('login');

    }


    public function login(Request $request){
        $feilds =  $request->validate([
            'email' => 'required|max:50|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($feilds)){
            return redirect()->route('home');
        }
        else{
            // dd('ok');
            return redirect()->route('login')->with(['failed' => 'your credentials do mot match our records']);
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
