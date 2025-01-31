<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PedidoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pedidos/usuario2', [PedidoController::class, 'pedidosUsuario2']);
Route::get('/pedidos/con-usuarios', [PedidoController::class, 'pedidosConUsuarios']);
Route::get('/pedidos/en-rango', [PedidoController::class, 'pedidosEnRango']);
Route::get('/usuarios/nombres-r', [PedidoController::class, 'usuariosConR']);
Route::get('/pedidos/total-usuario5', [PedidoController::class, 'totalPedidosUsuario5']);
Route::get('/pedidos/ordenados', [PedidoController::class, 'pedidosOrdenados']);
Route::get('/pedidos/suma-total', [PedidoController::class, 'sumaTotalPedidos']);
Route::get('/pedidos/mas-barato', [PedidoController::class, 'pedidoMasBarato']);
Route::get('/pedidos/agrupados', [PedidoController::class, 'pedidosAgrupadosPorUsuario']);
