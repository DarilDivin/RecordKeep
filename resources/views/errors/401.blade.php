<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Session expirée|401</title>
    @vite([
        'resources/css/404.css',
    ])
</head>
<body>
    <div class="Note404">
        <h1>405</h1>
        <p>Votre session a expiré, vous devez vous reconnecter.</p>
    </div>
    <div class="Image404">
   <img src="{{ asset("") }}" alt="Session expirée">

    </div>
</body>
</html>
