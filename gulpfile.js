// Load plugins
var gulp = require('gulp'),
    sass = require('gulp-ruby-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    minifycss = require('gulp-minify-css'),
    jshint = require('gulp-jshint'),
    uglify = require('gulp-uglify'),
    imagemin = require('gulp-imagemin'),
    rename = require('gulp-rename'),
    clean = require('gulp-clean'),
    concat = require('gulp-concat'),
    notify = require('gulp-notify'),
    cache = require('gulp-cache'),
    newer = require('gulp-newer'),
    livereload = require('gulp-livereload'),
    lr = require('tiny-lr'),
    filter      = require('gulp-filter'),
    browserSync = require('browser-sync').create(),
    reload      = browserSync.reload,
    server = lr();



// Styles
gulp.task('styles', function() {
  return gulp.src('scss/master.scss')
    .pipe(sass({ style: 'expanded', }))
    .pipe(rename({ suffix: '.min' }))
    .pipe(minifycss())
    .pipe(livereload(server))
    .pipe(gulp.dest('dist/styles'))
    .pipe(notify({ message: 'Styles task complete' }))
    .pipe(filter('**/*.css')) // Filtering stream to only css files
    .pipe(reload({stream: true}));
});

// Scripts
gulp.task('scripts', function() {
  return gulp.src(['js/jquery.suggest.js','js/owlcarousel/owl.carousel.min.js','js/flickity.js','js/isotope.min.js','js/imagesloaded.js','js/detectbrowser.js','js/fastclick.js','js/global.js'])
    .pipe(concat('main.js'))
    .pipe(gulp.dest('dist/scripts'))
    .pipe(rename({ suffix: '.min' }))
    .pipe(uglify())
    .pipe(livereload(server))
    .pipe(gulp.dest('dist/scripts'))
    .pipe(notify({ message: 'Scripts task complete' }))
    .pipe(reload({stream: true}));
});

// Debug Scripts
gulp.task('debug', function() {
  return gulp.src(['js/main2.js'])
    .pipe(jshint('.jshintrc'))
    .pipe(jshint.reporter('default'))
    .pipe(notify({ message: 'Debug Scripts task complete' }));
});

// Images
gulp.task('images', function() {
  return gulp.src('images/**/*')
    .pipe(imagemin({ progressive: true, svgoPlugins: [{removeViewBox: false}] }))
    .pipe(livereload(server))
    .pipe(gulp.dest('dist/images'))
    .pipe(notify({ message: 'Images task complete' }));
});

//browser sync
gulp.task('browser-sync', function() {
    browserSync.init({
        proxy: "madisonwptheme.localhost"
    });
    
    // Watch .scss files
    gulp.watch('scss/**/*.scss', ['styles']);

    // Watch .js files
    gulp.watch('js/**/*.js', ['scripts']);
    
    // Watch php files
    gulp.watch('**/*.php', ['reload']);
});

// Reload
gulp.task('reload', function() {
  return gulp.src('**/*.php').pipe(livereload(server));
});

//SVG Processing
gulp.task('svg', function () {
  return gulp.src('svg/*.svg')
             .pipe(svgmin([{
                  removeDoctype: true
              }, {
                  removeComments: true
              }]))
             .pipe(gulp.dest('dist/svg/'))
});



// Clean
gulp.task('clean', function() {
  return gulp.src(['dist/styles', 'dist/scripts', 'dist/images'], {read: false})
    .pipe(clean());
});

// Default task
gulp.task('default', ['clean'], function() {
    gulp.start('styles', 'debug', 'scripts', 'images');
});

// Watch
gulp.task('watch', function() {

  // Listen on port 35729
  server.listen(35729, function (err) {
    if (err) {
      return console.log(err)
    };

    // Watch .scss files
    gulp.watch('scss/**/*.scss', ['styles']);

    // Watch .js files
    gulp.watch('js/**/*.js', ['scripts']);

    // Watch image files
    gulp.watch('images/**/*', ['images']);

    // Watch image files
    gulp.watch('svg/**/*', ['svg']);
    
    // Watch php files
    gulp.watch('**/*.php', ['reload']);




  });

});
