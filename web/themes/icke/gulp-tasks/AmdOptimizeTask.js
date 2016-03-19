// build requirejs
//http://tech.pro/blog/1639/using-rjs-to-optimize-your-requirejs-project
//r.js -o build.js
// bower_components/requirejs/require.js

var gulp = require('gulp');
var shell = require('gulp-shell');

gulp.task('amdOptimize',shell.task([
  // This is the command
  'r.js -o build.js'
]));
