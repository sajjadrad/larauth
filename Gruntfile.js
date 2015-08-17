module.exports = function(grunt) {
grunt.initConfig({
//___________________________________________ JS ___________________________________________//
uglify:{
options: {
			compress: {
			 drop_console: true //for production
			},
			//beautify: true, //for development
		},
	build:{files:{
	'public/a/admin.js': [ //footer
		'public/a/source/js/vendor/jquery.js',
		'public/a/source/js/vendor/fastclick.js',
		'public/a/source/js/foundation.min.js',
],

}}},
//___________________________________________ CSS ___________________________________________//
cssmin:{target:{files:{
	'public/a/admin.css': [
		'public/a/source/css/normalize.css',
		'public/a/source/css/foundation.min.css',
],

}}},

//___________________________________________ WATCHDOG ___________________________________________//
watch: {
	scripts: {
		files: ['public/a/source/**/*.*','Gruntfile.js'],
		tasks: ['cssmin', 'uglify'],
		options: { spawn: false },
	},
}

});
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	//grunt.loadNpmTasks('grunt-contrib-copy');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.registerTask('default', ['cssmin', 'uglify']);
};

/* ------- USE THIS COMMAND TO RUN GRUNT WATCH FOREVER:

nohup grunt watch &

---------------------------------------------------- */