<?php
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\RedirectResponse;

class StoreClienteRequest{

public function store(Request $request): RedirectResponse{
    $validated = $request->validate([
        'id' => 'required|unique:posts',
        'nome' => 'required',
        'email' => 'required',
        'cpf' => 'required',
        'numero' => 'required',
        'senha' => 'required'
    ]);
 
    return redirect('/posts');
}
}