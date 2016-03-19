var gulp = require('gulp');

gulp.task('watch', ['styles'], function() {
  gulp.watch('sass/**/*.scss', ['styles']);
});
