var gulp = require('gulp'),
    config = require('../config'), // Relative to this file
    $ = require('gulp-load-plugins')(),
    beep = require('beepbeep');

/**
 * Sass linting.
 *
 * https://www.npmjs.com/package/sass-lint
 */
gulp.task('sass:lint', ['cssnano'], function() {
	gulp.src([
		'assets/sass/**/*.scss',
		'!assets/sass/base/_normalize.scss',
		'!assets/sass/base/_sprites.scss'
	])
	.pipe($.sassLint())
	.pipe($.sassLint.format())
	.pipe($.sassLint.failOnError());
});
