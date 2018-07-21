<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->name_en = "Fashion";
        $category->name_ar = "الموضة";
        $category->is_visible = 1;
        $category->save();

        $category = new Category();
        $category->name_en = "Car";
        $category->name_ar = "السيارات";
        $category->is_visible = 0;
        $category->save();
    }
}
