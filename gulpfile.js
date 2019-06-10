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
  return gulp.src('./src/stylus/main.styl')
             .pipe(errorHandler(logError))
             .pipe(sourcemaps.init())
             .pipe(stylus({ compress: true }))
             .pipe(rename({ suffix: '.min' }))
             .pipe(sourcemaps.write('./'))
             .pipe(gulp.dest('./www/css'))
             .pipe(browserSync.stream())
}
exports.styles = styles


function index() {
  return gulp.src('./src/index.pug')
             .pipe(errorHandler(logError))
             .pipe(pug())
             .pipe(gulp.dest('./www'))
}
exports.index = index


function pages() {
  return gulp.src('src/pages/**/*.pug')
            .pipe(errorHandler(logError))
            .pipe(pug())
            .pipe(gulp.dest('./www/pages'))
}
exports.pages = pages


function js() {
  return gulp.src('./src/js/**/*.js')
             .pipe(errorHandler(logError))
             .pipe(gulp.dest('./www/js'))
}
exports.js = js

function phps() {
  return gulp.src('./src/php/**/*.php')
             .pipe(errorHandler(logError))
             .pipe(gulp.dest('./www/php'))
}
exports.phps = phps

function phpPugs() {
  return gulp.src('src/php/**/*.pug')
             .pipe(errorHandler(logError))
             .pipe(rename({ extname: '.php' }))
             .pipe(gulp.dest('./www/php'))
}
exports.phpPugs = phpPugs


function images() {
  return gulp.src('./src/images/**/*.*')
             .pipe(gulp.dest('./www/images'))
}
exports.images = images


function watch() {
  browserSync.init({ server: './www' })

  gulp.watch('./src/js/**/*.js', js)
  gulp.watch('./src/php/**/*.php', phps)
  gulp.watch('./src/php/**/*.pug', phpPugs).on('change', browserSync.reload)

  gulp.watch('./src/images/**/*.*', images)
  gulp.watch('./src/stylus/**/*.styl', styles)

  gulp.watch('./src/index.pug', index).on('change', browserSync.reload)
  gulp.watch('./src/pages/**/*.pug', pages).on('change', browserSync.reload)
  gulp.watch('./src/mixins/**/*.pug', gulp.parallel(index, pages)).on('change', browserSync.reload)
  gulp.watch('./src/includes/**/*.pug', gulp.parallel(index, pages)).on('change', browserSync.reload)

  gulp.src('./src/index.*').pipe(notify('👓 Gulp up, running and watching 👓'))
}
exports.watch = watch


function nuke() {
  gulp.src('./src').pipe(notify('😱 Gulp nuke and pave 😱'))
  return del('./www/**/*')
}
exports.nuke = nuke


function gza() {
  return gulp.src('./www/index.html').pipe(notify('🏠 Gulp building to be born 🏠'))
}
exports.gza = gza


gulp.task(
  'default',
    gulp.series(
      nuke,
      gulp.parallel(
        index, pages, js, phps, phpPugs, images, styles
      ),
      gza,
      watch
    )
)

