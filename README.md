# ChiroLife WordPress website - second edition

This is a WordPress website for ChiroLife-Bodensee - the American Chiropractic Center in Ravensburg, Germany.

## To start the project simply run in your terminal

`docker-compose up`

## Developing theme with npm & Gulp

UnderStrap uses npm as manager for dependency packages. And it uses Gulp as taskrunner, for example to compile .scss code into .css, minify .js code etc

### Preparations: Install node.js and Gulp

At first you need node.js and Gulp installed on your computer globally

To install node.js visit the node.js website for the latest installer for your OS. Download and install it like any other program, too.

To install Gulp open up your terminal, enter:

`npm install --global gulp-cli`

### Installing dependencies

Go to theme directory

`cd wordpress/wp-content/themes/understrap/`

Install all dependecies

`npm install`

### Running

To work and compile your Sass files on the fly start:

`gulp watch`

[More info and detailed explanation](https://understrap.github.io/#installation)
