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
    	return view('manage.ads.category.add');
    }
    
    /**
     * [catAdd description]
     * @return [type] [description]
     */
    public function catAdd(Request $request)
    {
        // Validation
        $rules = [
            'cat_ar' => 'required',
            'cat_en' => 'required',
            'visible' => 'required',
        ];
        if($this->validate($request, $rules)) {
            try {
                $new_cat = new Category();
                $new_cat->name_ar = $request['cat_ar'];
                $new_cat->name_en = $request['cat_en'];
                $new_cat->is_visible = $request['visible'];
                $new_cat->user_id = auth()->user()->id;
                $new_cat->save();
                return redirect()->route('ads.index');
            } catch(Exception $e) {
                print_r($e);
            }
        } else {
            // Print Message for Filling the required once
        }
    }

    /**
     * [catEdit description]
     * @return [type] [description]
     */
    public function catEdit($id)
    {
        $edit_cat = Category::find($id);
        // dd($edit_cat->name_ar);
        return view('manage.ads.category.edit', [
            'category' => $edit_cat
        ]);
    }

    /**
     * [catUpdate description]
     * @return [type] [description]
     */
    public function catUpdate(Request $request, $id)
    {
    	$rules = [
            'cat_ar' => 'required',
            'cat_en' => 'required',
        ];
        if($this->validate($request, $rules)) {
            try {
                $cat = Category::find($id);
                $cat->name_ar = $request['cat_ar'];
                $cat->name_en = $request['cat_en'];
                $cat->is_visible = $request['visible'];
                $cat->save();
                return redirect()->route('ads.index');
            } catch(Exception $e) {
                print_r($e);
            }
        } else {
            // Error Messages
        }
    }

    /**
     * [catDelete description]
     * @return [type] [description]
     */
    public function catDelete($id)
    {
        $cat = Category::find($id);
        $cat->delete();
        return redirect()->route('ads.index');
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
