const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// Definimos que el simbolo @ representara la ruta absoluta hasta la carpeta resources/js, de esta manera nos ahorramos tener que escribir la ruta completa.
mix.webpackConfig({
    resolve: {
        extensions: ['.js', '.vue'],
        alias: {
            '@': __dirname + '/resources/js'
        }
    }
});

// Genera el archivo app.js con el contido de nuestros scripts y tambien el archivo app.css con los estilos.
mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');