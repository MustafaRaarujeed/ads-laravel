<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

	/**
	 * [$fillable description]
	 * @var [type]
	 */
    protected $fillable = [
        'name_ar',
        'name_en',
        'is_visible',
    ];

    /**
     * [user description]
     * @return [type] [description]
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * [banners description]
     * @return [type] [description]
     */
	public function banners()
	{
    	return $this->hasMany('App\Banner', 'category_id', 'id');
    }

}
