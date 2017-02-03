gulp = require 'gulp'
sass = require 'gulp-sass'
plumber = require 'gulp-plumber'
sourcemaps = require 'gulp-sourcemaps'
cssmin = require 'gulp-cssnano'
rename = require 'gulp-rename'
notify = require 'gulp-notify'

prod = "../"
dev = "source/"

gulp.task 'sass', ->
  gulp.src [dev+'sass/*.+(sass|scss)', '!'+dev+'sass/_*.+(sass|scss)']
    .pipe plumber()
    .pipe sourcemaps.init()
    .pipe sass(
      outputStyle: 'expanded'
      errLogToConsole: true
    ).on "error", notify.onError({
      title: "Sass: FAIL"
      message: "Error: <%= error.message %>"
    })
    .pipe sourcemaps.write()
    .pipe plumber.stop()
    .pipe gulp.dest dev + 'css'
    .pipe notify(
      title: "Sass: SUCCESS"
      message: "Generated file: <%= file.relative %>"
    )

gulp.task 'css', ->
  gulp.src dev + 'css/*.css'
    .pipe gulp.dest prod + 'styles'
    .pipe rename({suffix: '.min'})
    .pipe cssmin()
    .pipe gulp.dest prod + 'styles'

gulp.task 'watch', ->
  gulp.watch [dev + 'sass/*.+(sass|scss)', dev + 'sass/**/*.+(sass|scss)',], ['sass']
  gulp.watch [dev + 'css/*.css', dev + 'css/**/*.css'], ['css']

gulp.task 'default', ['sass', 'css', 'watch']