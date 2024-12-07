<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AuthController extends Controller
{
    public function signIn(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Verifica no banco de dados
        $userExists = DB::table('users')
            ->where('email', $validated['email'])
            ->where('password', $validated['password']) // Evite salvar senhas em texto puro!
            ->exists();

        if ($userExists) {
            return response()->json(['status' => 'success', 'message' => 'Usuário encontrado!']);
        }

        return response()->json(['status' => 'error', 'message' => 'Usuário não encontrado.'], 404);

    }
}
