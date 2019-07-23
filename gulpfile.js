const del = require('del'),
      gulp = require('gulp'),
      pug  = require('gulp-pug'),
      rename = require('gulp-rename'),
      stylus = require('gulp-stylus'),
      notify = require('gulp-notify'),    // apt install libnotify-bin
      plumber = require('gulp-plumber'),
      browsersync = require('browser-sync'),
      sourcemaps = require('gulp-sourcemaps')


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
            .pipe(plumber())
            .pipe(pug())
}
exports.includes = includes


function index() {
  return gulp.src('./src/index.pug')
             .pipe(pug())
             .pipe(plumber())
             .pipe(gulp.dest('./www'))
}
exports.index = index


function js() {
  return gulp.src('./src/js/**/*.js')
             .pipe(plumber())
             .pipe(gulp.dest('./www/js'))
}
exports.js = js


function nuke() {
  gulp.src('./src')
      .pipe(notify('😱 Gulp nuke and pave 😱'))
  return del('./www/**/*')
}
exports.nuke = nuke


function pages() {
  return gulp.src('src/pages/**/*.pug')
             .pipe(plumber())
             .pipe(pug())
             .pipe(gulp.dest('./www/pages'))
}
exports.pages = pages


function phps() {
  return gulp.src('./src/php/**/*')
             .pipe(plumber())
             .pipe(gulp.dest('./www/php'))
}
exports.phps = phps


function styles() {
  return gulp.src('./src/stylus/main.styl')
             .pipe(sourcemaps.init())
             .pipe(stylus({ compress: true }))
             .pipe(plumber())
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

    gulp.watch('./src/index.pug', gulp.parallel(index, reloadBrowser))
    gulp.watch('./src/pages/**/*.pug', gulp.parallel(pages, reloadBrowser))
    gulp.watch('./src/includes/**/*.pug', gulp.parallel(index, includes , reloadBrowser))
    gulp.watch('./src/php/**/*', gulp.parallel(phps, reloadBrowser))

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

