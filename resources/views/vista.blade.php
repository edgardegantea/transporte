<!DOCTYPE html>
<html>
<head>
    <title>Mostrar Usuario</title>
</head>
<body>

    @if(Auth::check())
        <p>Bienvenido, {{ $usuario->name }}</p>
        
        @if($infoRelacionada)
            <p>Información Relacionada: {{ $infoRelacionada->nombre }}, {{ $infoRelacionada->apellidoPaterno }}</p>
            <!-- Muestra más detalles según sea necesario -->
        @else
            <p>No hay información relacionada disponible.</p>
        @endif

    @else
        <p>No hay un usuario autenticado.</p>
    @endif

</body>
</html>
