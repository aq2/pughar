const del = require('del'),
      gulp = require('gulp'),
      pug  = require('gulp-pug'),
      stylus = require('gulp-stylus'),
      rename = require('gulp-rename'),
      notify = require('gulp-notify'),    // install libnotify-bin
      sourcemaps = require('gulp-sourcemaps'),
      errorHandler = require('gulp-error-handle'),
      browserSync = require('browser-sync').create()

const logError = (err) => {
  notify.onError({
    title: 'Gulp error ' + err.plugin,
    message: err.toString()
  })(err)
}


function styles() {
  return gulp.src('./src/stylus/**/*.styl')
            .pipe(errorHandler(logError))
            .pipe(sourcemaps.init())
            .pipe(stylus({ compress: true }))
            .pipe(rename({ suffix: '.min' }))
            .pipe(sourcemaps.write('./'))
            .pipe(gulp.dest('./www/css'))
            .pipe(browserSync.stream())
}
exports.styles = styles


function pages() {
  return gulp.src('./src/**/*.pug')
            .pipe(errorHandler(logError))
            .pipe(pug())
            .pipe(gulp.dest('./www/'))
}
exports.pages = pages


function codes() {
  return gulp.src('./src/code/**/*.*')
             .pipe(errorHandler(logError))
             .pipe(gulp.dest('./www/code'))
}
exports.codes = codes


function images() {
  return gulp.src('./src/images/**/*.*')
      .pipe(gulp.dest('./www/images'))
}
exports.images = images


function watch() {
  browserSync.init({ server: './www' })
  gulp.watch('./src/code/**/*.*', codes)
  gulp.watch('./src/images/**/*.*', images)
  gulp.watch('./src/stylus/**/*.styl', styles)
  gulp.watch('./src/**/*.pug', pages).on('change', browserSync.reload)

  gulp.src('./src/index.*')
      .pipe(notify('Gulp up and running 😃 '));
}
exports.watch = watch


function clean() {
  gulp.src("./src")
    .pipe(notify(' gulp nuke and pave'))
  return del('./www/**/*')
}
exports.clean = clean

function build(cb) {
  gulp.series(pages, codes, styles, images)
  gulp.src("./www")
    .pipe(notify('gulp building to be born'))
  cb()
}
exports.build = build

exports.default = gulp.series(clean, build, watch)
