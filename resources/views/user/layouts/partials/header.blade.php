<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,900&display=swap" rel="stylesheet">
    <title>@yield('title') | RecordKeep</title>
    @livewireStyles()
    @vite([
        'resources/css/app.css',

        'resources/js/app.js',
        'resources/js/script.js',
        'resources/js/home.js',
        'resources/js/DemandePrêt.js',
        'resources/js/DocumentPage.js',
])
</head>
<body class="user">
    <div class="bg_ball_style ball1"></div>
    <div class="bg_ball_style ball2"></div>
