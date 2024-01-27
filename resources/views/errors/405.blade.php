<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Méthode non supportée|405</title>
    @vite([
        'resources/css/404.css',
    ])
</head>
<body>
    <div class="Note404">
        <h1>405</h1>
        <p>Impossible d'accéder à cette page via la méthode GET.</p>
    </div>
    <div class="Image404">
   <img src="{{ asset("storage/images/404.svg") }}" alt="Non supportée">

    </div>
</body>
</html>
