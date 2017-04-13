'use strict';

import plugins  from 'gulp-load-plugins';
import yargs    from 'yargs';
import browser  from 'browser-sync';
import gulp     from 'gulp';
import yaml     from 'js-yaml';
import fs       from 'fs';

// Load all Gulp plugins into one variable
const $ = plugins();

// Check for --production flag
const PRODUCTION = !!(yargs.argv.production);

// Load settings from settings.yml
const { COMPATIBILITY, PORT, PROXY, UNCSS_OPTIONS, PATHS } = loadConfig();

function loadConfig() {
  let ymlFile = fs.readFileSync('config.yml', 'utf8');
  return yaml.load(ymlFile);
}

// Build the "dist" folder by running all of the below tasks
// gulp.task('build',
//  gulp.series(clean, gulp.parallel(pages, sass, javascript, images, copy), styleGuide));
gulp.task('build',
 gulp.series(gulp.parallel(sass, javascript)));

// Build the site, run the server, and watch for file changes
gulp.task('default',
  gulp.series('build', server, watch));

// Compile Sass into CSS
// In production, the CSS is compressed
function sass() {
  return gulp.src('assets/scss/style.scss')
    .pipe($.sourcemaps.init())
    .pipe($.sass({
      includePaths: PATHS.sass
    })
      .on('error', $.sass.logError))
    .pipe($.autoprefixer({
      browsers: COMPATIBILITY
    }))
    // Comment in the pipe below to run UnCSS in production
    //.pipe($.if(PRODUCTION, $.uncss(UNCSS_OPTIONS)))
    .pipe($.if(PRODUCTION, $.cssnano()))
    .pipe($.if(!PRODUCTION, $.sourcemaps.write()))
    .pipe(gulp.dest('./'))
    .pipe(browser.reload({ stream: true }));
}

// Combine JavaScript into one file
// In production, the file is minified
function javascript() {
  return gulp.src(PATHS.javascript)
    .pipe($.sourcemaps.init())
    .pipe($.babel({ignore: ['what-input.js']}))
    .pipe($.concat('scripts.js'))
    .pipe($.if(PRODUCTION, $.uglify()
      .on('error', e => { console.log(e); })
    ))
    .pipe($.if(!PRODUCTION, $.sourcemaps.write()))
    .pipe(gulp.dest('./'));
}

// Start a server with BrowserSync to preview the site in
function server(done) {
  browser.init({
    port: PORT, proxy: PROXY
  });
  done();
}

// Reload the browser with BrowserSync
function reload(done) {
  browser.reload();
  done();
}

// Watch for changes to static assets, pages, Sass, and JavaScript
function watch() {
  gulp.watch(PATHS.assets);
  gulp.watch('assets/scss/**/*.scss').on('all', gulp.series(sass, browser.reload));
  gulp.watch('assets/js/**/*.js').on('all', gulp.series(javascript, browser.reload));
}
