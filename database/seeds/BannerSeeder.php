<?php

use App\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banner = new Banner();
        $banner->category_id = 1;
        $banner->title = "Fashion Week";
        $banner->desc = "lorem alksdjlkasjd askldjlaksjd alskdjasd";
        $banner->image = "default.png";
        $banner->link = "fasion_week";
        $banner->is_featured = 1;
        $banner->is_visible = 1;
        $banner->sort = 5;
        $banner->save();
    }
}
