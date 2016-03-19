var gulp = require('gulp');
var sass = require('gulp-sass');
var pixrem = require('gulp-pixrem');
var autoprefixer = require('gulp-autoprefixer');
var concat = require('gulp-concat');
var concatCss = require('gulp-concat-css');
var shell = require('gulp-shell');
var requireDir = require('require-dir');
var tasks = requireDir('./gulp-tasks');

gulp.task('default', ['watch']);
