@extends('site.layout')

@section('titulo', 'Meu Pedido')

@section('estilos')
@endsection

@section('header')
<div class="checkout-header shadow-sm"> <a href="{{ route('cardapio.index') }}" class="back-btn">
        <svg viewBox="0 0 24 24">
            <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/>
        </svg>
        Menu
    </a>

    <h2 class="checkout-title">Meu Pedido</h2>
</div>
@endsection

@section('conteudo')
<div class="container container-carrinho flex-grow-1 py-4">

    <h3 class="section-title">Seu Carrinho</h3>

    @forelse(session('carrinho', []) as $id => $item)
        <div class="cart-item shadow-sm mb-3 bg-white p-3 rounded"> <div class="cart-item-img"></div>

            <div class="cart-item-info">
                <p class="cart-item-title fw-bold mb-1">{{ $item['nome'] }}</p>
                <p class="cart-item-price text-muted">
                    R$ {{ number_format($item['preco'], 2, ',', '.') }}
                </p>

                <div class="cart-qty-controls mt-2">
                    <form action="{{ route('remover.item.pedido', $id, $verificadorAlteracao = 'remover') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="cart-qty-btn">-</button>
                    </form>

                    <span class="mx-2 fw-bold">{{ $item['quantidade'] }}</span>

                    <form action="{{ route('adicionar.item.pedido', $id) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="cart-qty-btn">+</button>
                    </form>
                </div>
            </div>

            <form action="{{ url('/pedido/remover-tudo/' . $id) }}" method="POST">
                @csrf
                <button type="submit" class="cart-remove">
                    <svg viewBox="0 0 24 24" width="24">
                        <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zm2.46-7.12l1.41-1.41L12 12.59l2.12-2.12 1.41 1.41L13.41 14l2.12 2.12-1.41 1.41L12 15.41l-2.12 2.12-1.41-1.41L10.59 14l-2.12-2.12z"/>
                    </svg>
                </button>
            </form>
        </div>
    @empty
        <div class="text-center py-5">
            <p class="text-muted">Seu carrinho está vazio.</p>
        </div>
    @endforelse

    <div class="mb-4">
        <a href="{{ route('cardapio.index') }}" class="add-more text-decoration-none">
            + Adicionar mais itens
        </a>
    </div>

    @if(session('carrinho'))
    <form id="form-checkout">
        <hr class="separation-line my-4">

       <!--  <h3 class="section-title">Retirada</h3>
        <div class="mb-4">
            <label class="radio-card d-block mb-2">
                <input type="radio" name="modalidade" value="mesa" onchange="toggleModalidade()">
                <div class="ms-2">
                    <div class="fw-bold">Comer no local</div>
                    <div class="small text-muted">Receber na lanchonete</div>
                </div>
            </label>

            <label class="radio-card d-block">
                <input type="radio" name="modalidade" value="balcao" onchange="toggleModalidade()">
                <div class="ms-2">
                    <div class="fw-bold">Retirada no local</div>
                    <div class="small text-muted">Pronto em cerca de 20 min</div>
                </div>
            </label>
        </div> -->

        <h3 class="section-title">Pagamento</h3>

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

        <div id="methods-presencial" class="payment-methods-grid mb-4">
             <label><input type="radio" name="forma_pagamento" value="dinheiro"><div class="payment-pill">Dinheiro</div></label>
             <label><input type="radio" name="forma_pagamento" value="pix_presencial"><div class="payment-pill">PIX</div></label>
             <label><input type="radio" name="forma_pagamento" value="credito_maquina"><div class="payment-pill">Maquineta</div></label>
        </div>

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
        <div class="container d-flex justify-content-center gap-3">

            <form action="{{ route('pedido.deletar', $id) }}" method="POST" class="w-50">
                @csrf
                @method('DELETE')

                <input type="hidden" name="id" value="{{ $id }}">

                <button class="btn btn-danger w-100 py-4 fw-bold rounded-pill">
                    CANCELAR PEDIDO
                </button>
            </form>

            <form action="{{ route('pagamento.index') }}" method="POST" class="w-50">
                @csrf
                <input type="hidden" name="id" value="{{ old('id') }}">

                <button class="btn btn-primary w-100 py-4 fw-bold rounded-pill">
                    FINALIZAR PEDIDO
                </button>
            </form>

        </div>
    </div>
    @else
    <div class="py-3 text-center text-white small">
        © 2026 - MECDONIN
    </div>
    @endif
</footer>
@endsection