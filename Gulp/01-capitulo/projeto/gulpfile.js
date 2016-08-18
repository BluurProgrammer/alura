var gulp = require('gulp'),
    imagemin = require('gulp-imagemin'),
    clean = require('gulp-clean'),
    concat = require('gulp-concat'),
    htmlReplace = require('gulp-html-replace'),
    uglify = require('gulp-uglify'),
    usemin = require('gulp-usemin'),
    cssmin = require('gulp-cssmin'),
    broswerSync = require('browser-sync'),
    jshint = require('gulp-jshint'),
    jshintStylish = require('jshint-stylish'),
    csslint = require('gulp-csslint'),
    autoprefixer = require('gulp-autoprefixer');

//Tarefa padão, que será executada quando não colocar nenhum argumento
gulp.task('default', ['copy'], function() {
    gulp.start('build-img', 'usemin');
});

//Tarefa cria uma cópia da pasta original, porém antes é removido todo o conteúdo anterior
gulp.task('copy', ['clean'], function() {
    return gulp.src('src/**/*')
    .pipe(gulp.dest('dist'));
});

//Tarefa que remove os arquivos da pasta de distribuição
gulp.task('clean', function() {
    return gulp.src('dist')
        .pipe(clean());
});

//Tarefa para otimizar as imagens
gulp.task('build-img', function() {
    gulp.src('dist/img/**/*')
        .pipe(imagemin())
        .pipe(gulp.dest('dist/img'));
});

//Tarefa de minificação e inserção do arquivo no HTML
gulp.task('usemin', function() {
    gulp.src('dist/**/*.html')
        .pipe(usemin({
            'js' : [uglify],
            'css' : [autoprefixer, cssmin]
        }))
        .pipe(gulp.dest('dist'));
});

//BroswerSync, JSHint, CSSLint
//Monitora em tempo real qualquer alteração css e js e recarrega o navegador
gulp.task('server', function() {
    broswerSync.init({
        server: {
            baseDir: 'src'
        }
    });

    gulp.watch('src/js/*.js').on('change', function(event) {
        gulp.src(event.path)
        .pipe(jshint())
        .pipe(jshint.reporter(jshintStylish));
    });

    gulp.watch('src/css/*.css').on('change', function(event) {
        gulp.src(event.path)
        .pipe(csslint())
        .pipe(csslint.reporter());
    });

    gulp.watch('src/**/*').on('change', broswerSync.reload);
});

// --------------------------------------------------------------------------------
// Concatenação de todos os JS
// gulp.task('build-js', function() {
//     gulp.src([
//             'dist/js/jquery.js',
//             'dist/js/home.js',
//             'dist/js/produto.js'
//         ])
//         .pipe(uglify()) //Mimificação
//         .pipe(concat('all.js'))
//         .pipe(gulp.dest('dist/js'));
// });
//
// Adiciona o arquivo JS concatenado no HTML
// gulp.task('build-html', function() {
//     gulp.src('dist/**/*.html')
//         .pipe(htmlReplace({
//             js: 'js/all.js'
//         }))
//         .pipe(gulp.dest('dist'));
// });
