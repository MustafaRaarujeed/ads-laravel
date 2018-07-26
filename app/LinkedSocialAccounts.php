<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LinkedSocialAccounts extends Model
{
	/**
	 * [$fillable description]
	 * @var [type]
	 */
 	protected $fillable = ['provider_name', 'provider_id'];
 

 	/**
 	 * [user description]
 	 * @return [type] [description]
 	 */
    public function user()
	{
	    return $this->belongsTo('App\User');
	}

}
