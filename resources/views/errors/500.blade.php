<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Erreur de Serveur interne|500</title>
    @vite([
        'resources/css/app.css',
    ])
</head>
<body>
    <div class="Note404">
        <h1>500</h1>
        <p>Erreur interne du serveur</p>
    </div>
    <div class="Image404">
        <img src="{{ asset("storage/images/500.svg") }}" alt="500 Internal Server Error">
    </div>
</body>
</html>
