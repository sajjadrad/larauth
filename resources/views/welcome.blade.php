<!DOCTYPE html>
<html>
    <head>
        <title>Larauth</title>

        <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
            .block
            {
                display: inline-block;
                text-align: center;
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Larauth v0.3</div>
                <h3 style="margin-top:40px">Powered By</h3>
                
                <a href="http://laravel.com" class="block">
                    <img src="{{asset('logos/laravel.png')}}">
                    <span style="display:block">
                        Laravel 5
                    </span>
                </a>
                <a href="https://getcomposer.org/" class="block">
                    <img src="{{asset('logos/composer.png')}}">
                    <span style="display:block">
                        Composer
                    </span>
                </a>
                <a href="https://cartalyst.com/manual/sentry/2.1" class="block">
                    <img src="{{asset('logos/cartlyst.png')}}">
                    <span style="display:block">
                        Cartlyst Sentry 2.1
                    </span>
                </a>
                <a href="https://git-scm.com/" class="block">
                    <img src="{{asset('logos/git.png')}}">
                    <span style="display:block">
                        Git
                    </span>
                </a>
                <a href="http://foundation.zurb.com/" class="block">
                    <img src="{{asset('logos/zerb.png')}}">
                    <span style="display:block">
                        Zerb Foundation 5
                    </span>
                </a>
                <a href="http://gruntjs.com/" class="block">
                    <img src="{{asset('logos/grunt.png')}}">
                    <span style="display:block">
                        Grunt
                    </span>
                </a>
                
                
            </div>
        </div>
    </body>
</html>
