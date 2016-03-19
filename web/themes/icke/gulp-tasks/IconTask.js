var gulp = require('gulp');

gulp.task('icons', function () {
  return gulp.src('./bower_components/icomoon/dist/fonts/**.*')
    .pipe(gulp.dest('../docroot/css/fonts'));
});


