import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'node_modules/jquery/dist/jquery.min.js',
                'node_modules/devextreme/bundles/dx.all.js',
                'node_modules/devexpress-gantt/dist/dx-gantt.min.js',
                'resources/flowbit/flowbit.js',
                'node_modules/devexpress-gantt/dist/dx-gantt.min.css',
                'node_modules/devextreme/dist/css/dx.light.css',
            ],
            refresh: true,
        }),
    ],
});
