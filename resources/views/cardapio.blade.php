@extends('layout')

@section('titulo', 'Cardápio')

@section('estilos')
<style>
    .page-header {
        background-color: var(--color-background);
        position: sticky;
        top: 0;
        z-index: 100;
        padding: var(--spacing-sm) var(--spacing-md) 0 var(--spacing-md);
        border-bottom: 1px solid var(--color-border);
    }
</style>
@endsection

@section('header')
<div class="page-header">
    <h2 class="mb-sm">Cardápio</h2>
    
    <div class="category-scroll">
        @foreach($categorias ?? ['Todos os Lanches'] as $index => $cat)
            <div class="category-pill {{ $index === 0 ? 'active' : '' }}">
                {{ $cat }}
            </div>
        @endforeach
    </div>
</div>
@endsection

@section('conteudo')
<div class="container">
    @foreach($produtos as $prod)
        <a href="{{ route('produto.show', ['id' => $prod->id ?? $loop->index]) }}" class="product-card" style="text-decoration: none;">
            <div class="product-info"  >
                <h3 class="product-title">{{ $prod->nome }}</h3>
                <p class="product-desc small">Lanche Fresquinho</p>
                <div class="product-price">R$ {{ number_format($prod->preco, 2, ',', '.') }}</div>
            </div>
        </a>
    @endforeach
    
    <div style="text-align: center; margin-top: 30px; margin-bottom: 20px;">
        <a href="{{ route('produto.novo') }}" style="display:inline-block; padding: 10px 20px; background: var(--color-primary); color: white; border-radius: 8px; text-decoration: none; font-weight: bold; border: 1px solid var(--color-primary);">+ Adicionar Novo Produto</a>
    </div>

    <div style="height: 40px;"></div>
</div>
@endsection

@section('footer')
<div class="sticky-footer">
    <div class="sticky-footer-inner">
        <a href="{{ route('cardapio.index') }}" class="nav-item active">
            <svg viewBox="0 0 24 24"><path d="M4 6H2v14c0 1.1.9 2 2 2h14v-2H4V6zm16-4H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm0 14H8V4h12v12z"/></svg>
            Cardápio
        </a>
        
        <a href="{{ route('pedido.ver') }}" class="nav-item">
            @if(session('carrinhoCount', 0) > 0)
                <span class="cart-badge" data-count="{{ session('carrinhoCount') }}">
                    {{ session('carrinhoCount') > 99 ? '99+' : session('carrinhoCount') }}
                </span>
            @endif
            <svg viewBox="0 0 24 24"><path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zm10 0c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2zm-9.83-3.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.86-7.01L19.42 4h-.01l-1.1 2-2.76 5H8.53l-.13-.27L6.16 6l-.95-2-.94-2H1v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.13 0-.25-.11-.25-.25z"/></svg>
            Carrinho
        </a>
        
        <a href="{{ url('/perfil') }}" class="nav-item">
            <svg viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
            Perfil
        </a>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.querySelectorAll('.category-pill').forEach(pill => {
        pill.addEventListener('click', function() {
            document.querySelectorAll('.category-pill').forEach(p => p.classList.remove('active'));
            this.classList.add('active');
        });
    });
</script>
@endsection