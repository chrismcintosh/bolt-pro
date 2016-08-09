module.exports = {
  paths: {
    project: './',
    sass: {
      src: [
           './assets/scss/*.scss',
           './assets/scss/**/*.scss'
      ],
      build: [
           './style.css',
           './style.min.css'
      ]
    },
    js: {
      entry: './assets/js/local/app.js',
      vendor: './assets/js/vendor/*.js',
      dest: './assets/js',
      all: './assets/js/**/*.js'
    }
  }
};
