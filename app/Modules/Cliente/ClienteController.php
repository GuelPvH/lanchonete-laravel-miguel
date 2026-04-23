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

    public function salvarCliente(Request $request) {
        $cliente = $this->service->adcionarCliente($request->nome, $request->email, $request->cpf, $request->numero, $request->senha);
        
        /* if (!$request->wantsJson()) {
            session([
                'cliente_id' => $cliente->id,
                'nome_cliente' => $cliente->nome,
                'sobrenome_cliente' => $request->sobrenome
            ]);
            return redirect()->route('cardapio.index')->with('mensagem', 'Bem-vindo, ' . $cliente->nome . '!');
        } */
        
        return response()->json($cliente);
    }

    public function deletarCliente(Cliente $cliente) {
        $this->service->deletarCliente($cliente);
        return response()->json(['Mensagem' => 'Cliente Removido']);
    }

    public function alterarCliente(string $nome, Request $request) {
        // Correção de bug no parâmetro original (só pro API ficar funcional)
        $cliente = \App\Models\Cliente::where('nome', $nome)->first();
        if ($cliente) {
            $cliente = $this->service->alterarCliente($request->nome, $cliente);
            return response()->json($cliente);
        }
        return response()->json(['Mensagem' => 'Cliente Não Encontrado'], 404);
    }

    public function atualizarPerfilWeb(Request $request) {
        $clienteId = session('cliente_id');
        if (!$clienteId) {
            return redirect()->route('cliente.index');
        }

        $cliente = \App\Models\Cliente::find($clienteId);
        if ($cliente) {
            $cliente = $this->service->alterarCliente($request->nome, $cliente);
            session(['nome_cliente' => $cliente->nome]);
            return redirect()->route('perfil.index')->with('mensagem', 'Perfil atualizado com sucesso!');
        }
        return redirect()->route('perfil.index')->with('mensagem', 'Erro ao atualizar perfil.');
    }

    public function sair(Request $request) {
        $request->session()->flush();
        return redirect()->route('cliente.index');
    }
}
