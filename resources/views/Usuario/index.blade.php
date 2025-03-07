<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuario</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="container">
        <h1>Registrar Usuario</h1>

        @if(session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif

        <form action="{{ route('Usuario') }}" method="POST">
            @csrf
            <label for="codigo">Codigo Usuario:</label>
            <input type="text" id="codigo" name="codigo" required>
            @error('codigo')
                <span class="error">{{ $message }}</span>
            @enderror

            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            @error('nombre')
                <span class="error">{{ $message }}</span>
            @enderror

            <label for="correo_u">Correo Electrónico:</label>
            <input type="email" id="correo_u" name="correo_u" required>
            @error('correo_u')
                <span class="error">{{ $message }}</span>
            @enderror

            <label for="contra">Contraseña:</label>
            <input type="password" id="contra" name="contra" required>
            @error('contra')
                <span class="error">{{ $message }}</span>
            @enderror

            <label for="numero">Teléfono:</label>
            <input type="number" id="numero" name="numero" required>
            @error('numero')
                <span class="error">{{ $message }}</span>
            @enderror

            <label for="estado">Estado:</label>
            <input type="text" id="estado" name="estado" required>
            @error('estado')
                <span class="error">{{ $message }}</span>
            @enderror

            <button type="submit">Registrar</button>
        </form>
    </div>
</body>
</html>
