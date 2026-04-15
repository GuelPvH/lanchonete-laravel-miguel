<?php
namespace App\Modules\Cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Cliente\ClienteService;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function __construct(private ClienteService $service){
        $this->service = $service;
    }

    public function salvarCliente(Request $request) : string{
        $cliente = $this->service->adcionarCliente($request->nome);
        return response()->json($cliente);
    }

    public function deletarCliente(Cliente $cliente) : string{
        $this->service->deletarCliente($cliente);
        return response()->json(['Mensagem' => 'Cliente Removido']);
    }

    public function alterarCliente(string $nome, Request $request) : string{
        $cliente = $this->service->alterarCliente($nome, $request->nome);

        if(!$cliente === null){
            return response()->json(['Mensagem' => 'Cliente Não Encontrado'], 404);
        }

        return response()->json($cliente);
    }
}
