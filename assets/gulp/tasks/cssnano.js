var gulp = require('gulp'),
    config = require('../config'), // Relative to this file
    $ = require('gulp-load-plugins')(),
    beep = require('beepbeep');

    /**
     * Minify and optimize style.css.
     *
     * https://www.npmjs.com/package/gulp-cssnano
     */
    gulp.task('cssnano', ['sass'], function() {
    	return gulp.src('style.css')
    	.pipe($.plumber())
    	.pipe($.cssnano({
    		safe: true // Use safe optimizations
    	}))
    	.pipe($.rename('style.min.css'))
    	.pipe(gulp.dest('./'));
    });
