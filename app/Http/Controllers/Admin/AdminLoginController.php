<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email'            => 'required|email',
            'password'         => 'required',
            'default_password' => 'required',
        ]);

        // Verifica se a senha do sistema bate com o .env
        if ($request->default_password !== env('SYSTEM_PASSWORD')) {
            return back()->withErrors([
                'default_password' => 'Senha do sistema inválida.',
            ]);
        }

        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return back()->withErrors([
                'email' => 'Credenciais inválidas.',
            ]);
        }

        // Verifica se é mesmo um admin
        if (Auth::user()->role !== 'admin') {
            Auth::logout();
            return redirect('/admin/login')->withErrors([
                'email' => 'Apenas administradores podem entrar aqui.',
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended('/admin/dashboard');
    }
}
