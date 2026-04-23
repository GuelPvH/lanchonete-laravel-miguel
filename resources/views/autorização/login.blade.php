@extends('layout')

@section('titulo', 'Login')

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
                    <div class="auth-brand auth-brand-top mb-4">
                        <img src="{{ asset('img/logo.png') }}" alt="Logo" class="auth-brand-logo">
                    </div>

                    <h1 class="auth-form-title">SEJA BEM-VINDO DE VOLTA</h1>

                    @if(session('mensagem'))
                        <div class="alert alert-info mt-3">
                            {{ session('mensagem') }}
                        </div>
                    @endif

                    <form action="{{ route('cliente.login') }}" method="POST" class="mt-4">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="auth-label">E-MAIL</label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="form-control auth-input"
                                placeholder="Insira o seu e-mail"
                                value="{{ old('email') }}"
                                required
                            >
                        </div>

                        <div class="mb-2">
                            <label for="senha" class="auth-label">SENHA</label>
                            <input
                                type="password"
                                id="senha"
                                name="senha"
                                class="form-control auth-input"
                                placeholder="Insira a sua senha"
                                required
                            >
                        </div>

                        <div class="mb-4">
                            <a href="{{ route('password.request') }}" class="auth-link-small">
                                ESQUECI A SENHA
                            </a>
                        </div>

                        <button type="submit" class="btn auth-btn-yellow auth-btn-submit">
                            ENTRAR
                        </button>
                    </form>
                </div>
            </div>

            <div class="col-lg-6 d-none d-lg-block"></div>
        </div>
    </div>
</div>
@endsection
