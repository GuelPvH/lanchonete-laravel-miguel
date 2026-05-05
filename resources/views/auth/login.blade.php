@extends('autorizacao.layout')

@section('titulo', 'Login')

@section('conteudo')
<div class="auth-page">
    <section class="auth-shell auth-shell-form auth-shell-login">
        <div class="auth-panel auth-panel-form">
            <div class="auth-block">

                <h1 class="auth-form-title text-center">
                    SEJA BEM-VINDO DE VOLTA
                </h1>

                {{-- Mensagem de sucesso --}}
                @if(session('status'))
                    <div class="auth-alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="auth-form">
                    @csrf

                    {{-- EMAIL --}}
                    <div class="auth-field">
                        <label for="email" class="auth-label">E-MAIL</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-control auth-input w-100"
                            placeholder="Insira o seu e-mail"
                            value="{{ old('email') }}"
                            required
                            autofocus
                        >
                        @error('email')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- SENHA --}}
                    <div class="auth-field">
                        <label for="password" class="auth-label">SENHA</label>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-control auth-input w-100"
                            placeholder="Insira a sua senha"
                            required
                        >
                        @error('password')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- ESQUECI SENHA --}}
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <a href="{{ route('password.request') }}" class="auth-link-small">
                            ESQUECI A SENHA
                        </a>
                    </div>

                    {{-- BOTÕES --}}
                    <div class="auth-form-actions d-flex flex-column flex-md-row gap-2 mt-3">
                        <button type="submit" class="btn auth-btn-yellow auth-btn-submit w-100">
                            ENTRAR
                        </button>

                        <a href="{{ route('register') }}" class="btn btn-outline-secondary w-100">
                            CRIAR CONTA
                        </a>
                    </div>
                </form>
            </div>
        </div>

        @include('autorizacao.showcase')
    </section>
</div>
@endsection