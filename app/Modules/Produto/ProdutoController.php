<?php

namespace App\Modules\Produto;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Produto\ProdutoService;
use App\Models\Produto;

class ProdutoController extends Controller{
    
    public function __construct(private ProdutoService $service){
        $this->service = $service;
    }

    public function salvarProduto(Request $request){
        $preco = str_replace(',', '.', $request->preco);
        $produto = $this->service->adicionarProduto($request->nome, $preco);
        
        if (!$request->wantsJson()) {
            return redirect()->route('cardapio.index')->with('mensagem', 'Produto adicionado com sucesso!');
        }
        return response()->json($produto);
    }

    public function deletarCliente(Produto $produto){
        $produto = $this->service->deletarProduto($produto);
        return response()->json(['Mensagem' => 'Produto Removido']);
    }

    public function alterarProduto(Produto $produto, Request $request){
        $produto = $this->service->alterarProduto($produto, $request->nome, $request->preco);
        if(!$produto === null){
            return response()->json(['Mensagem' => 'Cliente Não Encontrado'], 404);
        }
        return response()->json($produto);
    }
}