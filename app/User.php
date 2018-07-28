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

    /**
     * [$guarded description]
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * [userable description]
     * @return [type] [description]
     */
    public function userable()
    {
        return $this->morphTo();
    }

    /**
     * [managers description]
     * @return [type] [description]
     */
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

    /**
     * [accounts description]
     * @return [type] [description]
     */
    public function accounts()
    {
        return $this->hasMany('App\LinkedSocialAccounts');
    }

    /**
     * [categories description]
     * @return [type] [description]
     */
    public function categories()
    {
        return $this->hasMany('App\Category');
    }

    /**
     * [banners description]
     * @return [type] [description]
     */
    public function banners()
    {
        return $this->hasMany('App\Banner');
    }

    /**
     * [createAndAssociate description]
     * @param  [type] $fields   [description]
     * @param  [type] $userType [description]
     * @return [type]           [description]
     */
    public static function createAndAssociate($fields, $userType)
    {
        $user = User::create($fields);
        $user->userable()->associate($userType);
        $user->save();
        return $user;
    }

    /**
     * [createManager description]
     * @param  [type] $fields [description]
     * @return [type]         [description]
     */
    public static function createManager($fields)
    {
        return User::createAndAssociate(
            $fields,
            Manager::create()
        );
    }
}
