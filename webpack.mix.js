const mix = require('laravel-mix');

mix.postCss('resources/css/public.css', 'public/css/tobenski-take-away-public.css', [
	require('tailwindcss'),
	require('postcss-nested')
])
.options({
	processCssUrls: false
});