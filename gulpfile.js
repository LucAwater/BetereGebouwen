// Requirements
var gulp = require('gulp'),
    sass = require('gulp-sass'),
    gutil = require('gulp-util'),
    rename = require('gulp-rename'),
    jshint = require('gulp-jshint'),
    plumber = require('gulp-plumber'),
    through = require('through2'),
    notify = require('gulp-notify'),
    notifier = require('node-notifier'),
    map = require('map-stream'),
    prefix = require('gulp-autoprefixer'),
    uglify = require("gulp-uglify"),
    concat = require("gulp-concat"),
    sourcemaps = require("gulp-sourcemaps"),
    cleanCSS = require("gulp-clean-css"),
    order = require("gulp-order"),
    imagemin = require('gulp-imagemin'),
    image = require('gulp-image'),
    newer = require("gulp-newer"),
    browserSync = require('browser-sync').create();

// Input
var source_html = '**/*.php',
    source_js = 'js/**/*.js',
    user_js = 'js/*.js',
    source_sass = 'content/themes/elements/scss/app.scss',
    images = 'content/themes/elements/images/**/*.{jpeg,jpg,png,gif,svg}';

// Output
var dest_js = '../js/_generated',
    dest_sass = 'content/themes/elements/css/',
    dest_images = 'content/themes/elements/images/';

// Tasks
gulp.task('html', function () {
    gulp.src(source_html)
        .pipe(browserSync.reload({ stream: true }))
});

gulp.task('js', function () {
    gulp.src(source_js)
    .pipe(order([
        'js/core/slimmage.js',
        'js/core/jquery.matchHeight.js',
        'js/vendor/cookie.js',
        'js/main.js'
    ], { base: '.' }))
        .pipe(plumber())
        .pipe(sourcemaps.init())
        .pipe(concat('main.min.js'))
        .pipe(uglify())
        .pipe(sourcemaps.write('/maps', { includeContent: false, sourceRoot: '/js' }))
        .pipe(gulp.dest(dest_js)) // Save main.min.js
        .pipe(browserSync.reload({ stream: true }))
});

gulp.task('lint', function () {
    gulp.src(user_js)
    .pipe(jshint())
    .pipe(notify(function (file) {

        // Don't show anything if success
        if (file.jshint.success) { return false; }

        // Log errors to terminal window
        var errors = file.jshint.results.map(function (data) {
            if (data.error) {
                return "(" + data.error.line + ':' + data.error.character + ') ' + data.error.reason;
            }
        }).join("\n");

        return file.relative + " (" + file.jshint.results.length + " errors)\n" + errors;
    }))
});

gulp.task('sass', function () {
    gulp.src([source_sass])
   		.pipe(sourcemaps.init())
        .pipe(sass()).on('error', gutil.log)
        .pipe(prefix("last 10 version", "> 1%", "none", { cascade: true }))
        .pipe(concat('app.css'))
        .pipe(cleanCSS({ compatibility: 'ie8' }))
        .pipe(sourcemaps.write('/maps', { includeContent: false, sourceRoot: '/scss' }))
        .pipe(gulp.dest(dest_sass))
        .pipe(browserSync.reload({ stream: true }))
});

gulp.task('media', function () {
    gulp.src(images)
        .pipe(newer(dest_images))
        .pipe(image({
            pngquant: true,
            optipng: false,
            zopflipng: true,
            jpegRecompress: false,
            jpegoptim: true,
            mozjpeg: true,
            gifsicle: true,
            svgo: false //disabled svgo for now, outputs an error. use https://jakearchibald.github.io/svgomg/ for manually optimizing svgs
        }))
        .pipe(gulp.dest(dest_images));
});

gulp.task('watch', function () {
    browserSync.init({
        proxy: "http://localhost:8888/beteregebouwen",
        notify: false
    });

    gulp.watch(source_html, ['html'])
    gulp.watch(source_js, ['js']).on('error', gutil.log);
    gulp.watch('content/themes/elements/scss/**/*.scss', ['sass']).on('error', gutil.log);
    gulp.watch(images, ['media']).on('error', gutil.log);
});

// Default Task
gulp.task('default', ['sass', 'media', 'lint', 'watch']);
