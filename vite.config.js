import tailwindcss from '@tailwindcss/vite';

import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    base: '/restojossgandos/',
    build: {
        outDir: 'public/build',
    },
    server: {
        hmr: {
            host: 'localhost',
        },
    },
    css: {
        postcss: {
            plugins: [tailwindcss],
        },
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js'
            ],
            refresh: true,
        }),
    ],
});
