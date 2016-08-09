var gulp = require('gulp'),
    config = require('../config'), // Relative to this file
    $ = require('gulp-load-plugins')(),
    beep = require('beepbeep');


//****************************
// Create Production Ready Assets
//****************************

gulp.task('production', ['production-styles']);

gulp.task('production-styles', function() {
     return gulp
       .src(config.paths.sass.src)
       .pipe($.plumber({
        errorHandler: function (err) {
            beep(2);
            console.log(err);
            this.emit('end');
          }
        }))
       .pipe($.sass(sassProduction))
       .pipe($.autoprefixer({
          browsers: ['last 2 versions'],
          cascade: false
       }))
       .pipe(gulp.dest(config.paths.project));
});
