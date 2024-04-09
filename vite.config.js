import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
import laravel from 'laravel-vite-plugin';
import { fileURLToPath, URL } from "node:url";

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: ['resources/css/app.css', 'resources/vue-client/src/main.js'],
            refresh: true,
        }),
    ],
    build: {
        outDir: 'public/build',
        rollupOptions: {
          input: 'resources/vue-client/src/main.js'
        }
    },
    resolve: {
        alias: {
            "@": fileURLToPath(new URL("./resources/vue-client/src", import.meta.url)),
        },
    },
});