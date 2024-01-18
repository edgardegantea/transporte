<!DOCTYPE html>
<html>
<head>
    <title>Detalle del Usuario</title>
</head>
<body>

    <h1>Detalle del Usuario</h1>

    <p><strong>Nombre:</strong> {{ $detalleUsuario->nombre }}</p>
    <p><strong>Apellido Paterno:</strong> {{ $detalleUsuario->apellidoPaterno }}</p>
    <p><strong>Apellido Materno:</strong> {{ $detalleUsuario->apellidoMaterno }}</p>
    <p><strong>Sexo:</strong> {{ $detalleUsuario->sexo }}</p>
    <p><strong>Fecha de Nacimiento:</strong> {{ $detalleUsuario->fechaNacimiento }}</p>

</body>
</html>
