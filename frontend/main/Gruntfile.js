module.exports = function (grunt) {

    grunt.loadNpmTasks('grunt-wiredep','grunt-sass');
	
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        watch: {
            css: {
				files: 'css/sass/*.scss',
				tasks: ['sass']
			}
        },
		sass: {
			dist: {
				options: {
					sourcemap: false
				},
				files: {
					'css/style.css' : 'css/sass/main.scss'
				}
			}
		}
    });
    
    
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.registerTask('default', ['sass']);
	
};

