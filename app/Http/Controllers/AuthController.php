<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        // hanya mengambil variable name email dan password
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('posts');
        } else {
            return redirect('login')->with('error_message', 'error email or pass');
        }
    }

    // fitur logout
    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }

    public function register_form()
    {
        return view('auth.register');
    }

    // membuat users baru di register
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            // membuat email yg unik agar tidak ada yang sama di table users
            'email'    => 'required|unique:users',
            // membuat pw dan konfir pw
            'password' => 'required|min:6|confirmed',
        ]);
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            // menggeneret password ke password end-kirpsi mengguanakn Hass::make
            'password' => Hash::make($request->input('password')),

        ]);
        return redirect('login');
    }
}
