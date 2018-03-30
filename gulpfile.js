var gulp = require("gulp"),
  postcss = require("gulp-postcss"),
  sourcemaps = require("gulp-sourcemaps"),
  autoprefixer = require("autoprefixer"),
  cssnano = require("cssnano"),
  atImport = require("postcss-import"),
  nested = require("postcss-nested"),
  lr = require("tiny-lr"),
  server = lr();

gulp.task("css", function() {
  var postcss = require("gulp-postcss");
  var sourcemaps = require("gulp-sourcemaps");

  var plugins = [
    atImport(),
    nested(),
    autoprefixer({ browsers: ["last 1 version"] }),
    cssnano()
  ];

  return gulp
    .src("./postcss/root.css")
    .pipe(sourcemaps.init())
    .pipe(postcss(plugins))
    .pipe(sourcemaps.write("."))
    .pipe(gulp.dest("build/css/"));
});

gulp.task("watch", function() {
  // Listen on port 35729
  server.listen(35729, function(err) {
    if (err) {
      return console.log(err);
    }

    // Watch .scss files
    gulp.watch("postcss/**/*.css", ["css"]);

    // Watch .js files
    //gulp.watch('js/**/*.js', ['scripts']);

    // Watch image files
    //gulp.watch('images/**/*.jpg', ['jpgs']);

    // Watch image files
    //gulp.watch('images/**/*.png', ['pngs']);

    // Watch image files
    //gulp.watch('images/**/*.gif', ['gifs']);

    // Watch image files
    //gulp.watch('images/**/*.svg', ['svg']);

    // Watch php files
    //gulp.watch('**/*.php', ['reload']);
  });
});
