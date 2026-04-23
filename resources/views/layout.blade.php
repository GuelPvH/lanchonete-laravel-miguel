<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MECDONIN | @yield('titulo')</title>
    @vite(['resources/css/app.css', 'resources/css/style.css', 'resources/js/app.js', 'resources/css/app.css'])
    @yield('estilos')
</head>
<body>

    @hasSection('header')
        @yield('header')
    @else
        <header class="logo-container">
            <div class="logo-box">
                <img src="{{ asset('img/logo.png') }}" alt="Logo Lanchonete" class="logo-img">
            </div>
            <h1 style="color: var(--color-primary); font-weight: 800; font-style: italic;">MECDONIN</h1>
            <p class="small" style="font-weight: bold; letter-spacing: 1px;">MISTURA PERFEITA.</p>
        </header>
    @endif

    <main>
        @yield('conteudo')
    </main>

    @hasSection('footer')
        @yield('footer')
    @else
        <footer style="text-align: center; padding: 20px;">
            <p>&copy; {{ date('Y') }} - MECDONIN</p>
        </footer>
    @endif

    @yield('scripts')
</body>
</html>