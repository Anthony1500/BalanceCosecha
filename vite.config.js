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
                'resources/css/registerform.css',
                'resources/css/modal.css',
                'resources/css/searchelement.css',
                'resources/sass/inicio.scss',
                'resources/js/script.js',
                'resources/js/script_login.jsx',
                'resources/js/script_mountains.js',
                'resources/js/alertdialog.js',
                'resources/js/registerform.js',
                'resources/js/inicio.js',
                'resources/js/modal.js',
            ],
            refresh: true,
        }),
    ],
    optimizeDeps: {
        include: ['buffer']
    }
});

