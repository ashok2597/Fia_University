let mix = require('laravel-mix');
require('laravel-mix-polyfill');

// const variables = require('./css-variables');

const mode = process.env.NODE_ENV;
const isMode = (m) => m == mode;

const dir = './';

const options = {
  globalVueStyles: './src/styles/base/_index.scss',
  processCssUrls: false,
  autoprefixer: { options: { remove: false, } },
  postCss: [
    require('autoprefixer'),
    require('postcss-css-variables')({
      // variables,
      preserve: true,
      preserveInjectedVariables: false,
    }),
  ]
};

mix
  .js(dir + '/src/scripts/index.js', dir + '/assets/scripts/app.js')
  .sass(dir + '/src/styles/index.scss', dir + '/assets/styles/fiauniversity-core.css')
  .sourceMaps()
  .options(options)
  .polyfill({
    enabled: true,
    useBuiltIns: "usage",
    targets: { "firefox": "50", "ie": 11 }
  })

mix.browserSync({
  proxy: 'https://fia.university.test',
  files: [
    dir + '/*.php',
    dir + '/partials/*.php',
    dir + '/style.css',
    dir + '/assets/styles/*.css',
    dir + '/assets/styles/fiauniversity-core.css',
    dir + '/assets/scripts/app.js',
  ],
  https: {
    key: "./localhost+1-key.pem",
    cert: "./localhost+1.pem",
  },
});