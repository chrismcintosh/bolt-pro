![Bolt Pro Graphic](images/readme-graphic.png)

*Create new Genesis Framework child themes at a lightning fast pace and finish with incredibly small files*

Welcome to the Bolt Pro starter theme for the Genesis Framework. This is a developer theme meant to be a blank canvas for developing with the Genesis Framework. It utilizes the Foundation Framework for front-end development.

I have tried to leave the Genesis Framework as untouched as possible.

#Features
* Foundation 6.3 (Grid, Menu, Breadcrumbs, Off-canvas)
* Suggested Plugins (Accessibilty Plugins, etc.)
* Browsersync
* Compile Sass & Minify
* Compile JS & Minify

##Getting Started with development
To get started developing make sure you have npm installed and then run `npm install` after the install runs go into config.yml and put your localhost address in then simply run `npm start` browsersync will take over from there!

##Browsersync
Allows you view your site across your local network on actual devices.

##Production Gulp Task
I'm aiming to provide all the tools that Foundation has developed but help you keep the filesizes very small. There are Gulptasks written to strip out unused code, and minimize the final files

The production task will compile all sass and JS files and then minify the output files to the root directory [scripts.js and style.css].

##Override Foundation Defaults
Set Foundation settings in assets/scss/vendor/foundation-settings.scss. If you would like to not include foundation components comment them out in the foundation.scss in the same folder.

#Gotchas
* When using an external jQuery library you have to call .foundation() on the end of the jQuery statement. I've include slick.js and made the theme slick ready as an example you can find it in '/assets/js/slick.js'
* To add a new JS file to the compiler go to '/assets/gulp/config.js' find the javascript foundation array and add the path to the JS file you wish to have included in the compile

#Tutorial
If you would like to get started using this theme and would like to see how it works check out this poorly narrated tutorial on getting started with the theme.

[How to Get Started With Bolt Pro](https://www.youtube.com/playlist?list=PLZgiSUbmSPBHtfSKlP1SqCLaVjkRiaPaz)
