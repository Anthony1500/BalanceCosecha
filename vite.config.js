import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/index.css',
                'resources/css/style_login.css',
                'resources/css/style_mountains.css',
                'resources/css/style_sky.css',
                'resources/css/alertdialog.css',
                'resources/sass/inicio.scss',
                'resources/js/script.js',
                'resources/js/script_login.jsx',
                'resources/js/script_mountains.js',
                'resources/js/alertdialog.js',
            ],
            refresh: true,
        }),
    ],
});

