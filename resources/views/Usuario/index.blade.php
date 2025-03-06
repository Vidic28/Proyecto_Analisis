<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuario</title>
</head>
<body>
    <h1>Registrar Usuario</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf
        <label for="id_usuario">ID Usuario:</label>
        <input type="text" id="id_usuario" name="id_usuario" value="{{ old('id_usuario') }}" required>
        @error('id_usuario')
            <span>{{ $message }}</span>
        @enderror

        <label for="nombre_usuario">Nombre:</label>
        <input type="text" id="nombre_usuario" name="nombre_usuario" value="{{ old('nombre_usuario') }}" required>
        @error('nombre_usuario')
            <span>{{ $message }}</span>
        @enderror

        <label for="correo">Correo Electrónico:</label>
        <input type="email" id="correo" name="correo" value="{{ old('correo') }}" required>
        @error('correo')
            <span>{{ $message }}</span>
        @enderror

        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required>
        @error('contrasena')
            <span>{{ $message }}</span>
        @enderror

        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" value="{{ old('telefono') }}" required>
        @error('telefono')
            <span>{{ $message }}</span>
        @enderror

        <label for="estado">Estado:</label>
        <input type="text" id="estado" name="estado" value="{{ old('estado') }}" required>
        @error('estado')
            <span>{{ $message }}</span>
        @enderror

        <button type="submit">Registrar</button>
    </form>
</body>
</html>

