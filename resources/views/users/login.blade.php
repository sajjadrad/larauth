<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="{{asset('a/admin.css')}}">
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
            <div class="row">
              <div class="small-4 small-centered columns">
                <fieldset>
                    <legend>Login</legend>
                    @if(isset($messages) and $messages)
                        <div>
                            @foreach($messages as $message)
                                 <div class="label {{$message['type']}}">{{$message['msg']}}</div>
                            @endforeach
                        </div>
                    @endif
                    <label>Email
                        <input type="text" id="email" name="email" placeholder="Email">
                    </label>
                    <label>Password
                        <input type="password" id="email" id="password" name="password">
                    </label>
                    <input id="remember" type="checkbox" name="remember"><label for="remember">Remember</label>
                    <input type="submit" name="login" value="Login" class="button small">
                </fieldset>

              </div>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </body>
</html>
