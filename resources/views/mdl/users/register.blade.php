<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/foundation.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form>
            <div class="row">
                <div class="small-5 large-centered columns">
                    <fieldset>
                        <legend>Register</legend>
                        <div class="large-12 columns">
                            <label>Email:
                                <input type="text" name="email">
                            </label>
                        </div>
                        <div class="large-12 columns">
                            <label>Password:
                                <input type="password" name="password">
                            </label>
                        </div>
                        <div class="large-12 columns">
                            <label>Confirm Passwrd:
                                <input type="password" name="confirm-password">
                            </label>
                        </div>
                        <div class="small-6 large-centered columns">
                            <input type="submit" name="login" value="Register" class="button expand">
                        </div>
                        
                    </fieldset>
                </div>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </body>
</html>
