<!DOCTYPE html>
<html>
    <head>
        <title>Welcome to admin dashboard</title>
         <link rel="stylesheet" href="{{asset('css/normalize.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/foundation.min.css')}}">
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        @section('navbar')
        <nav class="top-bar" data-topbar role="navigation">
          <ul class="title-area">
            <li class="name">
              <h1><a href="#">My Site</a></h1>
            </li>
             <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
            <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
          </ul>

          <section class="top-bar-section">
            <!-- Right Nav Section -->
            <ul class="right">
              <li class="active"><a href="#">Right Button Active</a></li>
              <li class="has-dropdown">
                <a href="#">Right Button Dropdown</a>
                <ul class="dropdown">
                  <li><a href="#">First link in dropdown</a></li>
                  <li class="active"><a href="#">Active link in dropdown</a></li>
                </ul>
              </li>
            </ul>
            <ul class="left">
              <li><a href="#">Left Nav Button</a></li>
            </ul>
          </section>
        </nav>
        @show
        @section('router')
        
        @show
        <div class="medium-2 columns">
            @section('sidebar')
            <ul class="side-nav">
                <li class="active"><a href="{{URL::to(Config::get('app.settings.url.admin_dashboard'))}}">Home</a></li>
                <li class="divider"></li>
                <li><a href="{{URL::to(Config::get('app.settings.url.admin_dashboard'))}}/users">Users</a></li>
            </ul>
            @show
        </div>
        <div class="medium-10 columns">
            @yield('content')
        </div>

        <script src="{{asset('/js/vendor/jquery.js')}}"></script>
        <script src="{{asset('/js/vendor/fastclick.js')}}"></script>
        <script src="{{asset('/js/foundation.min.js')}}"></script>
    </body>
</html>
