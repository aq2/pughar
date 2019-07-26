const del = require('del'),
      gulp = require('gulp'),
      pug  = require('gulp-pug'),
      rename = require('gulp-rename'),
      stylus = require('gulp-stylus'),
      notify = require('gulp-notify'),    // apt install libnotify-bin
      plumber = require('gulp-plumber'),
      exec = require('child_process').exec,
      browsersync = require('browser-sync'),
      sourcemaps = require('gulp-sourcemaps')


function customPlumber(errTitle) {
  // exec("espeak -ven+m1 'oops gulp'")
  return plumber({
    errorHandler: notify.onError({
      title: errTitle || 'Gulp Error',
      message: 'Error: <%= error.message %>'
    })
  })
}


function gza() {
  return gulp.src('./www/index.html')
             .pipe(notify('🏠 Gulp building to be born 🏠'))
}
exports.gza = gza


function images() {
  return gulp.src('./src/images/**/*.*')
             .pipe(gulp.dest('./www/images'))
}
exports.images = images


function includes() {
  return gulp.src('src/includes/**/*.pug')
            .pipe(customPlumber('includes'))
            .pipe(pug())
}
exports.includes = includes


function index() {
  return gulp.src('./src/index.pug')
             .pipe(pug())
             .pipe(customPlumber('index'))
             .pipe(gulp.dest('./www'))
}
exports.index = index


function js() {
  return gulp.src('./src/js/**/*.js')
             .pipe(customPlumber('javascript'))
             .pipe(gulp.dest('./www/js'))
}
exports.js = js


function nuke() {
  gulp.src('./src')
      .pipe(notify('😱 Gulp nuke and pave 😱'))
  exec('espeak -ven+f5 nuke')
  return del('./www/**/*')
}
exports.nuke = nuke


function pages() {
  return gulp.src('src/pages/**/*.pug')
             .pipe(customPlumber('pages'))
             .pipe(pug())
             .pipe(gulp.dest('./www/pages'))
}
exports.pages = pages


function phps() {
  return gulp.src('./src/php/**/*')
             .pipe(customPlumber('php'))
             .pipe(gulp.dest('./www/php'))
}
exports.phps = phps


function styles() {
  return gulp.src('./src/stylus/main.styl')
             .pipe(sourcemaps.init())
             .pipe(stylus({ compress: true }))
             .pipe(customPlumber('stylus'))
             .pipe(rename({ suffix: '.min' }))
             .pipe(sourcemaps.write('./'))
             .pipe(gulp.dest('./www/css'))
             .pipe(browsersync.stream())
}
exports.styles = styles


function syncBrowser() {
  browsersync.init({
    proxy: 'localhost:3000',
    open: false
  })
}
exports.syncBrowser = syncBrowser


function reloadBrowser(done) {
  browsersync.reload();
  done();
}
exports.reloadBrowser = reloadBrowser


function watchFiles() {
    gulp.watch('./src/js/**/*.js', js)
    gulp.watch('./src/images/**/*.*', images)
    gulp.watch('./src/stylus/**/*.styl', styles)

    gulp.watch('./src/php/**/*', gulp.parallel(phps, reloadBrowser))
    gulp.watch('./src/index.pug', gulp.parallel(index, reloadBrowser))
    gulp.watch('./src/pages/**/*.pug', gulp.parallel(pages, reloadBrowser))
    gulp.watch('./src/includes/**/*.pug', gulp.parallel(index, includes , reloadBrowser))

    exec('espeak -ven+f5 watching')
    gulp.src('./src/index.*').pipe(notify('👓 Gulp up, running and watching 👓'))
}
exports.watchFiles = watchFiles


// define complex multi-tasks
const build = gulp.series(
  nuke,
  gulp.parallel(index, pages, includes, js, phps, images, styles),
  gza
)
exports.build = build

const watch = gulp.parallel(watchFiles, syncBrowser)
exports.watch = watch

exports.default = gulp.series(build, watch)

