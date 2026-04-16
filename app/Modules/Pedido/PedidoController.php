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

    public function deletarPedido(Pedido $pedido) : JsonResponse {
        $this->service->deletarPedido($pedido);
        return response()->json(['Mensagem' => 'Pedido Removido']);
    }

    public function alterarPedido(Request $request, Pedido $pedido) : ?JsonResponse{
        $pedido = $this->service->alterarPedido($pedido, $request->cliente_id);

        if($pedido === null){
            return response()->json(['Mensagem' => 'Cliente Não Encontrado'], 404);
        }

        return response()->json($pedido);
    }

    public function calcularTotal(Request $request) : JsonResponse{
        $pedido = $this->service->calcularValorTotal($request->id);
        return response()->json($pedido);
    }

    public function salvarItemPedido(Request $request) : JsonResponse{
        $itemPedido = $this->service->adicionarItemPedido([
            $request->produto_id, 
            $request->quantidade, 
            $request->pedido_id
            ]);
        return response()->json($itemPedido);
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