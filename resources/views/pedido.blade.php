@extends('layout')

@section('titulo', 'Meu Pedido')

@section('estilos')
    @vite(['resources/css/pedidoStyle.css'])
@endsection

@section('header')
<div class="checkout-header">
    <a href="{{ route('cardapio.index') }}" class="back-btn">
        <svg viewBox="0 0 24 24">
            <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/>
        </svg>
        Menu
    </a>

    <h2 class="checkout-title">Meu Pedido</h2>
</div>
@endsection

@section('conteudo')
<div class="container">

    <h3 class="section-title">Seu Carrinho</h3>

    @forelse(session('carrinho', []) as $id => $item)
        <div class="cart-item">

            <div class="cart-item-img"></div>

            <div class="cart-item-info">
                <p class="cart-item-title">{{ $item['nome'] }}</p>
                <p class="cart-item-price">
                    R$ {{ number_format($item['preco'], 2, ',', '.') }}
                </p>

                <div class="cart-qty-controls">
                    <form action="{{ url('/pedido/remover-unidade/' . $id) }}" method="POST">
                        @csrf
                        <button type="submit" class="cart-qty-btn">-</button>
                    </form>

                    <span>{{ $item['quantidade'] }}</span>

                    <form action="{{ url('/pedido/adicionar-unidade/' . $id) }}" method="POST">
                        @csrf
                        <button type="submit" class="cart-qty-btn">+</button>
                    </form>
                </div>
            </div>

            <form action="{{ url('/pedido/remover-tudo/' . $id) }}" method="POST">
                @csrf
                <button type="submit" class="cart-remove">
                    <svg viewBox="0 0 24 24">
                        <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zm2.46-7.12l1.41-1.41L12 12.59l2.12-2.12 1.41 1.41L13.41 14l2.12 2.12-1.41 1.41L12 15.41l-2.12 2.12-1.41-1.41L10.59 14l-2.12-2.12z"/>
                    </svg>
                </button>
            </form>

        </div>
    @empty
        <p>Seu carrinho está vazio.</p>
    @endforelse

    <a href="{{ route('cardapio.index') }}" class="add-more">
        + Adicionar mais itens
    </a>

    @if(session('carrinho'))
    <form id="form-checkout">

        <hr class="separation-line">

        <!-- Modalidade -->
        <h3 class="section-title">Retirada</h3>

        <label class="radio-card">
            <input type="radio" name="modalidade" value="mesa" onchange="toggleModalidade()">
            <div>
                <div class="fw-bold">Comer no local</div>
                <div class="small">Receber na lanchonete</div>
            </div>
        </label>

        <label class="radio-card">
            <input type="radio" name="modalidade" value="balcao" onchange="toggleModalidade()">
            <div>
                <div class="fw-bold">Retirada no local</div>
                <div class="small">Pronto em cerca de 20 min</div>
            </div>
        </label>

        <!-- Pagamento -->
        <h3 class="section-title">Pagamento</h3>

        <label class="radio-card" id="label-online">
            <input type="radio" name="pagamento_tipo" value="online" onchange="togglePaymentMethods('online')">
            <div>
                <div class="fw-bold">Pagamento Online</div>
                <div class="small">Pague agora via Pix, Cartão ou Carteira</div>
            </div>
        </label>

        <div id="methods-online" class="payment-methods-grid">
            <label>
                <input type="radio" name="forma_pagamento" value="pix_online" onchange="checkFormStatus()">
                <div class="payment-pill">PIX</div>
            </label>

            <label>
                <input type="radio" name="forma_pagamento" value="credito_online" onchange="checkFormStatus()">
                <div class="payment-pill">Cartão de Crédito</div>
            </label>

            <label>
                <input type="radio" name="forma_pagamento" value="debito_online" onchange="checkFormStatus()">
                <div class="payment-pill">Cartão de Débito</div>
            </label>

            <label>
                <input type="radio" name="forma_pagamento" value="apple_google" onchange="checkFormStatus()">
                <div class="payment-pill">Apple / Google Pay</div>
            </label>
        </div>

        <label class="radio-card" id="label-presencial">
            <input type="radio" name="pagamento_tipo" value="presencial" onchange="togglePaymentMethods('presencial')">
            <div>
                <div class="fw-bold">Pagamento Presencial</div>
                <div class="small">Pague na retirada</div>
            </div>
        </label>

        <div id="methods-presencial" class="payment-methods-grid">
            <label>
                <input type="radio" name="forma_pagamento" value="dinheiro" onchange="checkFormStatus()">
                <div class="payment-pill">Dinheiro</div>
            </label>

            <label>
                <input type="radio" name="forma_pagamento" value="pix_presencial" onchange="checkFormStatus()">
                <div class="payment-pill">PIX</div>
            </label>

            <label>
                <input type="radio" name="forma_pagamento" value="credito_maquina" onchange="checkFormStatus()">
                <div class="payment-pill">Crédito</div>
            </label>

            <label>
                <input type="radio" name="forma_pagamento" value="debito_maquina" onchange="checkFormStatus()">
                <div class="payment-pill">Débito</div>
            </label>
        </div>

        <div class="secure-badge">
            <svg viewBox="0 0 24 24">
                <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/>
            </svg>
            Pagamento seguro
        </div>

        <!-- Usuário -->
        <h3 class="section-title">Seus Dados</h3>

        <div class="user-info-card">
            <div class="user-info-details">
                <p class="fw-bold">
                    {{ session('nome_cliente', 'Visitante') }}
                </p>
            </div>

            <a href="{{ url('/perfil') }}" class="edit-icon">
                ✎
            </a>
        </div>

    </form>
    @endif

</div>
@endsection

@section('footer')
@if(session('carrinho'))
<div class="sticky-footer checkout-footer">
    <div class="checkout-total">
        <span>Total</span>
        <span>
            R$ {{ number_format($total ?? 0, 2, ',', '.') }}
        </span>
    </div>

    <button id="btn-finalizar" class="btn-primary" disabled>
        Fazer pedido
    </button>
</div>
@endif
@endsection
