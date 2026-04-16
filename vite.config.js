import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
<<<<<<< HEAD
            input: ['resources/css/app.css', 'resources/css/style.css', 'resources/js/app.js'],
=======
            input: ['resources/css/app.css', 'resources/js/app.js'],
>>>>>>> ff8a8ab084d655de4dc946811501250188d2a0b3
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
