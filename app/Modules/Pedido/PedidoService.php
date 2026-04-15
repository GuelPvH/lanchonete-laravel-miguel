<?php
namespace App\Modules\Pedido;

use App\Models\Pedido;
use App\Models\ItemPedido;

class PedidoService{

    public function adicionarPedido(int $cliente_id) : Pedido{
        $pedido = Pedido::create(['cliente_id' => $cliente_id]);
        return $pedido;
    }

    public function deletarPedido(Pedido $pedido) : void{
        $pedido->delete();
    }
    
    public function alterarPedido(Pedido $pedido, int $cliente_id) : ?Pedido{
        if($pedido === null){
            return null;
        }
        
        $pedido->update(['cliente_id' => $cliente_id]);
        return $pedido;
    }

    public function valorTotal(int $pedido_id) : ?float{
        $pedido = Pedido::with('itens')->find($pedido_id);
        if ($pedido === null) {
            return null;
        }
        return $pedido->calcularTotal();
    }

    public function adicionarItemPedido(array $itens) : ItemPedido{
        $itemPedido = ItemPedido::create(['produto_id' => $itens['produto_id'], 'quantidade' => $itens['qauntidade'], 'pedido_id' => $itens['pedido_id']]);
        return $itemPedido;
    }

    public function deletarItemPedido(ItemPedido $itemPedido){
        $itemPedido->delete();
    }

    public function alterarItemPedido(int $id, int $quantidade) : ?ItemPedido{
        $itemPedido = ItemPedido::find($id);

        if($itemPedido === null){
            return null;
        }
        
        $itemPedido->update(['quantidade' => $quantidade]);
        return $itemPedido;
    }
}