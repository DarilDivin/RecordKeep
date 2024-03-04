import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/404.css',

                'resources/js/app.js',
                'resources/js/script.js',
                'resources/js/home.js',
                'resources/js/Dashboard-Document-Management.js',
                'resources/js/Dashboard-User-Management.js',
                'resources/js/Dashboard-Statistiques.js',
                'resources/js/DocumentPage.js',
                'resources/js/DemandePrêt.js',
                'resources/js/Dashboard.js',
                'resources/js/sidebar.js',
            ],
            refresh: true,
        }),
    ],
});
