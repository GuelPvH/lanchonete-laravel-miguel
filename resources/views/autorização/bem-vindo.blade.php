@extends('layout')

@section('titulo', 'Bem-vindo')

@section('header')
@endsection

@section('footer')
@endsection

@section('conteudo')
<div class="auth-page">
    <div class="container-fluid h-100">
        <div class="row g-0 min-vh-100">
            <div class="col-12 col-lg-6 d-flex align-items-center">
                <div class="auth-panel">
                    <div class="auth-brand mb-4">
                        <img src="{{ asset('img/logo.png') }}" alt="Logo" class="auth-brand-logo">
                    </div>

                    <h1 class="auth-home-title">
                        SUA FOME TEM LUGAR CERTO <br>
                        FAÇA LOGIN E SABOREIE
                    </h1>

                    <div class="auth-home-actions mt-4">
                        <a href="{{ route('login') }}" class="btn auth-btn-yellow">ENTRAR</a>
                        <a href="{{ route('register') }}" class="btn auth-btn-white">CADASTRE-SE</a>
                        <a href="{{ route('cardapio.index') }}" class="auth-link-pink">VISITA SEM LOGIN</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 d-none d-lg-block"></div>
        </div>
    </div>
</div>
@endsection
