@extends('layout')

@section('titulo', 'Bem-vindo')

@section('conteudo')
    <div class="boas-vindas">
        <h2>Bem-vindo à nossa lanchonete!</h2>
        <form action="{{ route('cliente.entrar') }}" method="POST">
            @csrf
            <label for="nome">Como gostaria de ser chamado(a)?</label>
            <input type="text" name="nome" id="nome" required>
            <button type="submit">Entrar</button>
        </form>
    </div>
@endsection