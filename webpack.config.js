const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');
const TerserPlugin = require('terser-webpack-plugin');

module.exports = {
    mode: 'production', // Change to 'development' for debugging
    devtool: 'source-map', // Enable source maps
    entry: {
        script: './assets/src/js/main.js'
    },
    output: {
        path: path.resolve(__dirname, 'assets'),
        filename: 'js/[name].min.js',
    },
    module: {
        rules: [
            {
                test: /\.scss$/,
                use: [
                    MiniCssExtractPlugin.loader,
                    'css-loader',
                    {
                        loader: 'sass-loader',
                        options: {
                            implementation: require('sass'), // Ensure it uses the latest Dart Sass API
                        }
                    }
                ]
            }
        ]
    },
    optimization: {
        minimize: true,
        minimizer: [
            new TerserPlugin({
                extractComments: false, // Disable license comments
                terserOptions: {
                    sourceMap: true, // Enable JS source maps
                    compress: true,
                },
            }),
            new CssMinimizerPlugin()
        ],
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: 'css/styles.min.css'
        })
    ]
};
