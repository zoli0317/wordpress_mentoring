'use strict';
module.exports = function(grunt) {
  require('load-grunt-tasks')(grunt);

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    jshint: {
        files: ['script/*'],
        options: {
            reporterOutput: '',
            esnext: true,
            globals: {
                console: true,
                module: true,
                document: true
            }
        }
    },
    browserify: {
        dist: {
            files: {
                // destination for transpiled js : source js
                'script.js': 'script/app.es6'
            },
            options: {
                transform: [['babelify', { presets: "es2015" }]],
                browserifyOptions: {
                    debug: true
                }
            }
        }
    },
    uglify: {
        dist: {
            files: {
                'script.min.js': ['script.js']
            }
        }
    },
    sass: {
      dist: {
        options: {
            style: 'expanded',
            require: 'susy'
        },
        files: {
            'desktop.dev.css': 'scss/desktop.scss'
        }
      }
    },
    cssmin: {
        options: {
            mergeIntoShorthands: false,
            roundingPrecision: -1
        },
      target: {
          files: {
              'desktop.css': ['desktop.dev.css']
          }
      }
    },
    clean: ['desktop.dev.css'],
    watch: {
        files: ['<%= jshint.files %>', '/scss/*'],
        tasks: ['browserify', 'jshint', 'sass']
    }
  });

  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-sass');

  grunt.registerTask('default', ['browserify:dist', 'jshint', 'uglify', 'sass', 'cssmin', 'clean']);
};