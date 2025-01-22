import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/services/usuario-service.js'
            ],
            refresh: true,
        }),
    ],
    server: {
        host: true,
        port: 8000
    },
    preview: {
        host: true,
        port: 8000
    }
});
