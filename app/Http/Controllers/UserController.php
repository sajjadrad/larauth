<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cartalyst\Sentry\Facades\Laravel\Sentry;

class UserController extends Controller
{
    public function showLogin()
    {
    	if(\Config::get('app.settings.active.login'))
    		return view('users.login');
    	else
    		return "Login is disabled.";
    }
    public function showRegister()
    {
    	if(\Config::get('app.settings.active.register'))
    		return view('users.register');
    	else
    		return "Register is disabled.";
    }
    public function doLogin(Request $request)
    {
    	if($request->has('email') and $request->has('password'))
    	{
            try
            {
        		$email = $request->input('email');
        		$password = $request->input('password');
        		$remember = false;
        		if($request->has('remember'))
        			$remember = true;
        		$user = Sentry::authenticate(array('email'=>$email,'password'=>$password), $remember);
        		return redirect(\Config::get('app.settings.url.admin_dashboard'));

            }
            catch (\Cartalyst\Sentry\Users\LoginRequiredException $e)
            {
                echo 'Login field is required.';
            }
            catch (\Cartalyst\Sentry\Users\PasswordRequiredException $e)
            {
                echo 'Password field is required.';
            }
            catch (\Cartalyst\Sentry\Users\WrongPasswordException $e)
            {
                echo 'Wrong password, try again.';
            }
            catch (\Cartalyst\Sentry\Users\UserNotFoundException $e)
            {
                return 'User was not found.';
            }
            catch (\Cartalyst\Sentry\Users\UserNotActivatedException $e)
            {
                echo 'User is not activated.';
            }

            // The following is only required if the throttling is enabled
            catch (\Cartalyst\Sentry\Throttling\UserSuspendedException $e)
            {
                echo 'User is suspended.';
            }
            catch (\Cartalyst\Sentry\Throttling\UserBannedException $e)
            {
                echo 'User is banned.';
            }

    	}
    }
}
