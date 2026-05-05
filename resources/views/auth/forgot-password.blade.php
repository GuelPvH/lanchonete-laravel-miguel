@extends('autorizacao.layout')

@section('titulo', 'Recuperar Senha')

@section('conteudo')
<div class="auth-page">
    <section class="auth-shell auth-shell-form auth-shell-login">
        <div class="auth-panel auth-panel-form">
            <div class="auth-block">

                <h1 class="auth-form-title text-center">
                    RECUPERAR SENHA
                </h1>

                {{-- Descrição --}}
                <p class="text-muted text-center mb-4">
                    Esqueceu sua senha? Informe seu e-mail e enviaremos um link para redefini-la.
                </p>

                {{-- Mensagem de sucesso --}}
                @if (session('status'))
                    <div class="auth-alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}" class="auth-form">
                    @csrf

                    {{-- EMAIL --}}
                    <div class="auth-field">
                        <label for="email" class="auth-label">E-MAIL</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-control auth-input w-100"
                            placeholder="Digite seu e-mail"
                            value="{{ old('email') }}"
                            required
                            autofocus
                        >
                        @error('email')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- BOTÕES --}}
                    <div class="auth-form-actions d-flex flex-column flex-md-row gap-2 mt-3">
                        <button type="submit" class="btn auth-btn-yellow auth-btn-submit w-100">
                            ENVIAR LINK
                        </button>

                        <a href="{{ route('login') }}" class="btn btn-outline-secondary w-100">
                            VOLTAR AO LOGIN
                        </a>
                    </div>
                </form>
            </div>
        </div>

        @include('autorizacao.showcase')
    </section>
</div>
@endsection