import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/css/style.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server:{
        host: '0.0.0.0',
        port: 5173,
        hmr: {
            protocol: 'ws', // ou 'wss' para HTTPS
            host: '10.23.3.22',
        }
    }
});
