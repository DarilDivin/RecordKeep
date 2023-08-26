<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
    />
    <title>@yield('title') | RecordKeep</title>
    @livewireStyles()
    @vite([
                'resources/css/app.css',

                'resources/js/app.js',
                'resources/js/script.js',
                'resources/js/home.js',
                'resources/js/DemandePrêt.js',
                'resources/js/Dashboard-Document-Management.js',
                'resources/js/Dashboard-User-Management.js',
                'resources/js/Dashboard-Statistiques.js',
                'resources/js/DocumentPage.js',
                'resources/js/DemandePrêt.js',
    ])
</head>
<body class="user">
    <div class="bg_ball_style ball1"></div>
    <div class="bg_ball_style ball2"></div>
