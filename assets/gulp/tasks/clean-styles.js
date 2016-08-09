var gulp = require('gulp'),
    config = require('../config'), // Relative to this file
    $ = require('gulp-load-plugins')(),
    beep = require('beepbeep');




gulp.task('clean-styles', function () {
    return gulp.src(config.paths.sass.build, {read: false})
        .pipe($.clean());
});
