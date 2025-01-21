const mix = require('laravel-mix');

mix.sass('resources/sass/app.scss', 'public/css')
   .js('resources/js/app.js', 'public/js')
   .js('resources/js/UsuarioDao.js', 'public/js')
   .version(); 