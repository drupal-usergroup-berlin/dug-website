var gulp = require('gulp');

gulp.task('scripts', function() {
  gulp.src([
    'js/**/*.js'])
    .pipe(jshint('.jshintrc'))
    .pipe(jshint.reporter('default'));
});
