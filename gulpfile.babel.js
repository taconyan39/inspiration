import gulp from 'gulp';
import webpackConfig from './webpack.config.js'
import webpack from 'webpack-stream';
// import browserSync from 'browser-sync';
import notify from 'gulp-notify';
import plumber from 'gulp-plumber';
import eslint from 'gulp-eslint';
// import rename from 'gulp-rename';
import sass from 'gulp-sass';

gulp.task('js-build', function(){
  gulp.src('resources/js/app.js')
  .pipe(plumber({
    errorHandler: notify.onError("Error: <%= error.message %>")
  }))
  .pipe(webpack(webpackConfig))
  .pipe(gulp.dest("public/js"));
});

gulp.task('sass-build', function(){
  gulp.src('resources/sass/app.scss')
  .pipe(plumber({
    errorHandler: notify.onError("Error: <%= error.message %>")
  }))
  .pipe(sass())
  // .pipe(rename({extname: '.css'}))
  .pipe(gulp.dest("public/css"));
});

// gulp.task('browser-sync', function() {
//   browserSync.init({
//     server: {
//       baseDir: "./",
//       index: "index.html"
//     }
//   });
// });
// gulp.task('bs-reload', function(){
//   browserSync.reload();
// });

// gulp.task('eslint', function() {
//   return gulp.src(['resources/**/*.js'])
//     .pipe(plumber({
//       errorHandler: function(error){
//         const taskName = 'eslint';
//         const title = '[task]' + taskName + ' ' + error.plugin;
//         const errormsg = 'error:' + error.message;
//         console.error(title + '\n' + errormsg);
//         notify.onError({
//           title: title,
//           message: errormsg,
//           time: 3000
//         });
//       }
//     }))
//     .pipe(eslint({ useEslintrc: true}))
//     .pipe(eslint.format())
//     .pipe(eslint.failOnError())
//     .pipe(plumber.stop())
// });

// gulp.task('default', ['eslint', 'js-build','sass-build', 'browser-sync'], function(){
gulp.task('default', ['js-build','sass-build'], function(){
  gulp.watch('./resources/**/*.js', ['js-build']);
  gulp.watch('./resources/**/*.css',['css-build']);
  gulp.watch('./resources/**/*.scss', ['sass-build']);
  // gulp.watch('./*.html', ['bs-reload']);
  // gulp.watch('./public/**/*.+(js|css)', ['bs-reload']);
})