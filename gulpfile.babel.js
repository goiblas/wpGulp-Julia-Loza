import gulp from 'gulp';
import sass from 'gulp-sass';
import autoprefixer from 'gulp-autoprefixer';
import browserSync from 'browser-sync';
import plumber from 'gulp-plumber';
import imagemin from 'gulp-imagemin';
import cssnano from 'gulp-cssnano';
import webp from 'gulp-webp';
import gcmq from 'gulp-group-css-media-queries';

const AUTOPREFIXER_BROWSERS = [
    'last 2 version',
    '> 1%',
    'ie >= 9',
    'ie_mob >= 10',
    'ff >= 30',
    'chrome >= 34',
    'safari >= 7',
    'opera >= 23',
    'ios >= 7',
    'android >= 4',
    'bb >= 10'
];

gulp.task('css', () => {
    return gulp.src('./sass/*.scss')
        .pipe(plumber())
        .pipe(sass())
        .pipe(autoprefixer(AUTOPREFIXER_BROWSERS))
        .pipe(gulp.dest('./'));
});

gulp.task('mincss', () => {
    return gulp.src('./sass/*.scss')
        .pipe(plumber())
        .pipe(sass())
        .pipe(autoprefixer(AUTOPREFIXER_BROWSERS))
        .pipe(gcmq())
        .pipe(cssnano())
        .pipe(gulp.dest('./'));
});


gulp.task('img', () => {
    return gulp.src('./img/raw/**/*.{png,jpg,gif,svg}')
        .pipe(imagemin({
            progressive: true,
            opimagemintimizationLevel: 3, // 0-7 low-high
            interlaced: true,
            svgoPlugins: [{ removeViewBox: false }]
        }))
        .pipe(gulp.dest('./img'));
});

gulp.task('webp', () => {
    return gulp.src('./img/raw/**/*.jpg')
        .pipe(webp())
        .pipe(gulp.dest('./img'));
});


gulp.task('dev', () => {
    browserSync.init({
        proxy: "localhost/julia"
    });

    gulp.watch('./sass/**/*.scss', ['css']).on('change', browserSync.reload) ;
    gulp.watch('./**/*.php').on('change', browserSync.reload);
    gulp.watch('./js/**/*.js').on('change', browserSync.reload);
});


gulp.task('default', ['img','webp','css','dev']);
gulp.task('build', ['img', 'webp','mincss']);