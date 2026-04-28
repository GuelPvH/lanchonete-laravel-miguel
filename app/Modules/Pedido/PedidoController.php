<?php

namespace App\Modules\Pedido;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Pedido\PedidoService;
use App\Models\Pedido;
use App\Models\ItemPedido;
use Illuminate\Http\JsonResponse;

class PedidoController extends Controller{
    
    public function __construct(private PedidoService $service){}

    public function salvarPedido(Request $request) : JsonResponse{
        $pedido = $this->service->adicionarPedido($request->cliente_id);
        return response()->json($pedido);
    }

    public function deletarPedido(int $id){
        $this->service->deletarItemsPedidoDePedido($id);
        $this->service->deletarPedido($id);
        $this->destroiSessaoCarrinho();
        return redirect()->route('cardapio.index');
    }

    public function destroiSessaoCarrinho(){
        session()->forget('carrinho');
        session()->forget('carrinhoCount');
    }

    public function alterarPedido(Request $request, Pedido $pedido) : ?JsonResponse{
        $pedido = $this->service->alterarPedido($pedido, $request->cliente_id);

        if($pedido === null){
            return response()->json(['Mensagem' => 'Cliente Não Encontrado'], 404);
        }

        return response()->json($pedido);
    }
    
    public function calcularTotal(Request $request){
        dd($request->all());
        $id = $request->id;
        $pedido = Pedido::find($id);
        $total = $this->service->calcularValorTotal($id);
        return view('pedido.total', compact('total'));
    }

    public function salvarItemPedido(Request $request) {
        $pedido_id = session('pedido_id');

        if (!$pedido_id) {
            $clienteId = session('cliente_id');
            if (!$clienteId) {
                if (!$request->wantsJson()) return redirect()->route('cardapio.index');
                return response()->json(['Mensagem' => 'Nenhum cliente na sessão'], 401);
            }
            $pedido = $this->service->adicionarPedido($clienteId);
            $pedido_id = $pedido->id;
            session(['pedido_id' => $pedido_id]);
        }

        $itemPedido = $this->service->adicionarItemPedido([
            'produto_id' => $request->produto_id, 
            'quantidade' => $request->quantidade, 
            'pedido_id'  => $pedido_id
        ]);

        if (!$request->wantsJson()) {
            $produto = \App\Models\Produto::find($request->produto_id);
            $carrinho = session('carrinho', []);
            
            if (isset($carrinho[$produto->id])) {
                $carrinho[$produto->id]['quantidade'] += $request->quantidade;
            } else {
                $carrinho[$produto->id] = [
                    'nome' => $produto->nome,
                    'preco' => $produto->preco,
                    'quantidade' => $request->quantidade,
                    'item_pedido_id' => $itemPedido->id ?? null
                ];
            }
            session(['carrinho' => $carrinho]);
            $this->recalcularCarrinho();
            
            return redirect()->route('cardapio.index');
        }

        return response()->json($itemPedido);
    }

    private function recalcularCarrinho() {
        $carrinho = session('carrinho', []);
        $count = 0;
        $total = 0;
        foreach ($carrinho as $item) {
            $count += $item['quantidade'];
            $total += $item['preco'] * $item['quantidade'];
        }
        session(['carrinhoCount' => $count]);
        session(['carrinhoTotal' => $total]);
    }

    public function removerUnidade(int $id) {
        $carrinho = session('carrinho', []);
        if (isset($carrinho[$id])) {
            $carrinho[$id]['quantidade']--;
            if ($carrinho[$id]['quantidade'] <= 0) {
                unset($carrinho[$id]);
            }
            session(['carrinho' => $carrinho]);
            $this->recalcularCarrinho();
        }
        return redirect()->route('pedido.ver');
    }

    public function adicionarUnidade(int $id) {
        $carrinho = session('carrinho', []);
        if (isset($carrinho[$id])) {
            $carrinho[$id]['quantidade']++;
            session(['carrinho' => $carrinho]);
            $this->recalcularCarrinho();
        }
        return redirect()->route('pedido.ver');
    }

    public function removerTudo(int $id) {
        $carrinho = session('carrinho', []);
        if (isset($carrinho[$id])) {
            unset($carrinho[$id]);
            session(['carrinho' => $carrinho]);
            $this->recalcularCarrinho();
        }
        return redirect()->route('pedido.ver');
    }

    public function deletarItemPedido(ItemPedido $itemPedido) : JsonResponse {
        $this->service->deletarItemPedido($itemPedido);
        return response()->json(['Mensagem' => 'Item Removido']);
    }

    public function alterarItemPedido(ItemPedido $itemPedido, int $quantidade) : ?JsonResponse{
        $itemPedido = $this->service->alterarItemPedido($itemPedido, $quantidade);

        if($itemPedido === null){
            return response()->json(['Mensagem' => 'Cliente Não Encontrado'], 404);
        }

        return response()->json($itemPedido);
    }
}