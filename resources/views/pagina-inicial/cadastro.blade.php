@extends('layout')

@section('titulo', 'Cadastro')

@section('header')
@endsection

@section('footer')
@endsection

@section('conteudo')
<div class="auth-page">
    <div class="container-fluid h-100">
        <div class="row g-0 min-vh-100">
            <div class="col-12 col-lg-6 d-flex align-items-center">
                <div class="auth-panel auth-panel-form">
                    <div class="auth-brand auth-brand-top mb-3">
                        <img src="{{ asset('img/logo.png') }}" alt="Logo" class="auth-brand-logo">
                    </div>

                    <h1 class="auth-form-title auth-form-title-center">CADASTRE-SE</h1>

                    <form action="{{ route('cliente.salvar') }}" method="POST" class="mt-3">
                        @csrf

                        <div class="mb-3">
                            <label for="nome" class="auth-label">NOME</label>
                            <input
                                type="text"
                                id="nome"
                                name="nome"
                                class="form-control auth-input"
                                placeholder="Digite o seu nome completo"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label for="cpf" class="auth-label">CPF</label>
                            <input
                                type="text"
                                id="cpf"
                                name="cpf"
                                class="form-control auth-input"
                                placeholder="Digite o seu CPF"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label for="telefone" class="auth-label">TELEFONE</label>
                            <input
                                type="text"
                                id="telefone"
                                name="telefone"
                                class="form-control auth-input"
                                placeholder="Digite o seu número de telefone"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label for="email" class="auth-label">E-MAIL</label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="form-control auth-input"
                                placeholder="Digite o seu e-mail"
                                required
                            >
                        </div>

                        <div class="mb-4">
                            <label for="senha" class="auth-label">SENHA</label>
                            <input
                                type="password"
                                id="senha"
                                name="senha"
                                class="form-control auth-input"
                                placeholder="Crie uma senha"
                                required
                            >
                        </div>

                        <button type="submit" class="btn auth-btn-yellow auth-btn-submit">
                            CADASTRAR
                        </button>
                    </form>
                </div>
            </div>

            <div class="col-lg-6 d-none d-lg-block"></div>
        </div>
    </div>
</div>
@endsection