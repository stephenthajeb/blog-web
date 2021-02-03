<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $req)
    {
        $this->validate($req, [
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        $credentials = $req->only('email', 'password');
        if (!auth()->attempt($credentials)) {
            return back()->withErrors(
                'error',
                'The provided credentials do not match our records.'
            );
        }
        $req->session()->regenerate();
        return redirect(route('home'));
    }
}
