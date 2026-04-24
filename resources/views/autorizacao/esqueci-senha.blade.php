@extends('autorizacao.layout')

@section('titulo', 'Recuperar Conta')

@section('conteudo')
<div class="auth-page">
    <section class="auth-shell auth-shell-form auth-shell-recovery">
        <div class="auth-panel auth-panel-form">
            <div class="auth-block">
                <h1 class="auth-form-title auth-form-title-center">
                    Recuperação de Conta
                </h1>

                @if(session('mensagem'))
                    <div class="auth-alert">
                        {{ session('mensagem') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}" class="auth-form">
                    @csrf

                    <div class="auth-field">
                        <label class="auth-label" for="nome">NOME</label>
                        <input
                            type="text"
                            id="nome"
                            name="nome"
                            class="form-control auth-input"
                            placeholder="Insira o nome completo da conta"
                            value="{{ old('nome') }}"
                            required
                        >
                    </div>

                    <div class="auth-field">
                        <label class="auth-label" for="email">E-MAIL</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-control auth-input"
                            placeholder="Digite o seu e-mail"
                            value="{{ old('email') }}"
                            required
                        >
                    </div>

                    <div class="auth-form-actions">
                        <button class="btn auth-btn-yellow auth-btn-submit">
                            Prosseguir
                        </button>
                    </div>
                </form>
            </div>
        </div>

        @include('autorizacao.showcase')
    </section>
</div>
@endsection
