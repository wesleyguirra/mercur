var gulp = require('gulp');
var sass = require('gulp-sass');

gulp.task('styles', function() {
    gulp.src('sass/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./css/'))
});

//Watch task
gulp.task('styles:watch',function() {
    gulp.watch('sass/**/*.scss',['styles']);
    gulp.watch('sass/base/**/*.scss',['styles']);
});
