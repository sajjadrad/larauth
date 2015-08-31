<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use App\Classes\Setting;
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
        $settings = Setting::getAll();
    	if($settings->registerActivate)
    		return view('users.register');
    	else
    		return "Register is disabled.";
    }
    
    public function doLogin(Request $request)
    {
    	if($request->has('email') and $request->has('password'))
    	{
            $outputMessage = array();
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
                $outputMessage[] = array(
                                            "type"  =>  "alert",
                                            "msg"   =>  "Login field is required."
                                        );
            }
            catch (\Cartalyst\Sentry\Users\PasswordRequiredException $e)
            {
                $outputMessage[] = array(
                                            "type"  =>  "alert",
                                            "msg"   =>  "Password field is required."
                                        );
            }
            catch (\Cartalyst\Sentry\Users\WrongPasswordException $e)
            {
                $outputMessage[] = array(
                                            "type"  =>  "alert",
                                            "msg"   =>  "Wrong password, try again."
                                        );
            }
            catch (\Cartalyst\Sentry\Users\UserNotFoundException $e)
            {
                $outputMessage[] = array(
                                            "type"  =>  "alert",
                                            "msg"   =>  "User was not found."
                                        );
            }
            catch (\Cartalyst\Sentry\Users\UserNotActivatedException $e)
            {
                $outputMessage[] = array(
                                            "type"  =>  "alert",
                                            "msg"   =>  "User is not activated."
                                        );
            }

            // The following is only required if the throttling is enabled
            catch (\Cartalyst\Sentry\Throttling\UserSuspendedException $e)
            {
                $outputMessage[] = array(
                                            "type"  =>  "alert",
                                            "msg"   =>  "User is suspended."
                                        );
            }
            catch (\Cartalyst\Sentry\Throttling\UserBannedException $e)
            {
                $outputMessage[] = array(
                                            "type"  =>  "alert",
                                            "msg"   =>  "User is banned."
                                        );
            }
            return view('users.login')->with('messages',$outputMessage);

    	}
        else
        {
            $outputMessage[] = array(
                                            "type"  =>  "alert",
                                            "msg"   =>  "Login and password field is required."
                                        );
            return view('users.login')->with('messages',$outputMessage);
        }
    }
}
