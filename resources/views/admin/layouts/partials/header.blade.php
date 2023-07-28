<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    {{-- @yield('style') --}}
    @vite([
        'resources/css/app.css',
        'resources/css/body.css',
        'resources/css/Dashboard-User-Document-Management.css',
        'resources/css/DemandePrêt.css',
        'resources/css/documentForm.css',
        'resources/css/DocumentPage.css',
        // 'resources/css/FolderContentPage.css',
        // 'resources/css/FolderPage.css',
        'resources/css/Footer.css',
        'resources/css/HomePage.css',
        'resources/css/navbar.css',
        // 'resources/css/secretary-Dashboard.css',
        'resources/css/Statistiques.css',
        'resources/css/style.css',
        'resources/css/Utilité.css',


        'resources/js/app.js',
        'resources/js/script.js',
        'resources/js/home.js',
        'resources/js/secretary-Dashboard.js',
/*         'resources/js/Dashboard-Document-Management.js',
        'resources/js/Dashboard-User-Management.js',
        'resources/js/Dashboard-Statistiques.js', */
        'resources/js/DocumentPage.js',
])

</head>
<body class="dash">
    <div class="bg_ball_style ball1"></div>
    <div class="bg_ball_style ball2"></div>
    <div class="bg_ball_style ball3"></div>

