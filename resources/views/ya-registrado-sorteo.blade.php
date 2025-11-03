<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Ya estás participando</title>
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
        <h4 class="text-success mb-3">✅ Ya estás participando</h4>
        <p>Gracias, {{ $participante->nombre }}. Ya registramos tu participación en este sorteo.</p>
        <p class="text-muted"> <span style="color: #f9fafb;" id="countdown">3</span> </p>
    </div>

    <script>
        window.history.replaceState({}, document.title, "/sorteos");

        let timeLeft = 3;
        const countdown = document.getElementById('countdown');
        const timer = setInterval(() => {
            timeLeft--;
            countdown.textContent = timeLeft;
            if (timeLeft <= 0) {
                clearInterval(timer);
                window.close();
            }
        }, 1000);
    </script>
</body>

</html>