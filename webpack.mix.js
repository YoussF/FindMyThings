const { mix } = require('laravel-mix');






mix.styles([
	    'public/admin_theme/css/sweetalert.css',
	], 'public/admin_theme/css/app.css');

mix.scripts([
        'public/admin_theme/js/sweetalert.min.js',
    ], 'public/admin_theme/js/app.js');