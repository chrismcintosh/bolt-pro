var gulp = require('gulp'),
    config = require('../config'), // Relative to this file
    autoprefixer = require('autoprefixer'),
    $ = require('gulp-load-plugins')(),
    mqpacker = require('css-mqpacker'),
    beep = require('beepbeep');


    var sassOptions = {
      errLogToConsole: true,
      outputStyle: 'compressed'
    };

    gulp.task('production', ['clean-styles'] , function () {
      return gulp
        .src(config.paths.sass.src)
        .pipe($.plumber({
             errorHandler: function (err) {
                  beep(2);
                  console.log(err);
                  this.emit('end');
               }
        }))
        .pipe($.sass(sassOptions))
        // Parse with PostCSS plugins.
        .pipe($.uncss({
             html: [
                  // Add pages that are important here after running
                  // production make sure to check pages manually for proper display
                  'http://foundation.dev',
                  'http://foundation.dev/blog',
                  'http://foundation.dev/sample-page'
             ],
             ignore: [
                  new RegExp('^meta\..*'),
                  new RegExp('.is-.*'),
                  new RegExp('.menu')
             ]
          }))
        .pipe($.postcss([
               autoprefixer({
                    browsers: ['last 2 version']
               }),
               mqpacker({
                    sort:true
               }),
        ]))
        .pipe($.cssnano({
             safe: true // Use safe optimizations
        }))
        .pipe(gulp.dest(config.paths.project));
    });
