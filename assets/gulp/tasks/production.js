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

    gulp.task('production', ['clean-styles', 'cssnano'] , function () {
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
        .pipe($.postcss([
               autoprefixer({
                    browsers: ['last 2 version']
               }),
               mqpacker({
                    sort:true
               }),
        ]))
        .pipe(gulp.dest(config.paths.project));
    });
