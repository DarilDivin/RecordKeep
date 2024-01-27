<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Accès Interdit|403</title>
    @vite([
        'resources/css/404.css',
    ])
</head>
<body>
    <div class="Note404">
        <h1>403</h1>
        <p>Accès Interdit</p>
    </div>
    <div class="Image404">
        <img src="{{ asset("storage/images/403.svg") }}" alt="403 Forbidden">
    </div>
</body>
</html>
