# genesis-foundation

![Bolt Pro Graphic](screenshot.png)

*Create new Genesis Framework themes at a lightning fast pace and finish with incredibly small files*

Welcome to the Genesis / Foundation starter theme. This is a developer theme meant to be a launchpad for developing with the Genesis Framework. It utilizes the Foundation Framework for front-end development.

I have tried to leave the Genesis Framework as untouched as possible.

##Getting Started with development
To get started developing make sure you have npm installed and then run `npm install` after the install runs go into assets/gulp/tasks/browsersync.js and put your localhost address in then simply run `gulp` browsersync will take over from there!

##Production Gulp Task

I'm aiming to provide all the tools that Foundation has developed but help you keep the filesizes very small. There are Gulptasks written to strip out unused code, and minimize the final files.

If you enter all the important pages into the production gulp task located in /assets/gulp/tasks/production.js the production task will compile all sass files rip out any css that isnt used on the pages listed and then minify the output file.
