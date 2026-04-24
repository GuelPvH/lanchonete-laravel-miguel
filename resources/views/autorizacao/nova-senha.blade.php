@extends('autorizacao.layout')

@section('titulo', 'Nova Senha')

@section('conteudo')
<div class="auth-page">
    <section class="auth-shell auth-shell-form auth-shell-reset">
        <div class="auth-panel auth-panel-form">
            <div class="auth-block">
                <h1 class="auth-form-title auth-form-title-center">
                    DIGITE A SUA NOVA SENHA
                </h1>

                @if(session('mensagem'))
                    <div class="auth-alert">
                        {{ session('mensagem') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.update') }}" class="auth-form">
                    @csrf

                    <div class="auth-field">
                        <label for="senha" class="auth-label">SENHA</label>
                        <input
                            type="password"
                            id="senha"
                            name="senha"
                            class="form-control auth-input"
                            placeholder="Digite a sua nova senha"
                            required
                        >
                    </div>

                    <div class="auth-field">
                        <label for="senha_confirmation" class="auth-label">CONFIRMAR SENHA</label>
                        <input
                            type="password"
                            id="senha_confirmation"
                            name="senha_confirmation"
                            class="form-control auth-input"
                            placeholder="Confirmar novamente"
                            required
                        >
                    </div>

                    <div class="auth-form-actions">
                        <button type="submit" class="btn auth-btn-yellow auth-btn-submit">
                            CONFIRMAR
                        </button>
                    </div>
                </form>
            </div>
        </div>

        @include('autorizacao.showcase')
    </section>
</div>
@endsection
