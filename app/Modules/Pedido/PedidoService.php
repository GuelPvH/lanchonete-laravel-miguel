<?php
namespace App\Modules\Pedido;

use App\Models\Pedido;
use App\Models\ItemPedido;

class PedidoService{

    public function adicionarPedido(int $cliente_id) : Pedido{
        return Pedido::create(['cliente_id' => $cliente_id]);
    }

    public function deletarPedido(int $id){
        Pedido::destroy($id);
    }

    public function deletarItemsPedidoDePedido(int $id){
        ItemPedido::where('pedido_id', '=', $id)->delete();
    }
    
    public function alterarPedido(Pedido $pedido, int $cliente_id) : ?Pedido{
        $pedido->update(['cliente_id' => $cliente_id]);
        return $pedido;
    }

    public function calcularValorTotal(int $pedido_id) : ?float{
        $pedido = Pedido::with('itens')->find($pedido_id);
        if ($pedido === null) {
            return null;
        }
        return $pedido->calcularTotal();
    }

    public function adicionarItemPedido(array $itens) : ItemPedido{
        $pedido = Pedido::findOrFail($itens['pedido_id']);
        
        return $pedido->itens()->create([
            'produto_id' => $itens['produto_id'],
            'quantidade' => $itens['quantidade'],
        ]);
    }

    public function deletarItemPedido(ItemPedido $itemPedido){
        $itemPedido->delete();
    }

    public function alterarItemPedido(ItemPedido $itemPedido, int $quantidade) : ?ItemPedido{
        $itemPedido->update(['quantidade' => $quantidade]);
        return $itemPedido;
    }
}