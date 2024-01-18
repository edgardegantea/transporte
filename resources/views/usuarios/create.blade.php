<!-- resources/views/usuarios/create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Agregar Información Relacionada</title>
</head>
<body>

    <h1>Agregar Información Relacionada</h1>

    <form action="{{ route('usuarios.create') }}" method="post">
        @csrf
        <!-- Campos del formulario -->
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" required>
        
        <label for="apellidoPaterno">Apellido Paterno:</label>
        <input type="text" name="apellidoPaterno" required>

        <label for="apellidoMaterno">Materno:</label>
        <input type="text" name="apellidoMaterno" required>
        
        <label for="sexo">Sexo:</label>
        <input type="text" name="sexo" required>

        <label for="fechaDeNacimiento">Nacimiento:</label>
        <input type="date" name="fechaDeNacimiento" required>

        <input type="submit" value="Guardar">
    </form>

</body>
</html>
