<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="../css/DocumentPage.css"> --}}
    <title>@yield('title') | RecordKeep</title>
    @vite([
                'resources/css/app.css',
                
                'resources/js/app.js',
                'resources/js/script.js',
                'resources/js/home.js',
                'resources/js/Dashboard-Document-Management.js',
                'resources/js/Dashboard-User-Management.js',
                'resources/js/Dashboard-Statistiques.js',
                'resources/js/DocumentPage.js',
    ])
</head>
<body class="user">
    <div class="bg_ball_style ball1"></div>
    <div class="bg_ball_style ball2"></div>
