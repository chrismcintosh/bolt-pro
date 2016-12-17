var gulp = require('gulp'),
    config = require('../config'), // Relative to this file
    $ = require('gulp-load-plugins')(),
    beep = require('beepbeep'),
    babel = require('gulp-babel'),
    browsersync = require('browser-sync'); // create a browser sync instance.

// Combine JavaScript into one file
// In production, the file is minified
gulp.task('javascript', function () {
     return gulp
          .src(config.paths.javascript.foundation)
          .pipe($.sourcemaps.init())
          .pipe($.babel({
               ignore: ['what-input.js'],
               presets: ['es2015']
          }))
          .pipe($.concat('scripts.js'))
          .pipe($.uglify()
               .on('error', e => { console.log(e); })
          )
          .pipe(gulp.dest(config.paths.javascript.script));
});
