const webpack = require('webpack');
const mix = require('laravel-mix');

var path = require('path');
mix.setPublicPath('public');
mix.options({ processCssUrls: false });

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

mix.webpackConfig({
    plugins: [
        new webpack.ProvidePlugin({
            introJs: ['intro.js', 'introJs']
        })
    ],
    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'resources/js/components'),
            '_': path.resolve(__dirname, 'resources/js/views'),
            //'~': path.resolve(__dirname, 'resources/assets/cms/dependencies/js')
        }
    },
    module: {
        loaders: [
            {
                test: /\.json$/,
                exclude: /node_modules/,
                loader: 'json-loader'
            }
        ],
        rules: [
            {
                test: /\.md$/,
                use: 'raw-loader',
            }
        ]
    },
});
