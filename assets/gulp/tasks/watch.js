var gulp = require('gulp'),
    config = require('../config'), // Relative to this file
    $ = require('gulp-load-plugins')(),
    beep = require('beepbeep');


//****************************
//          Watch
//****************************

gulp.task('watch', function() {
  gulp.watch(config.paths.sass.src, ['sass'])
  .on('change', function(event) {
   console.log('File ' + event.path + ' was ' + event.type + ', running tasks...');
  });
})
