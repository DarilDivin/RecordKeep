<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Page Introuvable|404</title>
    @vite([
        'resources/css/404.css',
    ])
</head>
<body>
    <div class="Note404">
        <h1>404</h1>
        <p>L'URL demandée est introuvable sur ce serveur.</p>
    </div>
    <div class="Image404">
   <img src="{{ asset("storage/images/404.svg") }}" alt="404 Not Found">

    </div>
</body>
</html>
