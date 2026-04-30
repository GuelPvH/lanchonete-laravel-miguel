@extends('site.layout')

@section('titulo', 'Novo Produto')

@section('estilos')
<style>
    .page-header {
        background-color: var(--color-background);
        position: sticky;
        top: 0;
        z-index: 100;
        padding: var(--spacing-sm) var(--spacing-md) var(--spacing-sm) var(--spacing-md);
        border-bottom: 1px solid var(--color-border);
    }
    .form-container {
        padding: var(--spacing-lg) var(--spacing-md);
        max-width: 600px;
        margin: 0 auto;
    }
    .btn-primary {
        background-color: var(--color-primary);
        color: white;
        padding: 12px;
        border: none;
        border-radius: var(--border-radius-md);
        font-weight: bold;
        width: 100%;
        cursor: pointer;
        display: block;
        margin-top: 20px;
        font-size: 16px;
    }
    .form-group {
        margin-bottom: 15px;
    }
    .form-label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }
    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid var(--color-border);
        border-radius: var(--border-radius-sm);
    }
</style>
@endsection

@section('header')
<div class="page-header">
    <h2 class="mb-sm text-center">Adicionar Produto</h2>
</div>
@endsection

@section('conteudo')
<div class="form-container">
    <form action="{{ route('produto.salvar') }}" method="POST">
        @csrf
        <div class="form-group">
            <label class="form-label" for="nome">Nome do Produto</label>
            <input type="text" id="nome" name="nome" class="form-control" required placeholder="Ex: Hamburguer duplo">
        </div>
        
        <div class="form-group">
            <label class="form-label" for="preco">Preço (R$)</label>
            <input type="text" inputmode="decimal" id="preco" name="preco" class="form-control" required placeholder="Ex: 25,50">
        </div>

        <button type="submit" class="btn-primary">Cadastrar Produto</button>
    </form>
    
    <div style="text-align: center; margin-top: 20px;">
        <a href="{{ route('cardapio.index') }}" style="color: var(--color-text-muted); text-decoration: underline;">Voltar ao Cardápio</a>
    </div>
</div>
@endsection
