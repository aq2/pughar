var gulp = require('gulp')
var pug  = require('gulp-pug')
var stylus = require('gulp-stylus')
var rename = require('gulp-rename')
var sourcemaps = require('gulp-sourcemaps')


var pugSrc = 'src/index.pug'
var pugWatch = 'src/pages/**/*.pug'
var pugDest = './dist/'

var stylusSrc = 'src/stylus/main.styl'
var stylusWatch = 'src/stylus/**/*.styl'
var stylusDest = './dist/css/'

var codeWatch = 'src/code/**/*.*'
var codeDest = './dist/code'

var imagesWatch = './src/images/**/*.*'
var imagesDest = './dist/images'




gulp.task('stylus', done => {
  gulp.src( stylusSrc )
      .pipe( sourcemaps.init())
      .pipe( stylus({
        compress: true,
        errorLogToConsole: true,
      }))
      .on( 'error', console.error.bind(console))
      .pipe( rename( { suffix: '.min' }))
      .pipe( sourcemaps.write( './') )
      .pipe( gulp.dest( stylusDest ))
  done()
})


gulp.task('pug', done => {
  gulp.src( pugSrc )
      .pipe( pug())
      .pipe( gulp.dest( pugDest ))
  done()
})


gulp.task('code', done => {
  gulp.src( codeWatch)
      .pipe( gulp.dest( codeDest))
  done()
})


gulp.task('images', done => {
  gulp.src( imagesWatch)
      .pipe( gulp.dest( imagesDest ))
  done()
})



gulp.task('default', gulp.series([ 'stylus', 'pug', 'code', 'images']))

gulp.task('watch', gulp.parallel( 'default', done => {
  gulp.watch( stylusWatch, gulp.series( 'stylus'))
  gulp.watch( codeWatch, gulp.series( 'code'))
  gulp.watch( pugWatch, gulp.series( 'pug'))
  gulp.watch( imagesSrc, gulp.series( 'images'))
  done()
}))
