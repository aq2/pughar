const gulp = require('gulp'),
      pug  = require('gulp-pug'),
      stylus = require('gulp-stylus'),
      rename = require('gulp-rename'),
      notify = require('gulp-notify'),    // install libnotify-bin
      sourcemaps = require('gulp-sourcemaps'),
      errorHandler = require('gulp-error-handle'),
      browserSync = require('browser-sync').create()


const logError = function(err) {
  notify.onError({
    title: 'Gulp error ' + err.plugin,
    message: err.toString()
  })(err)
}


function style() {
  return gulp.src('./src/stylus/**/*.styl')
            .pipe(errorHandler(logError))
            .pipe(sourcemaps.init())
            .pipe(stylus({ compress: true }))
            .pipe(rename({ suffix: '.min' }))
            .pipe(sourcemaps.write('./'))
            .pipe(gulp.dest('./www/css'))
            .pipe(browserSync.stream())
}
exports.style = style


function pages() {
  return gulp.src('./src/**/*.pug')
            .pipe(pug())
            .pipe(gulp.dest('./www/'))
            .pipe(browserSync.stream())
}
exports.pages = pages


function code() {
  gulp.src('./src/code/**/*.*')
      .pipe(gulp.dest('./www/code'))
}
exports.code = code


function images() {
  gulp.src('./src/images/**/*.*')
      .pipe(gulp.dest('./www/images'))
}
exports.images = images


function watch() {
  browserSync.init({
    server: {
      baseDir: './www'
    }
  })
  gulp.watch('./src/**/*.pug', pages)
  gulp.watch('./src/code/**/*.*', code)
  gulp.watch('./src/images/**/*.*', images)
  gulp.watch('./src/stylus/**/*.styl', style)

  gulp.src("./src/index.*")
      .pipe(notify("Gulp up and running 😃 "));
}
exports.watch = watch

