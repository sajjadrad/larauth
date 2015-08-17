<!DOCTYPE html>
<html>
    <head>
        <title>Welcome to admin dashboard</title>
        <link rel="stylesheet" href="{{asset('a/admin.css')}}">
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        @section('navbar')
        <nav class="top-bar" data-topbar role="navigation">
          <ul class="title-area">
            <li class="name">
              <h1><a href="{{URL::to(Config::get('app.settings.url.admin_dashboard'))}}">{{Config::get('app.settings.app.title')}}</a></h1>
            </li>
             <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
            <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
          </ul>

          <section class="top-bar-section">
            <!-- Right Nav Section -->
            <ul class="right">
              <li class="has-dropdown">
                <a href="#">@if($currentUser) {{$currentUser['fullname']}} @endif</a>
                <ul class="dropdown">
                  <li><a href="{{URL::to(Config::get('app.settings.url.admin_dashboard').'/settings')}}">Settings</a></li>
                  <li><a href="{{URL::to('logout')}}">Logout</a></li>
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
        <div class="large-2 columns">
            @section('sidebar')
            <ul class="side-nav">
                <li class="active"><a href="{{URL::to(Config::get('app.settings.url.admin_dashboard'))}}">Home</a></li>
                <li class="divider"></li>
                <li><a href="{{URL::to(Config::get('app.settings.url.admin_dashboard').'/users')}}">Users</a></li>
                <li><a href="{{URL::to(Config::get('app.settings.url.admin_dashboard').'/settings')}}">Settings</a></li>
            </ul>
            @show
        </div>
        <div class="large-10 columns">
            @yield('content')
        </div>

        <script src="{{asset('a/admin.js')}}"></script>
    </body>
</html>
