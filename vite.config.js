import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

// refresh: true is the default, sometimes will not work
// so the refresh is updated.
export default defineConfig({
    server: {
        hmr: {
            host: 'localhost'
        },
    },

    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            // refresh: [
            //     'routes/**',
            //     'resources/views/**',
            // ],
            refresh: true,
        }),
    ],
});
