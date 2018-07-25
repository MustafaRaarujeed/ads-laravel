<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const ADMIN = "Admin";
    const MANAGER = "Manager";
    const ADVERTISER = "Advertiser";


    protected $guarded = [];

    // /**
    //  * The attributes that are mass assignable.
    //  *
    //  * @var array
    //  */
    // protected $fillable = [
    //     'name', 'email', 'password', 'confirmed', 
    // ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function userable()
    {
        return $this->morphTo();
    }

    public static function managers()
    {
        return User::where('userable_type', Manager::class());
    }

    // public static function admins()
    // {
    //     return User::where('userable_type', Admin::class());
    // }

    // public static function advertisers()
    // {
    //     return User::where('userable_type', Advertiser::class());
    // }

    public static function createAndAssociate($fields, $userType)
    {
        $user = User::create($fields);
        $user->userable()->associate($userType);
        $user->save();
        return $user;
    }

    public static function createManager($fields)
    {
        return User::createAndAssociate(
            $fields,
            Manager::create()
        );
    }
}
