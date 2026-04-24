<?php
namespace App\Modules\Cliente;
use App\Models\Cliente;

class ClienteService{

    public function adcionarCliente(string $nome, string $email, string $cpf, ?string $numero, string $senha) : Cliente{
        $cliente = Cliente::create(
            [
                'nome' => $nome, 
                'email' => $email, 
                'cpf' => $cpf,
                'numero' => $numero,
                'senha' => $this->calculaHashDaSenha($senha)
            ]);
        return $cliente;
    }

    public function deletarCliente(Cliente $cliente) : void{
        $cliente->delete();
    }

    public function alterarCliente(array $data, Cliente $cliente) : ?Cliente{
        if($cliente === null){
            return null;   
        }
        
        $cliente->update($data);
        return $cliente;
    }

    private function calculaHashDaSenha(string $senha) : string{
        return password_hash($senha, PASSWORD_DEFAULT);
    }
}