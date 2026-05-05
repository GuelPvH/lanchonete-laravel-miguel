@extends('autorizacao.layout')

@section('titulo', 'Verificar E-mail')

@section('conteudo')
<div class="auth-page">
    <section class="auth-shell auth-shell-form auth-shell-login">
        <div class="auth-panel auth-panel-form">
            <div class="auth-block">

                <h1 class="auth-form-title text-center">
                    VERIFIQUE SEU E-MAIL
                </h1>

                {{-- Descrição --}}
                <p class="text-muted text-center mb-4">
                    Obrigado por se cadastrar! Antes de começar, verifique seu e-mail clicando no link que enviamos.
                    Se não recebeu, você pode solicitar outro abaixo.
                </p>

                {{-- Mensagem de sucesso --}}
                @if (session('status') == 'verification-link-sent')
                    <div class="auth-alert">
                        Um novo link de verificação foi enviado para seu e-mail.
                    </div>
                @endif

                {{-- Ações --}}
                <div class="auth-form">

                    {{-- Reenviar email --}}
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <div class="auth-form-actions d-flex flex-column flex-md-row gap-2">
                            <button type="submit" class="btn auth-btn-yellow auth-btn-submit w-100">
                                REENVIAR E-MAIL
                            </button>
                        </div>
                    </form>

                    {{-- Logout --}}
                    <form method="POST" action="{{ route('logout') }}" class="mt-3">
                        @csrf

                        <div class="auth-form-actions">
                            <button type="submit" class="btn btn-outline-secondary w-100">
                                SAIR
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        @include('autorizacao.showcase')
    </section>
</div>
@endsection