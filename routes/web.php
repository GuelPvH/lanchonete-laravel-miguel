<?php

use App\Modules\Produto\ProdutoController;
use App\Modules\Cliente\ClienteController;
use App\Modules\Pedido\PedidoController;
use Illuminate\Support\Facades\Route;

/*
Route::get('/', function () {
    return view('')->name('');
});

Route::post('', function () {
    return view('')->name('');
});

Route::put('', function () {
    return view('')->name('');
});

Route::delete('', function () {
    return view('')->name('');
});
*/

// ROTAS PEDIDOS

Route::post('/pedidos', [PedidoController::class, 'salvarPedido'])->name('');
Route::delete('/pedidos/{pedido}', [PedidoController::class, 'deletarPedido'])->name('');
Route::put('/pedidos/{pedido}', [PedidoController::class, 'alterarPedido'])->name('');
Route::get('/pedidos/{id}/total', [PedidoController::class, 'calcularTotal'])->name('');


// ROTAS PRODUTOS

Route::post('/produtos', [PedidoController::class, 'salvarProduto'])->name('');
Route::delete('/produtos/{produto}', [PedidoController::class, 'deletarProduto'])->name('');
Route::put('/produtos/{produto}', [PedidoController::class, 'alterarProduto'])->name('');

// ROTAS CLIENTE

Route::post('/clientes', [PedidoController::class, 'salvarProduto'])->name('');
Route::delete('/clientes/{cliente}', [PedidoController::class, 'deletarProduto'])->name('');
Route::put('/clientes/{cliente}', [PedidoController::class, 'alterarProduto'])->name('');