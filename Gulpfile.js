//Call The Package Dependencies
var gulp = require('gulp');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var plumber = require('gulp-plumber');

//Sass Variables
var sassInput = './assets/scss/*.scss';
var sassOutput = './';

//Sass Options
var sassOptions = {
  errLogToConsole: true,
  outputStyle: 'compressed'
};

gulp.task('sass', function () {
  return gulp
    .src(sassInput)
    .pipe(plumber())
    // Comment Out Before Production
    // .pipe(sourcemaps.init())
    .pipe(sass(sassOptions).on('error', sass.logError))
    //Comment Out Before Production
    // .pipe(sourcemaps.write())
    .pipe(gulp.dest(sassOutput));
});


gulp.task('watch', function() {
  return gulp
    // Watch the input folder for change,
    // and run `sass` task when something happens
    .watch([sassInput, './assets/sass/**/*.scss'], ['sass'])
    // When there is a change,
    // log a message in the console
    .on('change', function(event) {
      console.log('File ' + event.path + ' was ' + event.type + ', running tasks...');
    });
});

gulp.task('default', ['sass', 'watch']);
