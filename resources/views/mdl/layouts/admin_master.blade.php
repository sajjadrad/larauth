<!DOCTYPE html>
<html>
    <head>
        <title>Welcome to admin dashboard</title>
        <link rel="stylesheet" href="{{asset('css/material.indigo-pink.min.css')}}">
        <script src="{{asset('js/material.min.js')}}"></script>
        <link rel="stylesheet" href="{{asset('css/styles.css')}}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style type="text/css">
            @font-face{
              font-family: 'Material Icons';
              font-style: normal;
              font-weight: 400;
              src: local('Material Icons'), local('MaterialIcons-Regular'), url('{{asset("/css/2fcrYFNaTjcS6g4U3t-Y5ZjZjT5FdEJ140U2DJYC3mY.woff2")}}') format('woff2'),url('{{asset("/css/2fcrYFNaTjcS6g4U3t-Y5ewrjPiaoEww8AihgqWRJAo.woff2")}}') format('woff');
            }

            .material-icons {
              font-family: 'Material Icons';
              font-weight: normal;
              font-style: normal;
              font-size: 24px;
              line-height: 1;
              letter-spacing: normal;
              text-transform: none;
              display: inline-block;
              word-wrap: normal;
              -moz-font-feature-settings: 'liga';
              -moz-osx-font-smoothing: grayscale;
            }

        </style>
    </head>
    <body>
        <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
        @section('navbar')
            <header class="demo-header mdl-layout__header mdl-color--white mdl-color--grey-100 mdl-color-text--grey-600">
                <div class="mdl-layout__header-row">
                  <span class="mdl-layout-title">Home</span>
                  <div class="mdl-layout-spacer"></div>
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
                    <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
                      <i class="material-icons">search</i>
                    </label>
                    <div class="mdl-textfield__expandable-holder">
                      <input class="mdl-textfield__input" type="text" id="search" />
                      <label class="mdl-textfield__label" for="search">Enter your query...</label>
                    </div>
                  </div>
                  <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
                    <i class="material-icons">more_vert</i>
                  </button>
                  <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
                    <li class="mdl-menu__item">About</li>
                    <li class="mdl-menu__item">Contact</li>
                    <li class="mdl-menu__item">Legal information</li>
                  </ul>
                </div>
            </header>
        @show
        @section('router')
        
        @show
            @section('sidebar')
                <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
                    <header class="demo-drawer-header">
                      <img src="{{asset('images/user.jpg')}}" class="demo-avatar">
                      <div class="demo-avatar-dropdown">
                        <span>hello@example.com</span>
                        <div class="mdl-layout-spacer"></div>
                        <button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                        </button>
                        
                      </div>
                    </header>
                    <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
                      <a class="mdl-navigation__link" href="{{URL::to(Config::get('app.settings.url.admin_dashboard'))}}"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">home</i>Home</a>
                      <a class="mdl-navigation__link" href="{{URL::to(Config::get('app.settings.url.admin_dashboard'))}}/users"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">people</i>Users</a>
                      <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">delete</i>Trash</a>
                      <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">report</i>Spam</a>
                      <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">forum</i>Forums</a>
                      <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">flag</i>Updates</a>
                      <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">local_offer</i>Promos</a>
                      <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">shopping_cart</i>Purchases</a>
                      <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">people</i>Social</a>
                      <div class="mdl-layout-spacer"></div>
                      <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">help_outline</i><span class="visuallyhidden">Help</span></a>
                    </nav>
                </div>
            @show
        <main class="mdl-layout__content mdl-color--grey-100">
            @yield('content')
        </main>
        </div>
    </body>
</html>
