<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $dados = $request->validate([
            'email' => 'required|email',
            'senha' => 'required',
        ]);

        $usuario = Usuario::where('email', $dados['email'])->first();

        if (!$usuario || !Hash::check($dados['senha'], $usuario->senha)) {
            return response()->json(['erro' => 'Credenciais inválidas'], 401);
        }

        $token = $usuario->createToken('token-api')->plainTextToken;

        return response()->json([
            'mensagem' => 'Login realizado com sucesso!',
            'token' => $token,
            'usuario' => $usuario
        ]);
    }

    public function usuario(Request $request)
    {
        return response()->json($request->user());
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['mensagem' => 'Logout realizado com sucesso.']);
    }
}
