<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function projects()
	{
		return $this->hasMany('Project');
	}

	public static function validateAndCreate(Illuminate\Http\Request $request)
    {
        $validator = new UserValidator();
        $userCreator = new UserCreator();

        $validator->validate($request);
        $user = $userCreator->createUser($request);
       
        
        return $user;
    }

    public static function validateAndUpdate(User $user, Illuminate\Http\Request $request)
    {
        $validator = new userValidator();
        $userUpdater = new userUpdater();
        

        $validator->validate($request);
        $user = $userUpdater->updateUser($request, $user);
        
        
        return $user;
    }

    // hash all the passwords!!
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

}
