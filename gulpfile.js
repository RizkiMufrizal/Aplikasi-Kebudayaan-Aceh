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
      './bower_components/jquery/dist/jquery.min.js',
      './bower_components/bootstrap/dist/js/bootstrap.min.js',
      './bower_components/datatables.net/js/jquery.dataTables.min.js',
      './bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js',
      './bower_components/angular/angular.min.js',
      './bower_components/angular-animate/angular-animate.min.js',
      './bower_components/angular-loading-bar/build/loading-bar.min.js',
      './bower_components/angular-ui-router/release/angular-ui-router.min.js',
      './bower_components/oclazyload/dist/ocLazyLoad.min.js'
    ])
    .pipe(gulpConcat('bundle.min.js'))
    .pipe(gulpUglify())
    .pipe(gulp.dest('./assets/js/'));
});

gulp.task('minify-css', function() {
  gulp.src([
    './bower_components/bootstrap/dist/css/bootstrap.min.css',
    './bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css',
    './bower_components/angular-loading-bar/build/loading-bar.min.css'
  ])
    .pipe(gulpConcat('bundle.min.css'))
    .pipe(gulpMinifyCss({
      compatibility: 'ie8'
    }))
    .pipe(gulp.dest('./assets/css/'));
});

gulp.task('fonts', function() {
  gulp.src([
    './bower_components/bootstrap/dist/fonts/glyphicons-halflings-regular.woff',
    './bower_components/bootstrap/dist/fonts/glyphicons-halflings-regular.woff2',
    './bower_components/bootstrap/dist/fonts/glyphicons-halflings-regular.ttf'
  ])
    .pipe(gulp.dest('./assets/fonts/'));
});

gulp.task('default', ['minify-css', 'minify-js', 'fonts']);
