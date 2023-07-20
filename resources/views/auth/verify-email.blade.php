<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="../../css/connexion.css"> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Sign in</title>
</head>
<body>
    <div class="bg_ball_style ball1"></div>
    <div class="bg_ball_style ball2"></div>
    <div class="bg_ball_style ball3"></div>

    <div class="container">
        <h3>You must verify you email address, please check your mail for a verification link.</h3>
        @if (session('status'))
        <div class="connexion message success">
            <p style=" color: green;">{{ session('status') }}</p>
        </div>
        @endif
        <form action="{{ route('verification.send') }}" class="connexion-form" method="POST">
            @csrf

            <button type="submit" style="align-self: center">Renvoyer le mail</button>
        </form>
    </div>

    <footer>
        <hr>
        <div class="footer-content">
            <h2> DSI </h2>
            <ul>
                <li class="nav_links"><a href="#">Accueil</a></li>
                <li class="nav_links"><a href="#">Documents</a></li>
                <li class="nav_links"><a href="#">Dossiers</a></li>
                <li class="nav_links"><a href="#">Rechercher</a></li>
            </ul>

            <div class="socials">
                <ion-icon name="logo-facebook"></ion-icon>
                <ion-icon name="logo-google"></ion-icon>
                <ion-icon name="logo-twitter"></ion-icon>
                <ion-icon name="logo-linkedin"></ion-icon>
            </div>

            <div class="copyright">
                © 2023 DSI. All right reserved
            </div>
        </div>
    </footer>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
