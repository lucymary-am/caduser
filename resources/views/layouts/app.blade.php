<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Desafio Técnico')</title>
    <!-- Adicione seus estilos aqui -->
    
    @vite('resources/js/app.js')
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/default.min.css"/>
</head>
<body>
    <main>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="container my-4 px-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="h3">@yield('title')</h1>
                @yield('opcoes')
            </div>
    
            @yield('content')
        </div>
    </main>

    <footer>
        <p style="text-align: center">&copy; {{ date('Y') }} Desafio Técnico - Cadastro de usuários.</p>
    </footer>

</body>
</html>
