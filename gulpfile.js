/**
 * Yii2-coreui-theme
 *
 * Provide needed files from coreUI source for src directory
 *
 * @author Klaus Mergen <kmergen.web@gmail.com>
 */

// Required gulp packages
var gulp = require('gulp');

/**
 * @var string The coreui source directory
 */
var coreuiSourceDir = 'coreui_source/Static_Full_Project_GULP';


//################################ Patches Tasks ########################################
gulp.task('patch:style', function () {
    return gulp.src(['patches/style.scss'])
        .pipe(gulp.dest('src/scss'));
});

//################################ Copy Tasks ########################################

gulp.task('copy:img', function () {
    return gulp.src([coreuiSourceDir + '/src/img/**/*'])
        .pipe(gulp.dest('src/img'));
});

gulp.task('copy:scss', function () {
    return gulp.src([
        coreuiSourceDir + '/src/scss/**/*',
        '!' + coreuiSourceDir + '/src/scss/style.scss',
        '!' + coreuiSourceDir + '/src/scss/_custom.scss'
    ])
        .pipe(gulp.dest('src/scss'));
});

gulp.task('copy:js', function () {
    return gulp.src([
        coreuiSourceDir + '/src/js/app.js'
    ])
        .pipe(gulp.dest('src/js'));
});

gulp.task('copy:jsViews', function () {
    return gulp.src([
        coreuiSourceDir + '/src/js/views/**/*'
    ])
        .pipe(gulp.dest('src/js/views'));
});

gulp.task('copy', ['copy:img', 'copy:scss', 'copy:js', 'copy:jsViews']);
gulp.task('patch', ['patch:style']);

gulp.task('serve', ['copy', 'patch']);
