var gulp = require('gulp'),
    config = require('../config'), // Relative to this file
    browsersync = require('browser-sync'); // create a browser sync instance.



gulp.task('browsersync', ['sass'], function() {
    browsersync.init({
       proxy: "foundation.dev", // makes a proxy for localhost:8080
       open: true
    });
});
