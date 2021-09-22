const path = require('path')
const mix = require('laravel-mix');

const sassFileList = [
    'build/scss/common',
    'partials/pages/scss/index',
    'partials/pages/catalog/scss/catalog-card'
];

const jsFileList = [
    'build/js/common',
    'partials/pages/ts/index',
    'partials/pages/catalog/ts/catalog-category',
    'partials/pages/catalog/ts/catalog-card'
];

mix.setPublicPath('assets/')
mix.webpackConfig({
    resolve: {
        modules: [
            path.resolve(__dirname, 'node_modules')
        ]
    }
});
mix.postCss('build/css/tailwind.css', 'css/tailwind.css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('postcss-gap-properties'),
    require('autoprefixer'),
])

jsFileList.forEach(fileName => mix.ts(`./${fileName}.ts`, 'js'));
sassFileList.forEach(
    fileName => mix.sass(`./${fileName}.scss`, 'css')
        .options({processCssUrls: false})
);


mix.sourceMaps(true, 'source-map');
mix.version()
