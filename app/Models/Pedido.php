<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model{
    
    protected $table = 'pedidos';

    protected $fillable = ['cliente_id'];

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }

    public function itens() { 
        return $this->hasMany(ItemPedido::class); 
    }

    public function calcularTotal(){
        return $this->itens->sum(function ($item) { 
            return $item->preco * $item->quantidade; 
        });
    }

}
