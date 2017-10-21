module.exports = function (grunt) {

    grunt.loadNpmTasks('grunt-contrib-sass');
	
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        watch: {
            css: {
				files: 'public/main/css/sass/*.scss',
				tasks: ['sass']
			}
        },
		sass: {
			dist: {
				files: {
					'public/main/css/style.css' : 'public/main/css/sass/main.scss'
				}
			}
		}
    });

    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.registerTask('default', ['sass']);
	
};

