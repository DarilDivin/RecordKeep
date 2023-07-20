import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/style.css',
                'resources/css/Dashboard-User-Document-Management.css',
                'resources/css/Statistiques.css',
                'resources/css/DocumentPage.css',
                'resources/css/FolderContentPage.css',
                'resources/css/FolderPage.css',
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
