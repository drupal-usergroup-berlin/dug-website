var gulp = require('gulp');

gulp.task('deploy-scripts',['amdOptimize'], function() {
  gulp.src([
    'js/**/*.js'])
    .pipe(jshint('.jshintrc'))
    .pipe(jshint.reporter('default'));
});

