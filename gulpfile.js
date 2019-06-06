var gulp = require('gulp')
var pug  = require('gulp-pug')
var stylus = require('gulp-stylus')
var rename = require('gulp-rename')
var sourcemaps = require('gulp-sourcemaps')
var browserSync = require('browser-sync').create()


gulp.task('stylus', done => {
  gulp.src('src/stylus/main.styl')
      .pipe(sourcemaps.init())
      .pipe(stylus({
        compress: true,
        errorLogToConsole: true,
      }))
      .on('error', console.error.bind(console))
      .pipe(rename({ suffix: '.min' }))
      .pipe(sourcemaps.write('./'))
      .pipe(gulp.dest('./dist/css'))
      .pipe(browserSync.stream())
  done()
})


gulp.task('pug', done => {
  gulp.src('src/index.pug')
      .pipe(pug())
      .pipe(gulp.dest('./dist/'))
      .pipe(browserSync.stream())
  done()
})


gulp.task('code', done => {
  gulp.src('./src/code/**/*.*')
      .pipe(gulp.dest( './dist/code'))
  done()
})


gulp.task('images', done => {
  gulp.src('./src/images/**/*.*')
      .pipe(gulp.dest( './dist/images'))
  done()
})


gulp.task('browser-sync', done => {
  browserSync.init({
    server: {
      baseDir: './dist',
      injectChanges: true
    }
  })
  done()
})


gulp.task('watch', gulp.parallel('browser-sync', 'stylus', done => {
  gulp.watch('src/stylus/*.styl', gulp.series('stylus'));
  gulp.watch('src/**/*.pug', gulp.series('pug'));
  done();
}));


