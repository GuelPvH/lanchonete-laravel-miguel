<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MECDONIN | @yield('titulo')</title>
    @vite([
        'resources/css/app.css',
        'resources/js/app.js',
    ])

    @yield('estilos')
</head>
<body class="auth-body">
    <main class="auth-main">
        @yield('conteudo')
    </main>

    @yield('scripts')
</body>
</html>
