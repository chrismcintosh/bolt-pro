//Call The Package Dependencies
var gulp = require('gulp');
var $ = require('gulp-load-plugins')();
var beep = require('beepbeep');

//****************************
//       File Paths
//****************************

var path = {

       SASS_SRC: [
            './assets/scss/*.scss',
            './assets/scss/**/*.scss',
            './bower_components/foundation-sites/assets/scss/*.scss',
            './assets/bower_components/foundation-sites/scss/**/*.scss'
      ],

       SASS_BUILD: './'

};

//****************************
//          SASS
//****************************
// Options
// - Output style: :nested:compact:expanded:compressed

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
    .src(path.SASS_SRC)
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
    .pipe(gulp.dest(path.SASS_BUILD));
});


//****************************
//        Post CSS
//****************************

/**
 * Delete style.css and style.min.css before we minify and optimize
 */
gulp.task('clean:styles', function() {
	return del(['style.css', 'style.min.css'])
});

/**
 * Compile Sass and run stylesheet through PostCSS.
 *
 * https://www.npmjs.com/package/gulp-sass
 * https://www.npmjs.com/package/gulp-postcss
 * https://www.npmjs.com/package/gulp-autoprefixer
 * https://www.npmjs.com/package/css-mqpacker
 */
gulp.task('postcss', ['clean:styles'], function() {
	return gulp.src('assets/sass/*.scss', paths.css)

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
		.pipe($.postcss([
			$.autoprefixer({
				browsers: ['last 2 version']
			}),
			$.mqpacker({
				sort: true
			}),
		]))

	// Create sourcemap.
	.pipe($.sourcemaps.write())

	// Create style.css.
	.pipe(gulp.dest('./'))
});


/**
 * Minify and optimize style.css.
 *
 * https://www.npmjs.com/package/gulp-cssnano
 */
gulp.task('cssnano', ['postcss'], function() {
	return gulp.src('style.css')
	.pipe(plumber({ errorHandler: handleErrors }))
	.pipe(cssnano({
		safe: true // Use safe optimizations
	}))
	.pipe(rename('style.min.css'))
	.pipe(gulp.dest('./'))
	.pipe(browserSync.stream());
});


//****************************
//          Watch
//****************************

gulp.task('watch', function() {
  gulp.watch(path.SASS_SRC, ['sass'])
  .on('change', function(event) {
   console.log('File ' + event.path + ' was ' + event.type + ', running tasks...');
  });
})

//****************************
//        Default Task
//****************************

gulp.task('default', ['sass', 'watch']);


//****************************
// Create Production Ready Assets
//****************************

gulp.task('production', ['production-styles']);

gulp.task('production-styles', function() {
     return gulp
       .src(path.SASS_SRC)
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
       .pipe(gulp.dest(path.SASS_BUILD));
});
