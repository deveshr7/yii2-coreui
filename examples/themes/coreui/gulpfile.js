/**
 * KM Websolutions Projects
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2010 KM Websolutions
 * @license http://www.yiiframework.com/license/
 */

/**
 * Yii2-coreui-theme-example
 * This example works with the following file structure:
 *
 * application (e.g. yii2-app-advanced)
 * -backend
 * --themes
 * ---coreui
 * ----scss
 * -----custom.scss
 * ----js
 * -----custom.js
 * ----gulpfile.js
 *
 * This example shows how to run coreui without using assets and serve only one file to web accessible directory ("web"),
 * which include all needed files. We include also 'vendor/yiisoft/yii2/assets/Yii.js'.
 * So in your config assetManager you have to set the following bundles to false:
 *
 *'assetManager' => [
 *  'linkAssets' => false,
 *  'forceCopy' => YII_DEBUG ? true : false,
 *  'bundles' => [
 *      'yii\web\JqueryAsset' => false,
 *      'yii\web\YiiAsset' => false,
 *      'yii\bootstrap\BootstrapAsset' => false,
 *      'yii\bootstrap\BootstrapPluginAsset' => false,
 *  ],
 *],
 *
 *
 * To install gulp plugins run in console "npm install --save". Ensure that you are in the directory that contain your gulpfile.js
 * Then run the following console commands.
 *
 * Copy files to publicThemeDir:  $ gulp copy
 * Build CSS files:          $ gulp build-css
 * Build Javascript files:   $ gulp build-js
 * Build css and js:         $ gulp build
 * Run copy and build tasks: $ gulp serve
 *
 * @author Klaus Mergen <kmergen.web@gmail.com>
 */

/**
 * @var required gulp plugins
 */
var gulp = require('gulp'),
    sourcemaps = require('gulp-sourcemaps'),
    concat = require('gulp-concat'),
    gutil = require('gulp-util'),
    uglify = require('gulp-uglify'),
    sass = require('gulp-sass'),
    cssnano = require('gulp-cssnano'),
    browserSync = require('browser-sync'),
    fs = require('fs-extra');


/**
 * Checks whether a directory exists
 */
function statPath(path) {
    try {
        return fs.statSync(path);
    } catch (ex) {}
    return false;
}

/**
 * @var string The public theme directory
 */
var publicThemeDir = '../../web/themes/coreui';

/**
 * @var string The vendor directory
 */
var vendorDir = '../../../vendor/kmergen/yii2-coreui';


//################################ Copy Tasks ########################################
gulp.task('copy:img', function () {

    var src = statPath('img') ? 'img/**/*' : vendorDir + '/src/img/**/*';
    fs.removeSync(publicThemeDir + '/img')
    return gulp.src(src)
        .pipe(gulp.dest(publicThemeDir + '/img'));
});

gulp.task('copy:fonts', function () {
    return gulp.src([
        vendorDir + '/src/node_modules/font-awesome/fonts/**/*',
        vendorDir + '/src/node_modules/simple-line-icons/fonts/**/*'
    ])
        .pipe(gulp.dest(publicThemeDir + '/fonts'));

});

gulp.task('copy', ['copy:img', 'copy:fonts']);


//################################ CSS build Tasks ########################################
gulp.task('build-css', function () {
    var src = [
        vendorDir + '/src/node_modules/flag-icon-css/css/flag-icon.min.css',
        vendorDir + '/src/node_modules/font-awesome/css/font-awesome.min.css ',
        vendorDir + '/src/node_modules/simple-line-icons/css/simple-line-icons.css',
        vendorDir + '/src/scss/style.scss',
        'scss/custom.scss',
    ];

    if (gutil.env.type === 'production') { //gulp ran with '--type production'
        return gulp.src(src)
            .pipe(sass().on('error', sass.logError))
            .pipe(concat('app.min.css'))
            .pipe(cssnano())
            .pipe(gulp.dest(publicThemeDir + '/css')).on('error', gutil.log);
    } else {
        return gulp.src(src)
            .pipe(sourcemaps.init())
            .pipe(sass().on('error', sass.logError))
            .pipe(concat('app.css'))
            .pipe(sourcemaps.write())
            .pipe(gulp.dest(publicThemeDir + '/css')).on('error', gutil.log);
    }
});


//################################ Js build Tasks ########################################
gulp.task('build-js', function () {
    var src = [
        vendorDir + '/src/node_modules/jquery/dist/jquery.min.js',
        '../../../vendor/yiisoft/yii2/assets/Yii.js',
        vendorDir + '/src/node_modules/popper.js/dist/umd/popper.min.js',
        vendorDir + '/src/node_modules/bootstrap/dist/js/bootstrap.min.js',
        vendorDir + '/src/node_modules/pace-progress/pace.min.js',
        vendorDir + '/src/node_modules/chart.js/dist/Chart.min.js',
        vendorDir + '/src/js/app.js',
        'js/custom.js'
    ];

    if (gutil.env.type === 'production') { //gulp ran with '--type production'
        gulp.src(src)
            .pipe(concat('app.min.js'))
            .pipe(uglify())
            .pipe(gulp.dest(publicThemeDir + '/js')).on('error', gutil.log);
    } else {
        gulp.src(src)
            .pipe(sourcemaps.init())
            .pipe(concat('app.js'))
            .pipe(sourcemaps.write())
            .pipe(gulp.dest(publicThemeDir + '/js')).on('error', gutil.log);
    }
});


//################################ Build Task ########################################
gulp.task('build', ['build-css', 'build-js']);


//################################ Serve Task ########################################
gulp.task('serve', ['copy', 'build-css', 'build-js']);


//################################ BrowserSync Task ########################################
gulp.task('browser-sync', function () {
    browserSync.init({
        proxy: 'http://url/to/Application'
    });
});


//################################ Default Task ########################################
gulp.task('default', ['watch', 'browser-sync']);

gulp.task('watch', function () {
    gulp.watch('scss/**/*.scss', ['build-css']);
    gulp.watch('js/**/*.js', ['build-js']);

    // Watch any css files in 'web', reload on change
    gulp.watch([publicThemeDir + '/css/*', publicThemeDir + '/js/*', 'views/**/*', '../controllers/**/*.php', '../models/**/*.php']).on('change', browserSync.reload);
});
