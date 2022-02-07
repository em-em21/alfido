const mix = require('laravel-mix');

// JS
mix
  // TODO: merge in one file and execute conditionally
  // .js('resources/js/guest.js', 'public/js/scripts')
  .js('resources/js/auth.js', 'public/js/scripts')
  .js('resources/js/admin.js', 'public/js/scripts')
  .js('resources/js/user.js', 'public/js/scripts')
  // Include webpack polyfills since they are "no longer the case in webpack >= 5"
  // In the first place these polyfills were needed for ccxt to work properly
  .webpackConfig({
    resolve: {
      fallback: {
        process: require('node-libs-browser').process,
        buffer: require('node-libs-browser').buffer,
        zlib: require('node-libs-browser').zlib,
        http: require('node-libs-browser').http,
        https: require('node-libs-browser').https,
        constants: require('node-libs-browser').constants,
        stream: require('node-libs-browser').stream,
        crypto: require('node-libs-browser').crypto,
      },
    },
  });

// SCSS
mix
  .sass('resources/sass/app.scss', 'public/css')
  .postCss('resources/css/tailwind.css', 'public/css', [require('tailwindcss')])
  .options({ processCssUrls: false })
  .browserSync('http://127.0.0.1:8000')
  .disableSuccessNotifications();
