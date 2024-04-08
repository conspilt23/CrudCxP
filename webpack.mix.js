const mix = require('laravel-mix');
require('laravel-mix-vue3');

mix.js('resources/vue-client/src/main.js', 'public/js')
    .vue();