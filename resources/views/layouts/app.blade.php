<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        @yield('element')
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    </head>
    <body>
        <nav>
            <ul>
                <a href="{{route('home')}}"><li>Inicio (concepto)</li></a>
                <a href="{{route('view.provider')}}"><li>Proveedores</li></a>
                <a href="{{route('view.document')}}"><li>Documentos por pagar</li></a>
                <a href="{{route('view.asiento')}}"><li>Asientos contables</li></a>
            </ul>
        </nav>
        @yield('content')
    </body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</html>
