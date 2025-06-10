<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
   public function registrar(Request $request)
{
    $dados = $request->validate([
        'nome' => 'required|string',
        'email' => 'required|email|unique:usuarios,email',
        'senha' => 'required|min:6',
        'telefone' => 'required|string',
        'cep' => 'required|string',
        'endereco' => 'required|string',
        'bairro' => 'required|string',
        'cidade' => 'required|string',
        'estado' => 'required|string',
    ]);

    $usuario = Usuario::create([
        'nome' => $dados['nome'],
        'email' => $dados['email'],
        'senha' => Hash::make($dados['senha']),
        'telefone' => $dados['telefone'],
        'cep' => $dados['cep'],
        'endereco' => $dados['endereco'],
        'bairro' => $dados['bairro'],
        'cidade' => $dados['cidade'],
        'estado' => $dados['estado'],
    ]);

    return response()->json([
        'mensagem' => 'Usuário criado com sucesso!',
        'usuario' => $usuario
    ], 201);
}
}
