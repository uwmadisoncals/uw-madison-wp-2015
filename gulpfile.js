// Load plugins
var gulp = require('gulp'),
    svgmin = require('gulp-svgmin'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    minifycss = require('gulp-minify-css'),
    jshint = require('gulp-jshint'),
    uglify = require('gulp-uglify'),
    //imagemin = require('gulp-imagemin'),
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
    .pipe(sass({ outputStyle: 'expanded', }))
    .pipe(rename({ suffix: '-02022018.min' }))
    .pipe(minifycss())
    .pipe(livereload(server))
    .pipe(gulp.dest('dist/styles'))
    .pipe(notify({ message: 'Styles task complete' }))
    .pipe(filter('**/*.css')) // Filtering stream to only css files
    .pipe(reload({stream: true}));
});

gulp.task('styles-admin', function() {
  return gulp.src('scss/admin-styles.scss')
    .pipe(sass({ style: 'expanded', }))
    .pipe(rename({ suffix: '-02022018.min' }))
    .pipe(minifycss())
    .pipe(livereload(server))
    .pipe(gulp.dest('dist/styles'))
    .pipe(notify({ message: 'Styles task complete' }))
    .pipe(filter('**/*.css')) // Filtering stream to only css files
    .pipe(reload({stream: true}));
});

// Scripts
gulp.task('scripts', function() {
  return gulp.src(['js/jquery.visible.js','js/detect-zoom.js','js/jquery.suggest.js','js/color-thief.min.js','js/color-thief-init.js','js/flickity.js','js/flickity-sync.js','js/isotope.min.js','js/imagesloaded.js','js/detectbrowser.js','js/fastclick.js','js/history.js','js/global.js'])
    .pipe(concat('main.js'))
    .pipe(gulp.dest('dist/scripts'))
    .pipe(rename({ suffix: '-02022018.min' }))
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
gulp.task('jpgs', function() {
  return gulp.src('images/**/*.jpg')
    //.pipe(imagemin({ progressive: true, svgoPlugins: [{removeViewBox: false}] }))
    
    .pipe(livereload(server))
    .pipe(gulp.dest('dist/images'))
    .pipe(notify({ message: 'Images task complete' }));
});

// PNGs
gulp.task('pngs', function() {
  return gulp.src('images/**/*.png')
    //.pipe(imagemin({ progressive: true, svgoPlugins: [{removeViewBox: false}] }))
    
    .pipe(livereload(server))
    .pipe(gulp.dest('dist/images'))
    .pipe(notify({ message: 'Images task complete' }));
});

// GIFs
gulp.task('gifs', function() {
  return gulp.src('images/**/*.gif')
    //.pipe(imagemin({ progressive: true, svgoPlugins: [{removeViewBox: false}] }))
    
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
  return gulp.src('images/**/*.svg')
             .pipe(svgmin([{
                  removeDoctype: true
              }, {
                  removeComments: true
              }, {
                cleanupIDs: true
              }
              ]))
             .pipe(gulp.dest('dist/images'))
             .pipe(notify({ message: 'SVGO task complete' }));
});



// Clean
gulp.task('clean', function() {
  return gulp.src(['dist/styles', 'dist/scripts', 'dist/images'], {read: false})
    .pipe(clean());
});

// Default task
gulp.task('default', ['clean'], function() {
    gulp.start('styles', 'styles-admin', 'scripts', 'jpgs', 'gifs', 'pngs', 'svg', 'watch');
});

// Watch
gulp.task('watch', function() {

  // Listen on port 35729
  server.listen(35729, function (err) {
    if (err) {
      return console.log(err)
    };

    // Watch .scss files
    gulp.watch('scss/**/*.scss', ['styles', 'styles-admin']);

    // Watch .js files
    gulp.watch('js/**/*.js', ['scripts']);

    // Watch image files
    gulp.watch('images/**/*.jpg', ['jpgs']);

    // Watch image files
    gulp.watch('images/**/*.png', ['pngs']);

    // Watch image files
    gulp.watch('images/**/*.gif', ['gifs']);

    // Watch image files
    gulp.watch('images/**/*.svg', ['svg']);

    // Watch php files
    gulp.watch('**/*.php', ['reload']);




  });

});
