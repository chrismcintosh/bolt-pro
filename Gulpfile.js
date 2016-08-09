var requireDir = require('require-dir');
requireDir('./assets/gulp/tasks', { recurse: true });
var config = require('./assets/gulp/config'); // Relative to this file

//Call The Package Dependencies
var gulp = require('gulp');
var $ = require('gulp-load-plugins')();
var beep = require('beepbeep');

//****************************
//        Default Task
//****************************
gulp.task('default', ['sass', 'watch']);
