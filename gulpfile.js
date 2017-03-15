var gulp          = require('gulp');
var sass          = require('gulp-sass');
var sftp          = require('gulp-sftp');
var changed       = require('gulp-changed');
var postcss       = require('gulp-postcss');
var concat        = require('gulp-concat');
var uglify        = require('gulp-uglify');
var sourcemaps    = require('gulp-sourcemaps');
var autoprefixer  = require('autoprefixer');
var fs            = require('fs');
var del           = require('del');

var src = 'src/**';
var dist = 'dist/';

var uploadable = [src, "!src/style.scss", "!src/css/**", "!src/js/**", "!src/lib/vendor/**"];

gulp.task('clean', function () {
  del.sync(['./dist/**', '!./dist']);
});

gulp.task('js', function() {
   return gulp.src(['src/js/**/*.js'])
    .pipe(sourcemaps.init())
      // Uglify breaks things so we're not uglifying for now.
      // .pipe(uglify())
      .pipe(concat('main.js'))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest('dist/js/'))
    .pipe(sftp({
      host: 'retrocraft.ca',
      user: 'james',
      key: '~/.ssh/james@retrocraft.ca',
      remotePath: '/var/www/blog/wp-content/themes/retrotheme/js'
    }));
});

gulp.task('sass', function() {
  gulp.src('src/css/*.scss')
    .pipe(sourcemaps.init())
      .pipe(sass({ outputStyle: 'compressed' }))
      .pipe(postcss([ autoprefixer() ]))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest('dist/css/'))
    .pipe(sftp({
      host: 'retrocraft.ca',
      user: 'james',
      key: '~/.ssh/james@retrocraft.ca',
      remotePath: '/var/www/blog/wp-content/themes/retrotheme/css'
    }));

  gulp.src('src/style.scss')
    .pipe(sourcemaps.init())
      .pipe(sass({ outputStyle: 'compressed' }))
      .pipe(postcss([ autoprefixer() ]))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest('dist/'))
    .pipe(sftp({
      host: 'retrocraft.ca',
      user: 'james',
      key: '~/.ssh/james@retrocraft.ca',
      remotePath: '/var/www/blog/wp-content/themes/retrotheme/'
    }));
});

gulp.task('upload', function () {
  return gulp.src(uploadable)
    .pipe(changed(dist))
    .pipe(gulp.dest(dist))
    .pipe(sftp({
      host: 'retrocraft.ca',
      user: 'james',
      key: '~/.ssh/james@retrocraft.ca',
      remotePath: '/var/www/blog/wp-content/themes/retrotheme/'
    }));
});

gulp.task('default', ['clean'], function () {
  gulp.watch(uploadable, ['upload']);
  gulp.watch(['src/style.scss', 'src/css/**/*.scss'], ['sass']);
  gulp.watch(['src/js/*.js'], ['js']);
});
