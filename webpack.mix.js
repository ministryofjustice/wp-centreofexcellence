const mix = require('laravel-mix');

mix.setPublicPath('./dist/');

mix.js('assets/scripts/main.js', 'js')
    .sass('assets/styles/main.scss', 'css/main.css')
    .options({
        processCssUrls: false
    })
    .sass('assets/styles/editor.scss', 'css/editor.css')
    .copy('assets/fonts/*', 'dist/fonts/')
    .copy('assets/images/*.{jpg,jpeg,png,gif,svg,ico}', 'dist/images/');

if (mix.inProduction()) {
    mix.version();
} else {
    mix.sourceMaps();
}
