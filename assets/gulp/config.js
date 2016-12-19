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
    javascript: {
      foundation: [
           // Libraries required by Foundation
           './assets/bower_components/jquery/dist/jquery.js',
           './assets/bower_components/what-input/dist/what-input.js',
           // Core Foundation files
           './assets/bower_components/foundation-sites/js/foundation.core.js',
           './assets/bower_components/foundation-sites/js/foundation.util.*.js',
           // Individual Foundation components
           // If you aren't using a component, just remove it from the list
           './assets/bower_components/foundation-sites/js/foundation.abide.js',
           './assets/bower_components/foundation-sites/js/foundation.accordion.js',
           './assets/bower_components/foundation-sites/js/foundation.accordionMenu.js',
           './assets/bower_components/foundation-sites/js/foundation.drilldown.js',
           './assets/bower_components/foundation-sites/js/foundation.dropdown.js',
           './assets/bower_components/foundation-sites/js/foundation.dropdownMenu.js',
           './assets/bower_components/foundation-sites/js/foundation.equalizer.js',
           './assets/bower_components/foundation-sites/js/foundation.interchange.js',
           './assets/bower_components/foundation-sites/js/foundation.magellan.js',
           './assets/bower_components/foundation-sites/js/foundation.offcanvas.js',
           './assets/bower_components/foundation-sites/js/foundation.orbit.js',
           './assets/bower_components/foundation-sites/js/foundation.responsiveMenu.js',
           './assets/bower_components/foundation-sites/js/foundation.responsiveToggle.js',
           './assets/bower_components/foundation-sites/js/foundation.reveal.js',
           './assets/bower_components/foundation-sites/js/foundation.slider.js',
           './assets/bower_components/foundation-sites/js/foundation.sticky.js',
           './assets/bower_components/foundation-sites/js/foundation.tabs.js',
           './assets/bower_components/foundation-sites/js/foundation.toggler.js',
           './assets/bower_components/foundation-sites/js/foundation.tooltip.js',
           './assets/bower_components/foundation-sites/js/foundation.zf.responsiveAccordionTabs.js',
           './assets/js/foundation-init.js',
           './assets/bower_components/slick-carousel/slick/slick.js',
           // Custom Scripts
           './assets/js/slick.js'
      ],
      script: './assets/js/'
    }
  }
};
