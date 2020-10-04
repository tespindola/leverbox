<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- Generamos el token de seguridad para las peticiones POST --}}
        <meta content="{{ csrf_token() }}" name="csrf-token" />

        <title>Leverbox</title>
        
        {{-- Llamamos al archivo generado con webpack --}}
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    </head>
    <body>
        {{-- Div donde se renderizara todo Vuejs --}}
        <div id="app"></div>

        {{-- Llamamos al archivo generado con webpack --}}
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
