<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        {{-- <meta charset="utf-8"> --}}
        <meta charset="UTF-8" />
        <title>@yield('titulo')</title>

        <link rel="stylesheet" href="{{ asset('css/estilo_basico.css') }}">
        
    </head>

    <body>
        @include('site.layouts._partials.topo')
        @yield('conteudo')
    </body>
</html>