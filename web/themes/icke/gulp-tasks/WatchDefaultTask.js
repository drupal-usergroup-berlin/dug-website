var gulp = require('gulp');

gulp.task('watch-default', ['styles'], function() {
  gulp.watch('sass/**/*.scss', ['styles']);
});
