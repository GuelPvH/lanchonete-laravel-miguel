<?php

namespace App\Modules\Pedido;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Pedido\PedidoService;
use App\Models\Pedido;
use App\Models\ItemPedido;

class PedidoController extends Controller{

    public function __construct(private PedidoService $service){
        $this->service = $service;
    }

    public function salvarPedido(Request $request) : string{
        $pedido = $this->service->adicionarPedido($request->client_id);
        return response()->json($pedido);
    }

    public function deletarPedido(Pedido $pedido) : string {
        $pedido = $this->service->deletarPedido($pedido);
        return response()->json(['Mensagem' => 'Pedido Removido']);
    }

    public function alterarPedido(Pedido $pedido, int $cliente_id) : ?string{
        $pedido = $this->service->alterarPedido($pedido, $cliente_id);

        if(!$pedido === null){
            return response()->json(['Mensagem' => 'Cliente Não Encontrado'], 404);
        }

        return response()->json($pedido);
    }

    public function calcularTotal(Request $request) : string{
        $pedido = $this->service->valorTotal($request->id);
        return response()->json($pedido);
    }

    public function salvarItemPedido(Request $request) : string{
        $pedido = $this->service->adicionarItemPedido($request->produto_id, $request->quantidade, $request->pedido_id,);
        return response()->json($pedido);
    }
    
    // Terminar essa merda
}