<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Classes\Permission;
use App\Classes\Setting;
use Illuminate\Http\Request;
use Cartalyst\Sentry\Facades\Laravel\Sentry;

class AdminController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth_s');
        $this->middleware('page_config');
    }
    public function getIndex()
    {
    	return view('admin.dashboard');
    }
    public function getUsers()
    {
    	$groups = Sentry::findAllGroups();
    	$users = User::select(array('id','first_name','last_name','email'))->paginate(20);
    	return view('admin.users')->with('users',$users)->with('groups',$groups);
    }
    public function getSettings()
    {
        $settings = Setting::getAll();
        
        return view('admin.settings')->with('settings',$settings);
    }
    public function postSettings(Request $request)
    {
        $appTitle = $request->get('app-title');
        $adminURL = $request->get('admin-url');
        $registerURL = $request->get('register-url');
        $loginURL = $request->get('login-url');
        $appActivate = false;
        $loginActivate = false;
        $registerActivate = false;
        if($request->has('app-activate'))
            $appActivate = true;
        if($request->has('login-activate'))
            $loginActivate = true;
        if($request->has('register-activate'))
            $registerActivate = true;
        Setting::save(array('login_act' =>  $loginActivate,'reg_act'=>  $registerActivate));
        return redirect()->back();
    }
    public function showUser($id)
    {
    	$currentUser = Sentry::getUser();
    	$user = Sentry::findUserById($id);
    	if($user)
    	{
    		$allGroups = Sentry::findAllGroups();
    		$hasPower = Permission::hasPower($user,$currentUser);
    		return view('admin.edituser')->with('currentUser',$currentUser)->with('user',$user)->with('allGroups',$allGroups)->with('hasPower',$hasPower);
    	}
    	else
    		echo "User not found.";
    }
    public function editUser(Request $request,$id)
    {
        $currentUser = Sentry::getUser();
        $outputMessage = array();
        if($currentUser->hasAccess('superadmin'))
        {
            $user = User::find($id);
            if($user and ($currentUser->hasAccess('god') or !$user->hasAccess('god')))
            {
                $user->first_name = $request->get('firstname');
                $user->last_name = $request->get('lastname');
                $user->save();
                $outputMessage[] = array(
                                                "type"  =>  "success",
                                                "msg"   =>  "User edited successfuly.");
                return redirect()->back()->with('messages',$outputMessage);
            }
            else
            {
                $outputMessage[] = array(
                                                "type"  =>  "alert",
                                                "msg"   =>  "You have not access to do this action.");
                return redirect()->back()->with('messages',$outputMessage);
            }
        }
        else
        {
            $outputMessage[] = array(
                                            "type"  =>  "alert",
                                            "msg"   =>  "You have not access to do this action.");
            return redirect()->back()->with('messages',$outputMessage);
        }

    }
    public function deleteUser(Request $request)
    {
    	$outputMessage = array();
    	if($request->has('id'))
    	{
    		$currentUser = Sentry::getUser();
    		if($currentUser->hasAccess('admin'))
    		{
    			$user = User::find($request->get('id'));
    			if($user and $user->delete())
    			{
					$outputMessage[] = array(
												"type"	=>	"success",
												"msg"	=>	"User deleted successfuly."
											);
    				return redirect()->back()->with('messages',$outputMessage);
    			}
    			else
    			{
	    			$outputMessage[] = array(
													"type"	=>	"alert",
													"msg"	=>	"User not found."
												);
					return redirect()->back()->with('messages',$outputMessage);
	    		}
    		}
    		else
    		{
    			$outputMessage[] = array(
												"type"	=>	"alert",
												"msg"	=>	"You have not permission to delete user."
											);
				return redirect()->back()->with('messages',$outputMessage);
    		}
    	}
    	else
		{
			return redirect(\Config::get('app.settings.url.admin_dashboard').'/users');
		}
    }
    public function postUsers(Request $request)
    {
    	$outputMessage = array();
    	if($request->has('action'))
    	{
    		switch ($request->get('action'))
    		{
    			case 'new':
    				$email = $request->get('email');
    				$password = $request->get('password');
    				$firstname = $request->get('firstname');
    				$lastname = $request->get('lastname');
    				//$groupName = $request->get('group');
    				$groupID = $request->get('group');
                    try
                    {
    					$user = Sentry::register(array(
    						'email'    	=> $email,
    						'first_name'=> $firstname,
    						'last_name'	=> $lastname,
    					    'password' 	=> $password,
    					    'activated'	=>	true,
    					));
                        if($user)
                        {
                            $outputMessage[] = array(
                                                            "type"  =>  "success",
                                                            "msg"   =>  "User created successfuly."
                                                        );
                            if($groupID == 1)
                            {
                                $group = Sentry::findGroupByName('user');
                                $user->addGroup($group);
                                $outputMessage[] = array(
                                                            "type"  =>  "alert",
                                                            "msg"   =>  "The God is unique.User is added to User group ;)"
                                                        );
                            }
                            else
                            {
                                $group = Sentry::findGroupById($groupID);
                                if($group)
                                {
                                    $user->addGroup($group);
                                    $outputMessage[] = array(
                                                            "type"  =>  "success",
                                                            "msg"   =>  "User added to ".$group->name." successfuly"
                                                        );
                                }
                                else
                                {
                                    $group = Sentry::findGroupByName('user');
                                    $user->addGroup($group);
                                    $outputMessage[] = array(
                                                                "type"  =>  "alert",
                                                                "msg"   =>  "Group ".$group->name." not found.User is added to User group ;)"
                                                            );
                                }
                            }                   
                        }
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
                                                    "msg"   =>  "Login field is required."
                                                );
                    }
                    catch (\Cartalyst\Sentry\Users\UserExistsException $e)
                    {
                        $outputMessage[] = array(
                                                    "type"  =>  "alert",
                                                    "msg"   =>  "User with this login already exists."
                                                );
                    }
                    catch (\Cartalyst\Sentry\Groups\GroupNotFoundException $e)
                    {
                        $outputMessage[] = array(
                                                    "type"  =>  "alert",
                                                    "msg"   =>  "Group was not found."
                                                );
                    }
    				break;
    		}
    	}
    	$groups = Sentry::findAllGroups();
    	$users = User::select(array('id','first_name','last_name','email'))->paginate(20);
    	return view('admin.users')->with('users',$users)->with('groups',$groups)->with('messages',$outputMessage);
    }
}
