<?php
namespace App\Modules\Cliente;
use App\Models\Cliente;

class ClienteService{

    public function adcionarCliente(string $nome) : Cliente{
        $cliente = Cliente::create(['nome' => $nome]);
        return $cliente;
    }

    public function deletarCliente(Cliente $cliente) : void{
        $cliente->delete();
    }

    public function alterarCliente(string $nome, Cliente $cliente) : ?Cliente{
        if($cliente === null){
            return null;
        }
        
        $cliente->update(['nome' => $nome]);
        return $cliente;
    }
}