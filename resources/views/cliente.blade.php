@extends('layout')

@section('titulo', 'Bem-vindo')

@section('estilos')
<style>
    .home-container {
        min-height: calc(100vh - 120px);
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: var(--spacing-md) var(--spacing-md);
        text-align: center;
        background-color: var(--color-background);
        gap: var(--spacing-sm);
    }

    .slogan {
        font-size: 15px;
        color: var(--color-text-muted);
        margin-bottom: var(--spacing-md);
    }
</style>
@endsection

@section('header')
@endsection

@section('conteudo')
<div class="home-container">
    <div class="logo-container" style="margin-bottom: 20px;">
        <div class="logo-box" style="margin: 0 auto; width: 80px; height: 80px;">
            <img src="{{ asset('img/logo.png') }}" alt="MecDonin Logo" class="logo-img" style="width: 100%; height: 100%; object-fit: contain;">
        </div>
        <h1 style="color: var(--color-primary); font-weight: 800; font-style: italic; margin-top: 10px;">MECDONIN</h1>
        <span class="status-badge" style="background: var(--color-success); color: white; padding: 2px 8px; border-radius: 12px; font-size: 12px; font-weight: bold;">Aberta</span>
    </div>

    <h1 class="mb-sm">Bem-vindo!</h1>
    <p class="slogan">Identifique-se para continuar na MecDonin!</p>

    <form action="{{ route('cliente.entrar') }}" method="POST" class="mt-md" style="text-align: left;">
        @csrf
        <div class="form-group" style="margin-bottom: 15px;">
            <label class="form-label" for="nome" style="font-weight: bold; margin-bottom: 5px; display: block;">Nome</label>
            <input type="text" id="nome" name="nome" class="form-control" placeholder="Seu nome" style="width: 100%; padding: 10px; border: 1px solid var(--color-border); border-radius: 8px;" required>
        </div>

        <div class="form-group" style="margin-bottom: 20px;">
            <label class="form-label" for="sobrenome" style="font-weight: bold; margin-bottom: 5px; display: block;">Sobrenome</label>
            <input type="text" id="sobrenome" name="sobrenome" class="form-control" placeholder="Seu sobrenome" style="width: 100%; padding: 10px; border: 1px solid var(--color-border); border-radius: 8px;" required>
        </div>

        <button type="submit" class="btn btn-primary mt-sm" style="width: 100%; padding: 12px; background: var(--color-primary); color: white; border: none; border-radius: 8px; font-weight: bold; font-size: 16px; cursor: pointer;">Confirmar Dados</button>
    </form>
</div>
@endsection

@section('footer')
@endsection