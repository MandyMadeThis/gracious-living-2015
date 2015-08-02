module.exports = function(grunt) {

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        // compile Sass - with standard sourcemaps
        sass: {
            dest: {
                options: {
                    style: 'compressed',
                    banner: '/*!\n' +
                              ' * Theme Name: X\n' +
                              ' * Theme URI: <%= pkg.url %> http://theme.co/x/\n' +
                              ' * Description: An immensely powerful and endlessly customizable WordPress theme.\n' +
                              ' * Author: Themeco with Customizations by Mandy Thomson\n' +
                              ' * Author http://theme.co/ & http://mandymadethis.com/\n' +
                              ' * Version: 4.0.3\n' +
                              ' * License: GNU General Public License v2.0\n' +
                              ' * License URI: http://www.gnu.org/licenses/gpl-2.0.html\n' +
                              ' * Text Domain: __x__\n' +
                              ' */\n'
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