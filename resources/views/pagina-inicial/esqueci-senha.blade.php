@extends('layout')

@section('titulo', 'Recuperar Conta')

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
                        <img src="{{ asset('img/logo.png') }}" class="auth-brand-logo" alt="Logo">
                    </div>

                    <h1 class="auth-form-title auth-form-title-center">
                        RECUPERAÇÃO DE CONTA
                    </h1>

                    <form method="POST" action="#" class="mt-4">
                        @csrf

                        <div class="mb-3">
                            <label class="auth-label">NOME</label>
                            <input
                                type="text"
                                class="form-control auth-input"
                                placeholder="Insira o nome completo da conta"
                            >
                        </div>

                        <div class="mb-4">
                            <label class="auth-label">E-MAIL</label>
                            <input
                                type="email"
                                class="form-control auth-input"
                                placeholder="Digite o seu e-mail"
                            >
                        </div>

                        <button class="btn auth-btn-yellow auth-btn-submit">
                            PROSSEGUIR
                        </button>
                    </form>
                </div>
            </div>

            <div class="col-lg-6 d-none d-lg-block"></div>
        </div>
    </div>
</div>
@endsection