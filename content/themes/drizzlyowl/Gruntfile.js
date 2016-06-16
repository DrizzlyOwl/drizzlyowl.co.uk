require('quiet-grunt');

module.exports = function( grunt ) {

    // Load NPM tasks
    grunt.loadNpmTasks( 'grunt-notify' );
    grunt.loadNpmTasks( 'grunt-contrib-watch' );
    grunt.loadNpmTasks( 'grunt-contrib-uglify' );
    grunt.loadNpmTasks( 'grunt-pixrem' );
    grunt.loadNpmTasks( 'grunt-postcss' );
    grunt.loadNpmTasks( 'grunt-imageoptim' );
    grunt.loadNpmTasks( 'grunt-svgmin' );
    grunt.loadNpmTasks( 'grunt-grunticon' );
    grunt.loadNpmTasks( 'grunt-sass' );
    grunt.loadNpmTasks( 'grunt-uncss' );


    // Keep directories in variable for easy changes and CMS integration
    var dirs = {
        assets: 'assets',
    }

    grunt.initConfig({
        pkg: grunt.file.readJSON( 'package.json' ),
        dirs: dirs,

        notify_hooks: {
            options: {
                enabled: true,
                max_jshint_notifications: 3, // maximum number of notifications from jshint output
                duration: 0.5 // the duration of notification in seconds, for `notify-send only
            }
        },

        // Uglify [and Minify] Javascript
        uglify: {
            scripts: {
                options: {
                    compress: true,
                    sourceMap: true,
                    preserveComments: false,
                },
                files: {
                    'scripts.min.js': [
                        '<%= dirs.assets %>/js/scripts.js'
                    ]
                }
            }
        },

        // Compile Sass
        sass: {
            options: {
                sourceMap: false,
                outputStyle: 'compressed'
            },
            dist: {
                files: {
                    'style.css': '<%= dirs.assets %>/sass/style.scss',
                }
            }
        },

        // Fallback for rem's
        pixrem: {
            options: {
                rootvalue: '10px'
            },
            dist: {
                src: 'style.css',
                dest: 'style.css'
            }
        },

        // Autoprefix .css files
        postcss: {
            options: {
                processors: [
                    require('autoprefixer')({
                        browsers: [ 'last 2 versions', 'ie 8', 'ie 9', 'Firefox ESR', 'Opera 12.1' ],
                        remove: false
                    })
                ],
                map: true,
            },
            dist: {
                expand: true,
                flatten: true,
                src: [
                    'style.css',
                ]
            }
        },

        // Optimise Images
        imageoptim: {
            src: '<%= dirs.assets %>/imgs',
            options: {
                quitAfter: true
            }
        },

        // Minify .svg files
        svgmin: {
            options: {
                plugins:[
                    {
                        removeViewBox: false
                    },
                    {
                        removeUselessStrokeAndFill: false
                    },
                    {
                        convertPathData: {
                            straightCurves: false
                        }
                    }
                ]
            },
            dist: {
                files: [{
                    expand: true,
                    cwd: '<%= dirs.assets %>/imgs',
                    src: [ '**/*.svg' ],
                    dest: '<%= dirs.assets %>/imgs',
                    ext: '.svg'
                }]
            }
        },

        // Generate SVG/PNG icons + fallback
        grunticon: {
            icons: {
                files: [{
                    expand: true,
                    cwd: '<%= dirs.assets %>/imgs/icons',
                    src: [ '*.svg', '*.png' ],
                    dest: "<%= dirs.assets %>/grunticon"
                }],
                options: {
                    loadersnippet: "grunticon.loader.js",
                    cssprefix: ".icon--"
                }
            }
        },

        uncss: {
            dist: {
                options: {
                    stylesheets: 'style.css',
                    ignore: ['functions.html']
                },
                files: {
                    'tidy.css': ['*.html']
                }
            }
        },

        // Watch Task
        watch: {
            scripts: {
                files: [ '<%= dirs.assets %>/js/scripts.js' ],
                tasks: [ 'uglify', 'notify:uglify' ],
                options: {
                    spawn: false
                }
            },
            css: {
                files: '<%= dirs.assets %>/sass/**/*.scss',
                tasks: [ 'sass:dist', 'postcss:dist', 'notify:sass' ],
                options: {
                    livereload: true
                }
            },
            svg: {
                files: '<%= dirs.assets %>/img/icons/*.svg',
                tasks: [ 'svgmin', 'grunticon', 'sass:dist' ],
                options: {
                    livereload: true
                }
            }
        },

        notify: {
            uglify: {
                options: {
                    message: "Javascript compiled and minified successfully"
                }
            },
            sass: {
                options: {
                    message: 'CSS compiled and minified successfully' //required
                }
            }
        },
    });

    // Register above tasks
    grunt.registerTask(
        'default',
        [
            'svgmin',
            'grunticon',
            'imageoptim',
            'sass:dist',
            'pixrem:dist',
            'postcss',
            'uglify'
        ]
    );

    // This is required if you use any options.
    grunt.task.run('notify_hooks'); 
}

