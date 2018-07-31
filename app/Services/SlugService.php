<?php

namespace App\Services;

use App\Banner;

class SlugService
{
    /*
     * @param $title
     * @param int $id
     * @return string
     * @throws \Exception
     */
    public function createSlug($title, $id = 0) {
        $formatedTitle = $title . " " . str_random(12);
        $slug = str_slug($formatedTitle, '-');

        // Get any that could possibly be related.
        // This cuts the queries down by doing it once.
        $allSlugs = $this->getRelatedSlugs($slug, $id);

        // If we haven't used it before then we are all good.
        if (! $allSlugs->contains('slug', $slug)){
            return $slug;
        }
        // Just append numbers like a savage until we find not used.
        for ($i = 1; $i <= 10; $i++) {
            $newSlug = $slug.'-'.$i;
            if (! $allSlugs->contains('slug', $newSlug)) {
                return $newSlug;
            }
        }
    }

    protected function getRelatedSlugs($slug, $id = 0) {
        return Banner::select('link')->where('link', 'like', $slug.'%')
            ->where('id', '<>', $id)
            ->get();
    }
}