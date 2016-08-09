var gulp = require('gulp'),
    config = require('../config'), // Relative to this file
    $ = require('gulp-load-plugins')(),
    beep = require('beepbeep');


    var sassOptions = {
      errLogToConsole: true,
      outputStyle: 'expanded'
    };
    var sassProduction = {
         errLogToConsole: true,
         outputStyle: 'compressed'
    };

    gulp.task('sass', function () {
      return gulp
        .src(config.paths.sass.src)
        .pipe($.plumber({
             errorHandler: function (err) {
                  beep(2);
                  console.log(err);
                  this.emit('end');
               }
        }))
        .pipe($.sourcemaps.init())
        .pipe($.sass(sassOptions))
        .pipe($.autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe($.sourcemaps.write())
        .pipe(gulp.dest(config.paths.project));
    });
