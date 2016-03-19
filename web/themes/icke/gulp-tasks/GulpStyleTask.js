var gulp = require('gulp');
var sass = require('gulp-sass');
var pixrem = require('gulp-pixrem');
var autoprefixer = require('gulp-autoprefixer');
var concatCss = require('gulp-concat-css');

gulp.task('styles', function() {
  return gulp.src('sass/*.scss')
    .pipe(sass({
      errLogToConsole: true,
      includePaths: ['bower_components']
    }))
    .pipe(pixrem('62,5%', { html: true }))
    .pipe(autoprefixer({
      browsers: ['last 6 versions']
    }))
    .pipe(concatCss('icke.css'))
    .pipe(gulp.dest('css'));
    //.pipe(reload({ stream: true }));
});
