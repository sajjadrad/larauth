<?php

namespace App\Classes;

use App\Models\SettingModel;

class Setting
{
	public $loginActivate = true;
	public $registerActivate = true;

	function __construct($settings)
	{
		foreach ($settings as $setting) 
		{
			switch ($setting->key)
			{
				case 'login_act':
					if(!$setting->value)
						$this->loginActivate = false;
					break;
				case 'reg_act':
					if(!$setting->value)
						$this->registerActivate = false;
					break;
			}
		}
	}
	public static function getAll()
	{
		$settings = SettingModel::all();
		$settingObject = new Self($settings);
		return $settingObject;
	}
	public static function save($settings)
	{
		if(is_array($settings))
		{
			foreach ($settings as $key => $value)
			{
				$tmp = SettingModel::firstOrCreate(array('key'=>$key));
				if(!$value)
					$value = false;
				$tmp->value = $value;
				$tmp->save();
			}
		}
	}
}
