var gulp = require('gulp')
var pug  = require('gulp-pug')
var stylus = require('gulp-stylus')
var rename = require('gulp-rename')
var sourcemaps = require('gulp-sourcemaps')

var pugDist = './dist/'
var styleDest = './dist/css/'
var pugSrc = './src/index.pug'
var styleSrc = './src/stylus/main.styl'


gulp.task('stylus', done => {
  gulp.src( styleSrc )
      .pipe( sourcemaps.init())
      .pipe( stylus({
        compress: true,
        errorLogToConsole: true,
      }))
      .on( 'error', console.error.bind(console))
      .pipe( rename( { suffix: '.min' }))
      .pipe( sourcemaps.write( './') )
      .pipe( gulp.dest( styleDest ))
  done()
});


gulp.task('pug', done => {
  gulp.src( pugSrc )
      .pipe( pug())
      .pipe( gulp.dest( pugDist ))
  done()
});

