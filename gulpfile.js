const gulp = require('gulp');
const sass = require('gulp-sass');
const maps = require('gulp-sourcemaps');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify-es').default;
const rename = require('gulp-rename');

gulp.task('compile-custom-sass', function(){
    return gulp.src(["./src/scss/main.scss", '!./src/scss/calendar/**.*'])
        .pipe(maps.init())
        .pipe(sass({outputStyle: 'compressed'}))
        .pipe(rename('main.min.css'))
        .pipe(maps.write('./'))
        .pipe(gulp.dest('./dist/css'));
});

gulp.task('compile-calendar-sass', function(){
    return gulp.src("./src/scss/calendar.scss")
        .pipe(maps.init())
        .pipe(sass({outputStyle: 'compressed'}))
        .pipe(rename('calendar.min.css'))
        .pipe(maps.write('./'))
        .pipe(gulp.dest('./dist/css'));
});

gulp.task('javascript', () => {
   return gulp.src(['./src/js/**.*', '!./src/js/forminator/forminator.js', '!./src/js/index.js'])
       .pipe(uglify())
       .pipe(concat('scripts.min.js'))
       .pipe(gulp.dest('./dist/js'));
});

gulp.task('javascript-flickity', () => {
   return gulp.src('./src/js/flickity/**.*')
       .pipe(uglify())
       .pipe(concat('flickity.min.js'))
       .pipe(gulp.dest('./dist/js'));
});

gulp.task('javascript-forminator', () => {
   return gulp.src('./src/js/forminator/**.*')
       .pipe(uglify())
       .pipe(concat('forminator.min.js'))
       .pipe(gulp.dest('./dist/js'));
});

gulp.task('javascript-masonry', () => {
   return gulp.src('./src/js/masonry/**.*')
       .pipe(uglify())
       .pipe(concat('masonry.min.js'))
       .pipe(gulp.dest('./dist/js'));
});


gulp.task('watchFile', ['compile-custom-sass'], function() {
    gulp.watch('./src/scss/calendar/**.*', ['compile-calendar-sass']);
    gulp.watch('./src/scss/**/**.*', ['compile-custom-sass']);
    gulp.watch('./src/js/**.*', ['javascript']);
    gulp.watch('./src/js/masonry/**.*', ['javascript-masonry']);
    gulp.watch('./src/js/flickity/**.*', ['javascript-flickity']);
});

gulp.task('default', ['watchFile']);