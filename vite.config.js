import tailwindcss from '@tailwindcss/vite';

import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    base: '/restojossgandos/', 
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],

	css: {
        postcss: {
            plugins: [tailwindcss],
        },
    },
    build: {
        outDir: 'public/build',
        emptyOutDir: true,
    },
});
