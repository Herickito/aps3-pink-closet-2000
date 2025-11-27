<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return back()
                ->withInput()
                ->with('error', 'Credenciais inválidas.');
        }

        // salva info mínima na sessão
        session([
            'user_id'   => $user->id,
            'user_name' => $user->name,
        ]);

        return redirect()->route('produtos.index')
            ->with('success', 'Login realizado com sucesso!');
    }

    public function logout()
    {
        session()->flush();

        return redirect()->route('login.form')
            ->with('success', 'Logout realizado com sucesso.');
    }
}
