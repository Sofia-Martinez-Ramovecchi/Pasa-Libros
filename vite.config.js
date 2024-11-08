import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

// Especificar la extensión de los archivos .mjs para manejar correctamente ESM
export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    // Asegúrate de especificar una extensión para los módulos ESM
    resolve: {
        alias: {
            '@': '/resources/js', // Puedes modificar esto si es necesario
        },
    },
});
