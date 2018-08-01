<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Category;
use App\Services\MultiLangCombineService;
use App\Services\SlugService;
use Illuminate\Http\Request;

class ManageAdsController extends Controller
{
    // TODO: Order By
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
            'cat_en' => 'required',
            'cat_ar' => 'required',
            'visible' => 'required',
        ];
        if($this->validate($request, $rules)) {
            try {
                $new_cat = new Category();

                $nameCombineService = new MultiLangCombineService();
                $nameJson = $nameCombineService->createCombineJson($request['cat_en'], $request['cat_ar']);
                $new_cat->name = $nameJson;

                $new_cat->is_visible = $request['visible'];
                $new_cat->user_id = auth()->user()->id;

                // Slug/Link Url
                $slugService = new SlugService();
                $slug = $slugService->createSlug($request['cat_en']);
                $new_cat->link = $slug;

                $new_cat->save();
                return redirect()->route('ads.index');
            } catch(\Exception $e) {
                print_r($e);
            }
        }
    }

    /**
     * [catEdit description]
     * @return [type] [description]
     */
    public function catEdit($slug)
    {
        $edit_cat = Category::where('link', $slug)->first();
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

                $nameCombineService = new MultiLangCombineService();
                $nameJson = $nameCombineService->createCombineJson($request['cat_en'], $request['cat_ar']);
                $cat->name = $nameJson;

                $cat->is_visible = $request['visible'];

                // Slug/Link Url
                $slugService = new SlugService();
                $slug = $slugService->createSlug($request['cat_en']);
                $cat->link = $slug;

                $cat->save();
                return redirect()->route('ads.index');
            } catch(\Exception $e) {
                print_r($e);
            }
        }
    }

    /**
     * [catDelete description]
     * @return [type] [description]
     */
    public function catDelete($id)
    {
        // TODO: cascade delete of banner
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
        $categories = Category::all();
    	return view('manage.ads.banner.add', [
    	    'categories' => $categories
        ]);
    }
    
    /**
     * [bannerAdd description]
     * @return [type] [description]
     */
    public function bannerAdd(Request $request)
    {
        // TODO: Image Upload file Size
        // TODO: Image Upload file extension
        // TODO: S3 Image Upload File
        // TODO: Path of Image Upload
        // TODO: error messages upon wrong file submitted

        // Validation
        $rules = [
            'category' => 'required',
            'title_en' => 'required',
            'title_ar' => 'required',
            'visible' => 'required',
            'featured' => 'required',
            'image' => 'required', // specify a mime type
        ];
        if($this->validate($request, $rules)) {
            try {
                $banner = new Banner();
                $banner->user_id = auth()->user()->id;
                $banner->category_id = $request['category'];

                // Title Arabic and English (JSON Object)
                $titleCombineService = new MultiLangCombineService();
                $title_json = $titleCombineService->createCombineJson($request['title_en'], $request['title_ar']);
                $banner->title = $title_json;

                // Description Arabic and English (JSON Object)
                $descCombineService = new MultiLangCombineService();
                $desc_json = $descCombineService->createCombineJson($request['desc_en'], $request['desc_ar']);
                $banner->desc = $desc_json;


                // Slug/Link Url
                $slugService = new SlugService();
                $slug = $slugService->createSlug($request['title_en']);
                $banner->link = $slug;

                // Image
                $ima = $request->file('image');
                $ima_name = $slug . "." . $ima->getClientOriginalExtension();
                $destPath = public_path('/images');
                $ima->move($destPath, $ima_name);
                $banner->image = $ima_name;

                $banner->is_visible= $request['visible'];
                $banner->is_featured = $request['featured'];
                $banner->sort = $request['sort'] ? $request['sort'] : 0;
                $banner->save();
                return redirect()->route('ads.index');
            } catch (Exception $e) {
                print_r($e);
            }
        }
    }

    /**
     * [bannerEdit description]
     * @return [type] [description]
     */
    public function bannerEdit($slug)
    {
    	$banner = Banner::where('link', $slug)->first();
    	$categories = Category::all();
    	return view('manage.ads.banner.edit', [
    	    'banner' => $banner,
            'categories' => $categories
        ]);
    }

    /**
     * [bannerUpdate description]
     * @return [type] [description]
     */
    public function bannerUpdate(Request $request, $id)
    {
        // Validation
        $rules = [
            'category' => 'required',
            'title_en' => 'required',
            'title_ar' => 'required',
            'visible' => 'required',
            'featured' => 'required',
            'image' => 'required', // specify a mime type
        ];
        if($this->validate($request, $rules)) {
            try {
                $banner = Banner::find($id);
                $banner->user_id = auth()->user()->id;
                $banner->category_id = $request['category'];

                // Title Arabic and English (JSON Object)
                $titleCombineService = new MultiLangCombineService();
                $title_json = $titleCombineService->createCombineJson($request['title_en'], $request['title_ar']);
                $banner->title = $title_json;

                // Description Arabic and English (JSON Object)
                $descCombineService = new MultiLangCombineService();
                $desc_json = $descCombineService->createCombineJson($request['desc_en'], $request['desc_ar']);
                $banner->desc = $desc_json;


                // Slug/Link Url
                $slugService = new SlugService();
                $slug = $slugService->createSlug($request['title_en']);
                $banner->link = $slug;

                // Image
                if($request->file('image')){
                    $ima = $request->file('image');
                    $ima_name = $slug . "." . $ima->getClientOriginalExtension();
                    $destPath = public_path('/images');
                    $ima->move($destPath, $ima_name);
                    $banner->image = $ima_name;
                }

                $banner->is_visible= $request['visible'];
                $banner->is_featured = $request['featured'];
                $banner->sort = $request['sort'] ? $request['sort'] : 0;
                $banner->save();
                return redirect()->route('ads.index');
            } catch (Exception $e) {
                print_r($e);
            }
        }
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
