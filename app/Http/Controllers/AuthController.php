<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function doLogin(LoginRequest $request) : RedirectResponse | View {
        $credentials = $request->validated();
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('home'));
        };
        return to_route('auth.login')->withErrors([
            'email' => 'Identifiants incorrects'
        ])->onlyInput('email');
    }

    public function logout() : RedirectResponse | View {
        Auth::logout();
        return to_route('auth.login');
    }
}
