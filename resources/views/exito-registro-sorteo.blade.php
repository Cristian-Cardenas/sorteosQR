<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro Exitoso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f9fafb;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            max-width: 400px;
            text-align: center;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="card p-4">
        <h4 class="text-success mb-3">✅Registro exitoso</h4>
        <p>Gracias, {{ $participante->nombre }}. Ya participas en este sorteo.</p>
    </div>

    <script>
        window.history.replaceState({}, document.title, "/sorteos");
        setTimeout(() => window.close(), 5000);

    </script>
</body>

</html>