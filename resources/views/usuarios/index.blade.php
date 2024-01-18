<!-- resources/views/usuarios/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Lista de Usuarios</title>
</head>
<body>

    <h1>Lista de Usuarios</h1>

    <ul>
        @foreach($usuarios as $usuario)
            <li>
                {{ $usuario->name }}
                <a href="{{ route('usuarios.show', $usuario->id) }}">Detalles</a>
            </li>
        @endforeach
    </ul>

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
