import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import htmlPurge from 'vite-plugin-purgecss';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
              'resources/css/dashboard.css',
              'resources/js/dashboard.js',
              'resources/css/app.css',
              'resources/js/app.js',
              ],
            refresh: true,
        }),
        htmlPurge({
            content: [
            './resources/**/*.php',
            './public/css/fancybox.css',
            './public/css/select2.min.css',
            './public/css/select2-bootstrap-5-theme.rtl.min.css',
            './public/css/croppie.min.css',
            ]
        }),
        vue(),
        
    ]

});