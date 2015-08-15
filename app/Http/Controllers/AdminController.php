<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Cartalyst\Sentry\Facades\Laravel\Sentry;

class AdminController extends Controller
{
    public function getIndex()
    {
    	return view('admin.dashboard');
    }
    public function getUsers()
    {
    	$users = User::select(array('id','first_name','last_name','email'))->paginate(20);
    	return view('admin.users')->with('users',$users);
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
    				$groupName = $request->get('group');		
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
														"type"	=>	"success",
														"msg"	=>	"User created successfuly."
													);
						if($groupName == 'god')
						{
							$group = Sentry::findGroupByName('user');
							$user->addGroup($group);
							$outputMessage[] = array(
														"type"	=>	"alert",
														"msg"	=>	"The God is unique.User is added to User group ;)"
													);
						}
						else
						{
							$group = Sentry::findGroupByName($groupName);
							if($group)
							{
								$user->addGroup($group);
								$outputMessage[] = array(
														"type"	=>	"success",
														"msg"	=>	"User added to ".$groupName." successfuly"
													);
							}
							else
							{
								$group = Sentry::findGroupByName('user');
								$user->addGroup($group);
								$outputMessage[] = array(
															"type"	=>	"alert",
															"msg"	=>	"Group ".$groupName." not found.User is added to User group ;)"
														);
							}
						}					
					}
    				break;
    			
    			default:
    				# code...
    				break;
    		}
    	}
    	$users = User::select(array('id','first_name','last_name','email'))->paginate(20);
    	return view('admin.users')->with('users',$users)->with('messages',$outputMessage);
    }
}
