<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try
		{
			$superAdminGroup = Sentry::createGroup(array(
			    'name'        => 'God',
			    'permissions' => array(
			    	'god'			=>	1,
			    	'superadmin'	=>	1,
			        'admin' 		=>  1,
			        'user' 			=>  1,
			    ),
			));
			$superAdminGroup = Sentry::createGroup(array(
			    'name'        => 'SuperAdmin',
			    'permissions' => array(
			    	'superadmin'	=>	1,
			        'admin' 		=> 1,
			        'user' 		=> 1,
			    ),
			));
			$group = Sentry::createGroup(array(
			    'name'        => 'Admin',
			    'permissions' => array(
			        'admin' 		=> 1,
			        'user' 		=> 1,
			    ),
			));
			$group = Sentry::createGroup(array(
			    'name'        => 'User',
			    'permissions' => array(
			        'user' 		=> 1,
			    ),
			));
		}
		catch (Cartalyst\Sentry\Groups\NameRequiredException $e)
		{
		    echo 'Name field is required';
		}
		catch (Cartalyst\Sentry\Groups\GroupExistsException $e)
		{
		    echo 'Group already exists';
		}
		try
		{
		    $user = Sentry::register(array(
		    	'email'    	=> \Config::get('app.settings.default.sadmin.email'),
		    	'first_name'=> \Config::get('app.settings.default.sadmin.first_name'),
		    	'last_name'	=> \Config::get('app.settings.default.sadmin.last_name'),
		        'password' 	=> \Config::get('app.settings.default.sadmin.password'),
		        'activated'	=>	true,
		    ));
		    $godGroup = Sentry::findGroupByName('god');
		    $user->addGroup($godGroup);
		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
		    echo 'Login field is required.';
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
		    echo 'Password field is required.';
		}
		catch (Cartalyst\Sentry\Users\UserExistsException $e)
		{
		    echo 'User with this login already exists.';
		}
		
    }
}
