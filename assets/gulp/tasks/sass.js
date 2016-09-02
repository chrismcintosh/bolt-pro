var gulp = require('gulp'),
    config = require('../config'), // Relative to this file
    autoprefixer = require('autoprefixer'),
    $ = require('gulp-load-plugins')(),
    mqpacker = require('css-mqpacker'),
    beep = require('beepbeep'),
    browsersync = require('browser-sync'); // create a browser sync instance.


    var sassOptions = {
      errLogToConsole: true,
      outputStyle: 'expanded',
      includePaths: ['node_modules/motion-ui/src']
    };

    gulp.task('sass', ['clean-styles'] , function () {
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
        // Parse with PostCSS plugins.
        .pipe($.postcss([
               autoprefixer({
                    browsers: ['last 2 version']
               }),
               mqpacker({
                    sort:true
               }),
        ]))
        .pipe($.sourcemaps.write())
        .pipe(gulp.dest(config.paths.project))
        .pipe(browsersync.reload({stream: true}));
    });
