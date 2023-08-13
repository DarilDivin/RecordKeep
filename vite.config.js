import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                // 'resources/css/body.css',
                // 'resources/css/Dashboard-User-Document-Management.css',
                // 'resources/css/DemandePrêt.css',
                // 'resources/css/documentForm.css',
                // 'resources/css/DocumentPage.css',
                // 'resources/css/Footer.css',
                // 'resources/css/HomePage.css',
                // 'resources/css/navbar.css',
                // 'resources/css/secretary-Dashboard.css',
                // 'resources/css/Statistiques.css',
                // 'resources/css/style.css',
                // 'resources/css/Utilité.css',
                // 'resources/css/pagination.css',


                'resources/js/app.js',
                'resources/js/script.js',
                'resources/js/home.js',
                'resources/js/Dashboard-Document-Management.js',
                'resources/js/Dashboard-User-Management.js',
                'resources/js/Dashboard-Statistiques.js',
                'resources/js/DocumentPage.js',

            ],
            refresh: true,
        }),
    ],
});
