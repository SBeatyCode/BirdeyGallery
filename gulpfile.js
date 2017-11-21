let gulp = require('gulp'),
webpack = require('webpack'),
watch = require('gulp-watch'),
postcss = require('gulp-postcss'),
autoprefixer = require('autoprefixer'),
cssVariables = require('postcss-simple-vars'),
cssImport = require('postcss-import'),
//gulpConcat = require('gulp-concat'), wass using this to compile all the JS files into one file, but changed to using webpack
uglify = require('gulp-uglify'),
minifyCss = require('gulp-minify-css');


//task to process the css files and move them to the main css file location to be used by the site
gulp.task('process-css', () => {
    return gulp.src('./app-components/css/style.css')
    //support for css variables, autoprefixer
    .pipe(postcss([cssImport, cssVariables, autoprefixer, minifyCss]))
    .pipe(gulp.dest('./css'));
});

//task to process the js files and move them to the main js file location to be used by the site
gulp.task('process-js', (callback) => {
    webpack(require('./webpack.config.js'), () => {
        console.log('hello');
        callback();
    });
});

//the various gulp-watch watches, these call different functions when the files they're watching are triggered
gulp.task('watch', () => {
//watch css files
   watch('./**/*.css', () => {
       gulp.start('process-css');
   }); 

//watch js files
   watch('./app-components/**/*.js', () => {
      gulp.start('process-js');
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