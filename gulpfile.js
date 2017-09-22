/**
 * Gulp Task Runner
 * Compile front-end resources
 *
 * @example gulp default
 * @example gulp css
 * @example gulp php
 *
 * This file contains JavaScript.
 *
 * @link        https://github.com/dotherightthing/wpdtrt-responsive-nav
 * @see         https://codex.wordpress.org/AJAX_in_Plugins
 * @since       0.1.0
 *
 * @package     Wpdtrt_Responsive_Nav
 */

// dependencies
var gulp = require('gulp');
var autoprefixer = require('autoprefixer');
var phplint = require('gulp-phplint');
var postcss = require('gulp-postcss');
var pxtorem = require('postcss-pxtorem');
var sass = require('gulp-sass');

// parent theme source directories
var scssSrc = './scss/*.scss';

// target directories
var cssDir = './css/';
var phpDir = '**/*.php';

// tasks

gulp.task('css', function () {

  var processors = [
      autoprefixer({
        cascade: false
      }),
      pxtorem({
        rootValue: 16,
        unitPrecision: 5,
        propList: [
          'font',
          'font-size',
          'padding',
          'padding-top',
          'padding-right',
          'padding-bottom',
          'padding-left',
          'margin',
          'margin-top',
          'margin-right',
          'margin-bottom',
          'margin-left',
          'bottom',
          'top',
          'max-width'
        ],
        selectorBlackList: [],
        replace: false,
        mediaQuery: true,
        minPixelValue: 0
      })
  ];

  return gulp
    .src(scssSrc)
    .pipe(sass({outputStyle: 'expanded'}))
    .pipe(postcss(processors))
    .pipe(gulp.dest(cssDir));
});

gulp.task('php', function () {
  return gulp
    .src([phpDir])

    // validate PHP
    // The linter ships with PHP
    .pipe(phplint())
    .pipe(phplint.reporter(function(file){
      var report = file.phplintReport || {};

      if (report.error) {
        console.log(report.message+' on line '+report.line+' of '+report.filename);
      }
    }));
});

gulp.task( 'default', ['css'] );

