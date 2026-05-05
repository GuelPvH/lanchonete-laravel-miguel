@extends('autorizacao.layout')

@section('titulo', 'Redefinir Senha')

@section('conteudo')
<div class="auth-page">
    <section class="auth-shell auth-shell-form auth-shell-login">
        <div class="auth-panel auth-panel-form">
            <div class="auth-block">

                <h1 class="auth-form-title text-center">
                    REDEFINIR SENHA
                </h1>

                <p class="text-muted text-center mb-4">
                    Digite seu e-mail e crie uma nova senha para acessar sua conta.
                </p>

                <form method="POST" action="{{ route('password.store') }}" class="auth-form">
                    @csrf

                    {{-- TOKEN --}}
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    {{-- EMAIL --}}
                    <div class="auth-field">
                        <label for="email" class="auth-label">E-MAIL</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-control auth-input w-100"
                            value="{{ old('email', $request->email) }}"
                            required
                            autofocus
                        >
                        @error('email')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- NOVA SENHA --}}
                    <div class="auth-field">
                        <label for="password" class="auth-label">NOVA SENHA</label>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-control auth-input w-100"
                            placeholder="Digite sua nova senha"
                            required
                        >
                        @error('password')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- CONFIRMAR SENHA --}}
                    <div class="auth-field">
                        <label for="password_confirmation" class="auth-label">
                            CONFIRMAR SENHA
                        </label>
                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            class="form-control auth-input w-100"
                            placeholder="Confirme sua nova senha"
                            required
                        >
                        @error('password_confirmation')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- BOTÕES --}}
                    <div class="auth-form-actions d-flex flex-column flex-md-row gap-2 mt-3">
                        <button type="submit" class="btn auth-btn-yellow auth-btn-submit w-100">
                            REDEFINIR SENHA
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