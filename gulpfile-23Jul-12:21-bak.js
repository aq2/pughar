const del = require('del'),
      gulp = require('gulp'),
      pug  = require('gulp-pug'),
      rename = require('gulp-rename'),
      stylus = require('gulp-stylus'),
      notify = require('gulp-notify'),    // apt install libnotify-bin
      connect = require('gulp-connect-php'),
      browserSync = require('browser-sync'),
      sourcemaps = require('gulp-sourcemaps'),
      errorHandler = require('gulp-error-handle')


function gza() {
  return gulp.src('./www/index.html').pipe(notify('🏠 Gulp building to be born 🏠'))
}
exports.gza = gza


function images() {
  return gulp.src('./src/images/**/*.*')
             .pipe(gulp.dest('./www/images'))
}
exports.images = images


function includes() {
  return gulp.src('src/includes/**/*.pug')
            .pipe(errorHandler(logError))
            .pipe(pug())
}
exports.includes = includes


function index() {
  return gulp.src('./src/index.pug')
             .pipe(errorHandler(logError))
             .pipe(pug())
             .pipe(gulp.dest('./www'))
}
exports.index = index


function js() {
  return gulp.src('./src/js/**/*.js')
             .pipe(errorHandler(logError))
             .pipe(gulp.dest('./www/js'))
}
exports.js = js


function nuke() {
  gulp.src('./src').pipe(notify('😱 Gulp nuke and pave 😱'))
  return del('./www/**/*')
}
exports.nuke = nuke


function pages() {
  return gulp.src('src/pages/**/*.pug')
            .pipe(errorHandler(logError))
            .pipe(pug())
            .pipe(gulp.dest('./www/pages'))
}
exports.pages = pages


function phps() {
  return gulp.src('./src/php/**/*')
             .pipe(errorHandler(logError))
             .pipe(gulp.dest('./www/php'))
}
exports.phps = phps


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


const logError = (err) => {
  notify.onError({
    title: 'Gulp error ' + err.plugin,
    message: err.toString()
  })(err)
}


let server = new connect()
gulp.task('disconnect', function() {
    server.closeServer()
})


// tasks
gulp.task('default', () => {
  browserSync.init({
    proxy: 'localhost:3000',
    open: false
  })

  gulp.watch('./src/js/**/*.js', js)
  gulp.watch('./src/php/**/*', phps).on('change', browserSync.reload)

  gulp.watch('./src/images/**/*.*', images)
  gulp.watch('./src/stylus/**/*.styl', styles)

  gulp.watch('./src/index.pug', index).on('change', browserSync.reload)
  gulp.watch('./src/pages/**/*.pug', pages).on('change', browserSync.reload)
  gulp.watch('./src/includes/**/*.pug', gulp.parallel(index, includes, pages)).on('change', browserSync.reload)

  gulp.src('./src/index.*').pipe(notify('👓 Gulp up, running and watching 👓'))
})


gulp.task('build',
    gulp.series(
      nuke,
      gulp.parallel(
        index, pages, includes, js, phps, images, styles
      ),
      gza
    )
)


gulp.task('watch', () => {
  
}
