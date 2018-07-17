<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Category;
use Illuminate\Http\Request;

class ManageAdsController extends Controller
{
	/**
	 * To display categories and banners with forms to fill
     * new entries for both models
	 * @return view with banners and categories model
	 */
    public function index()
    {
    	$banners = Banner::all();
        $categories = Category::all();
        return view('manage.ads.index', [
            'banners' => $banners,
            'categories' => $categories
        ]);
    }

    /* Category */
    
    /**
     * [catIndex description]
     * @return [type] [description]
     */
    public function catIndex()
    {
    	# code...
    }
    
    /**
     * [catAdd description]
     * @return [type] [description]
     */
    public function catAdd()
    {
    	# code...
    }

    /**
     * [catEdit description]
     * @return [type] [description]
     */
    public function catEdit()
    {
    	# code...
    }

    /**
     * [catUpdate description]
     * @return [type] [description]
     */
    public function catUpdate()
    {
    	# code...
    }

    /**
     * [catDelete description]
     * @return [type] [description]
     */
    public function catDelete()
    {
    	# code...
    }

    /* Banner */

    /**
     * [bannerIndex description]
     * @return [type] [description]
     */
    public function bannerIndex()
    {
    	# code...
    }
    
    /**
     * [bannerAdd description]
     * @return [type] [description]
     */
    public function bannerAdd()
    {
    	# code...
    }

    /**
     * [bannerEdit description]
     * @return [type] [description]
     */
    public function bannerEdit()
    {
    	# code...
    }

    /**
     * [bannerUpdate description]
     * @return [type] [description]
     */
    public function bannerUpdate()
    {
    	# code...
    }

    /**
     * [bannerDelete description]
     * @return [type] [description]
     */
    public function bannerDelete()
    {
    	# code...
    }
}
