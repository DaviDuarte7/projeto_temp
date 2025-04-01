<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Exemplo de exibir o formulário de login
    }

    public function login(Request $request)
    {
        // Validação básica de login
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // Tentativa de login
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->intended('/');
        }

        throw ValidationException::withMessages([
            'email' => ['As credenciais fornecidas estão incorretas.'],
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}