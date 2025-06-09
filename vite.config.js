import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        host: '0.0.0.0', // <--- Importante: Vite escucha en todas las interfaces dentro del contenedor
        port: 5173,      // Puerto por defecto de Vite
        hmr: {
            host: 'localhost', // <--- Importante: El host que tu navegador usará para HMR
            clientPort: 5173,  // El puerto que tu navegador usará para HMR
            protocol: 'ws',    // Usa WebSocket para HMR
        },
        watch: {
            usePolling: true // A veces es necesario en entornos Docker si las actualizaciones no se detectan
        }
    },
});
