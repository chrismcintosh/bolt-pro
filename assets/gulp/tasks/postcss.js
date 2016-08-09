var gulp = require('gulp'),
    config = require('../config'), // Relative to this file
    $ = require('gulp-load-plugins')(),
    beep = require('beepbeep'),
    mqpacker = require('css-mqpacker');

    /**
     * Handle errors and alert the user.
     */
     function handleErrors () {
         var args = Array.prototype.slice.call(arguments);

         notify.onError({
              title: 'Task Failed [<%= error.message %>',
              message: 'See console.',
              sound: 'Sosumi' // See: https://github.com/mikaelbr/node-notifier#all-notification-options-with-their-defaults
         }).apply(this, args);

         gutil.beep(); // Beep 'sosumi' again

         // Prevent the 'watch' task from stopping
         this.emit('end');
    }
/**
 * Compile Sass and run stylesheet through PostCSS.
 *
 * https://www.npmjs.com/package/gulp-sass
 * https://www.npmjs.com/package/gulp-postcss
 * https://www.npmjs.com/package/gulp-autoprefixer
 * https://www.npmjs.com/package/css-mqpacker
 */
gulp.task('postcss', ['clean-styles'], function() {
	return gulp.src(config.paths.sass.src)

	// Deal with errors.
	.pipe($.plumber({ errorHandler: handleErrors }))

	// Wrap tasks in a sourcemap.
	.pipe($.sourcemaps.init())
		// Compile Sass using LibSass.
		.pipe($.sass({
			errLogToConsole: true,
			outputStyle: 'expanded' // Options: nested, expanded, compact, compressed
		}))

          // Parse with PostCSS plugins.
          		.pipe(postcss([
          			autoprefixer({
          				browsers: ['last 2 version']
          			}),
          			mqpacker({
          				sort: true
          			}),
          		]))

	// Create sourcemap.
	.pipe($.sourcemaps.write())

	// Create style.css.
	.pipe(gulp.dest('./'))
});
