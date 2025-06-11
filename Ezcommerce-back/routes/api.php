<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\ProdutoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/realizar-pedido', [PedidoController::class, 'realizarPedido']);
Route::post('/pedidos/{id}/confirmar', [PedidoController::class, 'confirmarCompra']);
Route::get('/pedido/{id}', [PedidoController::class, 'verPedido']);
Route::get('/pedidos/usuario/{id}', [PedidoController::class, 'produtosComprados']);
// routes/api.php
Route::post('/registrar', [UsuarioController::class, 'registrar']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/produtos', [ProdutoController::class, 'index']);
Route::get('/produtos/categoria/{categoria}', [ProdutoController::class, 'porCategoria']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/usuario', [AuthController::class, 'usuario']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
Route::middleware('auth:sanctum')->get('/verificar-token', [TokenController::class, 'verificar']);
