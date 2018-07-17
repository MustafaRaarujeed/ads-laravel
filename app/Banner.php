<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{

	/**
	 * [$fillable description]
	 * @var [type]
	 */
	protected $fillable = [
        'category_id',
        'title',
        'link',
        'sort',
        'desc',
        'is_featured',
        'is_visible',
        'image',
    ];


    public function categories()
    {
    	return $this->belongsTo('App\Category', 'category_id');
    }
}