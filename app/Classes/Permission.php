<?php

namespace App\Classes;

use App\Models\User;
use Cartalyst\Sentry\Facades\Laravel\Sentry;

class Permission
{
    public static function hasPower($user,$currentUser)
    {
        if(!$user->hasAccess('god') and ($currentUser->hasAccess('god') or (($currentUser->hasAccess('admin') and !$user->hasAccess('superadmin')) or ($currentUser->hasAccess('superadmin') ))))
            return true;
        else
            return false;
    }

}
