/**
 *
 * @Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Since Mar 30, 2016
 * @Time 9:19:16 AM
 * @Encoding UTF-8
 * @Project Aplikasi-Kebudayaan-Aceh
 * @Package Expression package is undefined on line 8, column 15 in Templates/Other/javascript.js.
 *
 */

'use strict';

var gulp = require('gulp');
var gulpMinifyCss = require('gulp-minify-css');
var gulpUglify = require('gulp-uglify');
var gulpConcat = require('gulp-concat');

gulp.task('minify-js', function() {
  gulp
    .src([
      './src/index1.js',
      './src/index2.js'
    ])
    .pipe(gulpConcat('bundle.js'))
    .pipe(gulpUglify())
    .pipe(gulp.dest('dist'));
});

gulp.task('minify-css', function() {
  gulp.src('./src/index.css')
    .pipe(gulpMinifyCss({
      compatibility: 'ie8'
    }))
    .pipe(gulp.dest('./dist/'));
});
