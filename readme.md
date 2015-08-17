# Larauth 0.3
A Laravel 5 framework with Sentry authentication and some useful tools for starting faster.

## Powered by
![alt tag](https://raw.github.com/sajjadrad/larauth/master/public/logos/laravel.png)
![alt tag](https://raw.github.com/sajjadrad/larauth/master/public/logos/composer.png)
![alt tag](https://raw.github.com/sajjadrad/larauth/master/public/logos/cartlyst.png)
![alt tag](https://raw.github.com/sajjadrad/larauth/master/public/logos/git.png)
![alt tag](https://raw.github.com/sajjadrad/larauth/master/public/logos/zerb.png)
![alt tag](https://raw.github.com/sajjadrad/larauth/master/public/logos/grunt.png)

## Installing
* Install composer [https://getcomposer.org/download].
* Clone repo
* Run "composer update" command in repo directory.
* Publish Sentry 2.1 "php artisan config:publish cartalyst/sentry".
* Set database name,username,password in laravel configure file.
* Set app name and default user name and email in config/app.php,settings section.
* Run "php artisan migrate:install".
* Run "php artisan migrate".
* Seed god user "php artisan migrate:refresh --seed".
* Login to panel.
