import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
 
export default defineConfig({
    plugins: [
        laravel({
            input: [
              'resources/css/app.css',
              'resources/js/app.js',
              'public/assets/js/theme.js',
              'public/assets/js/plugins.js',
              'public/js/bootstrap.bundle-5.2.3.min.js',
              'public/js/validatorjs.min.js',
              'public/js/main.js'
              ],
            refresh: true,
        }),
    ]
});


