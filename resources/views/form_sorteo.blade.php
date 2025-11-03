<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Participante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light py-5">
    <div class="container">
        <div class="card shadow-sm p-4 mx-auto" style="max-width: 500px;">
            <h3 class="text-center mb-3">Participa en el sorteo "{{ $sorteo->nombre }}"</h3>
            <p class="text-center text-muted mb-4">Tienda: <strong>{{ $tienda->nombre }}</strong></p>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form method="POST" action="{{ route('participante.store', $slug) }}">
                @csrf

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre completo</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" required
                        value="{{ old('nombre') }}">
                    @error('nombre') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label for="cedula" class="form-label">Cédula</label>
                    <input type="text" name="cedula" id="cedula" class="form-control" required
                        value="{{ old('cedula') }}">
                    @error('cedula') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" name="telefono" id="telefono" class="form-control" required
                        value="{{ old('telefono') }}">
                    @error('telefono') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label for="correo" class="form-label">Correo electrónico (opcional)</label>
                    <input type="email" name="correo" id="correo" class="form-control" value="{{ old('correo') }}">
                    @error('correo') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100" onclick="this.disabled=true; this.form.submit();">
                    Registrar participación
                </button>
            </form>
        </div>
    </div>
</body>
<script>
    // Borra la URL del historial del navegador
    window.history.replaceState({}, document.title, "/sorteos");
</script>

</html>