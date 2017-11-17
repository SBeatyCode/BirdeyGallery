let gulp = require('gulp'),
watch = require('gulp-watch'),
postcss = require('gulp-postcss'),
autoprefixer = require('autoprefixer'),
cssVariables = require('postcss-simple-vars'),
cssImport = require('postcss-import');


//task to process the css files and move them to the main css file location to be used by the site
gulp.task('process-css', () => {
    return gulp.src('./app-components/css/style.css')
    //support for css variables, autoprefixer
    .pipe(postcss([cssImport, cssVariables, autoprefixer]))
    .pipe(gulp.dest('./css'));
});

//the various gulp-watch watches, these call different functions when the files they're watching are triggered
gulp.task('watch', () => {
   watch('./**/*.css', () => {
       gulp.start('process-css');
   }); 
});

//the main gulp task. This will call the other needed gulp tasks
gulp.task('start', () => {
    gulp.start('watch');
});

//the default task, in case you accidentally just type in 'gulp' with no command after, it'll call gulp.start
gulp.task('default', () => {
    gulp.start('start');
});