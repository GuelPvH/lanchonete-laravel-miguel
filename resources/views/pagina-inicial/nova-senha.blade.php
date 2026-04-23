@extends('layout')

@section('titulo', 'Nova Senha')

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

                    <h1 class="auth-form-title auth-form-title-center">
                        CRIE UMA NOVA SENHA
                    </h1>

                    <form method="POST" action="#" class="mt-4">
                        @csrf

                        <div class="mb-3">
                            <label for="senha" class="auth-label">NOVA SENHA</label>
                            <input
                                type="password"
                                id="senha"
                                name="senha"
                                class="form-control auth-input"
                                placeholder="Digite a nova senha"
                                required
                            >
                        </div>

                        <div class="mb-4">
                            <label for="senha_confirmation" class="auth-label">CONFIRME A SENHA</label>
                            <input
                                type="password"
                                id="senha_confirmation"
                                name="senha_confirmation"
                                class="form-control auth-input"
                                placeholder="Digite novamente a senha"
                                required
                            >
                        </div>

                        <button type="submit" class="btn auth-btn-yellow auth-btn-submit">
                            REDEFINIR
                        </button>
                    </form>
                </div>
            </div>

            <div class="col-lg-6 d-none d-lg-block"></div>
        </div>
    </div>
</div>
@endsection