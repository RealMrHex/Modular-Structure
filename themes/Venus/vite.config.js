import {defineConfig} from "vite";
import laravel from "laravel-vite-plugin";
export default defineConfig({
    base: "/Venus",
    plugins: [
        laravel({
            input: [
                "/resources/css/app.css",
                "/resources/js/app.js",
            ],
            buildDirectory: "Venus",
            publicDirectory: "./../../public"
        }),
        {
            name: "blade",
            handleHotUpdate({file, server}) {
                if (file.endsWith(".blade.php")) {
                    server.ws.send({
                        type: "full-reload",
                        path: "*",
                    });
                }
            },
        },
    ],
    resolve: {
        alias: {
            '@': '/resources/js',

        }
    },
    server: {
        hmr: {
            host: 'localhost',
        }
    }
});
