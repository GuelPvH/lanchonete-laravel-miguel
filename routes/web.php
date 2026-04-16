<?php

use App\Modules\Produto\ProdutoController;
use App\Modules\Cliente\ClienteController;
use App\Modules\Pedido\PedidoController;
use Illuminate\Support\Facades\Route;

// ROTAS DE VIEWS
Route::get('/', function () {
    return view('cardapio', ['produtos' => \App\Models\Produto::all()]);
})->name('cardapio.index');

Route::get('/produto/{id}', function ($id) {
    return view('produto', ['produto' => \App\Models\Produto::find($id)]);
})->name('produto.show');

Route::get('/pedido', function () {
    return view('pedido');
})->name('pedido.ver');

Route::get('/cliente', function () {
    return view('cliente');
})->name('cliente.index');

Route::get('/perfil', function () {
    return view('perfil');
})->name('perfil.index');

// ROTAS PEDIDOS

Route::post('/pedidos', [PedidoController::class, 'salvarPedido'])->name('pedido.salvar');
Route::delete('/pedidos/{pedido}', [PedidoController::class, 'deletarPedido'])->name('pedido.deletar');
Route::put('/pedidos/{pedido}', [PedidoController::class, 'alterarPedido'])->name('pedido.alterar');
Route::get('/pedidos/{id}/total', [PedidoController::class, 'calcularTotal'])->name('pedido.total');
Route::post('/pedidos/adicionar', [PedidoController::class, 'salvarItemPedido'])->name('pedido.adicionar');
Route::post('/pedidos/finalizar', [PedidoController::class, 'salvarPedido'])->name('pedido.finalizar');

// ROTAS PRODUTOS

Route::post('/produtos', [ProdutoController::class, 'salvarProduto'])->name('produto.salvar');
Route::delete('/produtos/{produto}', [ProdutoController::class, 'deletarProduto'])->name('produto.deletar');
Route::put('/produtos/{produto}', [ProdutoController::class, 'alterarProduto'])->name('produto.alterar');

// ROTAS CLIENTE

Route::post('/clientes', [ClienteController::class, 'salvarCliente'])->name('cliente.entrar');
Route::delete('/clientes/{cliente}', [ClienteController::class, 'deletarCliente'])->name('cliente.deletar');
Route::put('/clientes/{cliente}', [ClienteController::class, 'alterarCliente'])->name('cliente.alterar');