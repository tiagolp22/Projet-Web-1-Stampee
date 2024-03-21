const gulp = require("gulp");
const concat = require("gulp-concat");
const cleanCss = require("gulp-clean-css");

// Concat and minify CSS files
//gulp.task = déclare une tâche
//gulp.src = indique le fichier source
//Concat = le fichier minifié
//cleanCss = minifie le fichier
//gulp.dest = indique le dossier de destination
gulp.task("build-css", () => {
    return gulp.src("assets/css/*.css").pipe(concat("styles.css")).pipe(cleanCss()).pipe(gulp.dest("build/css"));
});

gulp.task("session-start", (callback) => {
    return gulp.series("build-css")(callback);
});

gulp.task("default", gulp.series("session-start"));