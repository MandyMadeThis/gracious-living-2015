module.exports = function(grunt) {

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        // compile Sass - with standard sourcemaps
        sass: {
            dest: {
                options: {
                    style: 'compressed'
                },
                files: {
                    'style.css': 'framework/scss/style.scss'
                }
            }
        },

        //autoprefix all our CSS 
        autoprefixer: {
            options: {
                browsers: ['> 1%', 'last 2 versions', 'ie 8', 'ie 9',],
                map: {
                    annotation: true
                }
            },
            no_dest: {
                src: 'style.css' // overwrite our css file
            },
        },

        // watch these files and do these tasks when something changes
        watch: {
            css: {
                files: ['framework/scss/**/*.scss'],
                tasks: ['sass'],
                options: {
                    spawn: false,
                }
            }
        },

        // Notify us only when there's a problem
        notify_hooks: {
            options: {
                enabled: true,
                success: false, // whether successful grunt executions should be notified automatically
                duration: 2.5, // the duration of notification in seconds, for `notify-send only
                title: "OH SNAP!! Looks like there's an issue:", 
                message: "Houston, we have a problem..."
            }
        }
    });

    // Grunt  plug-in list.
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-autoprefixer');
    grunt.loadNpmTasks('grunt-notify');

    // type: 'grunt' for development tasks.
    grunt.registerTask('default', ['sass', 'autoprefixer', 'notify_hooks', 'watch']);

};