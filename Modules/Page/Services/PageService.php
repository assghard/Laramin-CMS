<?php

namespace Modules\Page\Services;

use Modules\Page\Entities\Page;
use Illuminate\Support\Str;

class PageService 
{
    public function createPage($data) 
    {
        if ($data['is_homepage'] == 1) {
            Page::where('is_homepage', 1)->update(['is_homepage' => 0]);
        }

        Page::create(array_merge($data, ['slug' => (empty($data['slug'])) ? $this->createSlug($data['title']) : $this->createSlug($data['slug'])]));
    }

    public function updatePage($id, $data) 
    {
        $page = Page::findOrFail($id);
        if ($data['is_homepage'] == 1 && $page->is_homepage != 1) {
            Page::where('is_homepage', 1)->update(['is_homepage' => 0]);
        }

        $page->update(array_merge($data, ['slug' => (empty($data['slug'])) ? $this->createSlug($data['title'], $id) : $this->createSlug($data['slug'], $id)]));
    }

    /**
     * Cretate unique slug
     */
    public function createSlug($title, $pageId = NULL)
    {
        $slug = mb_strtolower(Str::slug($title, '-'));
        $page = Page::findBySlug($slug);
        if (empty($page)) {
            return $slug;
        }

        if (!empty($pageId) && $pageId == $page->id) {
            return $slug;
        }

        while (true) {
            $newSlug = mb_strtolower($slug . '-' . Str::random(5));
            $page = Page::findBySlug($newSlug);
            if (empty($page)) {
                return $newSlug;
            }
        }
    }
}