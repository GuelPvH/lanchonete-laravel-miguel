@extends('site.layout')

@section('titulo', 'PAGAMENTO')

@section('estilos')
@endsection

@section('header')
<div class="checkout-header shadow-sm"> <a href="{{ route('cardapio.index') }}" class="back-btn">
        <svg viewBox="0 0 24 24">
            <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/>
        </svg>
    </a>

    <h1 class="checkout-title h1">Pagamento</h1>
</div>
@endsection


@section('conteudo')
<div class="container container-carrinho flex-grow-1 py-4">

    @if(session('carrinho'))
    <form id="form-checkout">
        <h2 class="section-title h2">Pagamento</h2>

        <label class="radio-card d-block mb-2" id="label-online">
            <input type="radio" name="pagamento_tipo" value="online" onchange="togglePaymentMethods('online')">
            <div class="ms-2">
                <div class="fw-bold">Pagamento Online</div>
                <div class="small text-muted">Pague agora via Pix, Cartão ou Carteira</div>
            </div>
        </label>

        <div id="methods-online" class="payment-methods-grid mb-3">
            <label><input type="radio" name="forma_pagamento" value="pix_online"><div class="payment-pill">PIX</div></label>
            <label><input type="radio" name="forma_pagamento" value="credito_online"><div class="payment-pill">Crédito</div></label>
            <label><input type="radio" name="forma_pagamento" value="debito_online"><div class="payment-pill">Débito</div></label>
        </div>

        <label class="radio-card d-block mb-2" id="label-presencial">
            <input type="radio" name="pagamento_tipo" value="presencial" onchange="togglePaymentMethods('presencial')">
            <div class="ms-2">
                <div class="fw-bold">Pagamento Presencial</div>
                <div class="small text-muted">Pague na retirada</div>
            </div>
        </label>

        <div class="secure-badge d-flex align-items-center justify-content-center py-3 text-success">
            <svg viewBox="0 0 24 24" width="20" class="me-2" fill="currentColor">
                <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/>
            </svg>
            <span class="small fw-bold">Pagamento 100% seguro</span>
        </div>

        <h3 class="section-title">Seus Dados</h3>
        <div class="user-info-card d-flex justify-content-between align-items-center p-3 border rounded mb-5">
            <div>
                <p class="fw-bold mb-0">{{ session('nome_cliente', 'Visitante') }}</p>
            </div>
            <a href="{{ url('/perfil') }}" class="edit-icon text-decoration-none">✎</a>
        </div>
    </form>
    @endif
</div>
@endsection

@section('footer')
<footer class="mt-auto py-3">
    @if(session('carrinho'))
    <div class="checkout-footer p-3 shadow-lg bg-white border-top">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="fw-bold text-uppercase">Total</span>
                <span class="h4 mb-0 fw-bold text-pink">
                    R$ {{ number_format($total ?? 0, 2, ',', '.') }}
                </span>
            </div>

            <button id="btn-finalizar" class="btn btn-primary w-100 py-3 fw-bold rounded-pill">
                PAGAR PEDIDO
            </button>
        </div>
    </div>
    @else
    <div class="py-3 text-center text-white small">
        © 2026 - MECDONIN
    </div>
    @endif
</footer>
@endsection