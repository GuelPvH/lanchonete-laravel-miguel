<?php
namespace App\Modules\Produto;

use App\Models\Produto;

class ProdutoService{

    public function adicionarProduto(string $nome, float $preco) : Produto{
        $produto = Produto::create(['nome' => $nome, 'preco' => $preco]);
        return $produto;
    }

    public function deletarProduto(Produto $produto) : void{
        $produto->delete();
    }
    
    public function alterarProduto(Produto $produto, array $dados) : ?Produto{
        if(!$produto == null){
            return null;
        }
        
        $produto->update($dados);
        return $produto;
    }
}
