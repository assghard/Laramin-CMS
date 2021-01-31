<?php

declare(strict_types=1);

namespace Modules\Page\Services;

use Modules\Page\Entities\Page;
use Illuminate\Support\Str;

class PageService 
{
    public function createPage($request) : Page
    {
        if ($request->is_homepage == 1) {
            Page::where('is_homepage', 1)->update(['is_homepage' => 0]);
        }

        return Page::create(array_merge($request->all(), ['slug' => (empty($request->slug)) ? $this->createSlug($request->title) : $this->createSlug($request->slug)]));
    }

    public function updatePage($id, $request) : Page
    {
        $page = Page::findOrFail($id);
        if ($request->is_homepage == 1 && $page->is_homepage != 1) {
            Page::where('is_homepage', 1)->update(['is_homepage' => 0]);
        }

        $page->update(array_merge($request->all(), ['slug' => (empty($request->slug)) ? $this->createSlug($request->title, $id) : $this->createSlug($request->slug, $id)]));

        if ($request->hasFile('main')) {
            $page->addMedia($request->file('main'))->toMediaCollection('main');
        }

        if ($request->hasFile('gallery')) {
            foreach ($request->gallery as $image) {
                $page->addMedia($image)->toMediaCollection('gallery');
            }
        }

        return $page;
    }

    /**
     * Cretate unique slug
     */
    public function createSlug($title, $pageId = NULL) : string
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