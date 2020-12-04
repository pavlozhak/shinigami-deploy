<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    public function index() {
        return view('login.index');
    }

    public function handler(Request $request) {
        if (!$request->isMethod('post')) {
            return back()->withErrors(['Wrong form method']);
        }

        $request->validate([
            'email' => 'required|bail',
            'password' => 'required|bail'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }
        else {
            return back()->withErrors(['Login failed']);
        }
    }
}
