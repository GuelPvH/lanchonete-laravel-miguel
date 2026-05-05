@extends('autorizacao.layout')

@section('titulo', 'Confirmar Senha')

@section('conteudo')
<div class="auth-page">
    <section class="auth-shell auth-shell-form auth-shell-login">
        <div class="auth-panel auth-panel-form">
            <div class="auth-block">

                <h1 class="auth-form-title text-center">
                    CONFIRMAR SENHA
                </h1>

                <p class="text-muted text-center mb-4">
                    Esta é uma área segura. Por favor, confirme sua senha para continuar.
                </p>

                <form method="POST" action="{{ route('password.confirm') }}" class="auth-form">
                    @csrf

                    {{-- SENHA --}}
                    <div class="auth-field">
                        <label for="password" class="auth-label">SENHA</label>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-control auth-input w-100"
                            placeholder="Digite sua senha"
                            required
                            autocomplete="current-password"
                        >
                        @error('password')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- BOTÕES --}}
                    <div class="auth-form-actions d-flex flex-column flex-md-row gap-2 mt-3">
                        <button type="submit" class="btn auth-btn-yellow auth-btn-submit w-100">
                            CONFIRMAR
                        </button>

                        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary w-100">
                            VOLTAR
                        </a>
                    </div>
                </form>
            </div>
        </div>

        @include('autorizacao.showcase')
    </section>
</div>
@endsection