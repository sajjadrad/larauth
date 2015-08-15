<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/foundation.min.css">
        <link rel="stylesheet" href="css/material.indigo-pink.min.css">
        <script src="{{asset('/js/material.min.js')}}"></script>
        <link rel="stylesheet" href="{{asset('/css/icon?family=Material+Icons')}}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style type="text/css">
            .mdl-card__title
            {
                background-color: #46B6AC;
                height: 96px;
                color: #fff;
            }
            .mdl-card__menu
            {
                
            }
        </style>
    </head>
    <body style="background-color:#FAFAFA">
        <form action="{!!URL::to('login')!!}" method="POST">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--4-col"></div>
                <div class="mdl-cell mdl-cell--4-col">
                    <div class="mdl-card mdl-shadow--2dp ">
                        <div class="mdl-card__title mdl-card--expand">
                            <h2 class="mdl-card__title-text">Login</h2>
                        </div>
                        <div class="mdl-card__supporting-text">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="text" id="email" name="email" />
                                <label class="mdl-textfield__label" for="email">Email</label>
                            </div>
                             <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="password" id="password" name="password" />
                                <label class="mdl-textfield__label" for="password">Password</label>
                            </div>
                            <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="remember">
                              <input type="checkbox" id="remember" class="mdl-checkbox__input" name="remember" checked />
                              <span class="mdl-checkbox__label">Remember</span>
                            </label>

                        </div>
                        <div class="mdl-card__actions mdl-card--border">
                            <input type="submit" name="login" value="Login" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                        </div>
                    </div>
                </div>
            </div>
            <div class="mdl-cell mdl-cell--4-col"></div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </body>
</html>
