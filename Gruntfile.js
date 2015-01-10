module.exports = function( grunt ) {
	'use strict';

	// Load all grunt tasks
	require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);


	grunt.loadNpmTasks('grunt-git');
	grunt.loadNpmTasks('grunt-concat-css');

	// Project configuration
	grunt.initConfig( {
		pkg:    grunt.file.readJSON( 'package.json' ),
		concat: {
			options: {
				stripBanners: true,
				banner: '/*! <%= pkg.title %> - v<%= pkg.version %> - <%= grunt.template.today("yyyy-mm-dd") %>\n' +
					' * <%= pkg.homepage %>\n' +
					' * Copyright (c) <%= grunt.template.today("yyyy") %>;' +
					' * Licensed GPLv2+' +
					' */\n'
			},
			js: {
				src: [
					'assets/js/src/baldrick_wp_front_end.js',
					'vendor/baldrickjs/libs/handlebars.js',
					'vendor/baldrickjs/plugins/animate.baldrick.js',
					'vendor/baldrickjs/plugins/handlebars.baldrick.js',
					'vendor/baldrickjs/plugins/modal.baldrick.js',
					'vendor/baldrickjs/src/jquery.baldrick.js',
					'vendor/baldrickjs/plugins/preload.baldrick.js'
				],
				dest: 'assets/js/baldrick_wp_front_end.js'
			},
			css: {
				src: [
					'assets/css/src/baldrick_wp_front_end.css',
					'vendor/baldrickjs/plugins/modal.css'
				],
				dest: 'assets/css/baldrick_wp_front_end.css'
			}
		},
		jshint: {
			browser: {
				all: [
					'assets/js/src/**/*.js'
				],
				options: {
					jshintrc: '.jshintrc'
				}
			},
			grunt: {
				all: [
					'Gruntfile.js'
				],
				options: {
					jshintrc: '.gruntjshintrc'
				}
			}   
		},
		uglify: {
			all: {
				files: {
					'assets/js/baldrick_wp_front_end.min.js': ['assets/js/baldrick_wp_front_end.js']
				},
				options: {
					banner: '/*! <%= pkg.title %> - v<%= pkg.version %> - <%= grunt.template.today("yyyy-mm-dd") %>\n' +
						' * <%= pkg.homepage %>\n' +
						' * Copyright (c) <%= grunt.template.today("yyyy") %>;' +
						' * Licensed GPLv2+' +
						' */\n',
					mangle: {
						except: ['jQuery']
					}
				}
			}
		},
		cssmin: {
			options: {
				banner: '/*! <%= pkg.title %> - v<%= pkg.version %> - <%= grunt.template.today("yyyy-mm-dd") %>\n' +
					' * <%= pkg.homepage %>\n' +
					' * Copyright (c) <%= grunt.template.today("yyyy") %>;' +
					' * Licensed GPLv2+' +
					' */\n'
			},
			minify: {
				expand: true,
				
				cwd: 'assets/css/',
				src: ['baldrick_wp_front_end.css'],
				
				dest: 'assets/css/',
				ext: '.min.css'
			}
		},
		watch:  {
			scripts: {
				files: ['assets/js/src/**/*.js', 'assets/js/vendor/**/*.js'],
				tasks: ['jshint', 'concat', 'uglify'],
				options: {
					debounceDelay: 500
				}
			}
		},
		gitclone: {
			clone: {
				options: {
					repository: 'https://github.com/Desertsnowman/BaldrickJS',
					branch: 'master',
					directory: 'vendor/baldrickjs'
				}
			}
		}
	} );

	// Default task.
	
	grunt.registerTask( 'default', [ 'concat', 'uglify', 'cssmin'] );
	

	grunt.util.linefeed = '\n';
};
