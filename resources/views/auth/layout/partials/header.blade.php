<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.png') }}">
    @vite([
        'resources/css/app.css',
        'resources/css/body.css',
        'resources/css/Connexion.css',
        'resources/css/Footer.css',
        'resources/js/app.js',
    ])
    <title>@yield('title')</title>
</head>
<body>
    <div class="bg_ball_style ball1"></div>
    <div class="bg_ball_style ball2"></div>
