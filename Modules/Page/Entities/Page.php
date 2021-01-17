<?php

namespace Modules\Page\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Page\Scopes\PageScope;

class Page extends Model
{
    protected $table = 'page__pages';
    protected $fillable = [
        'is_homepage',
        'is_active',
        'title',
        'slug',
        'caption',
        'body',

        'meta_title',
        'meta_description',
        'og_title',
        'og_description',
        'og_type',
        'og_image'
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        try {
            if (strpos(request()->getPathInfo(), env('BACKEND_URI'))) {
                return;
            }
        } catch (\Throwable $th) {}

        static::addGlobalScope(new PageScope()); // frontend Page scope: only active pages are available for user
    }
    
    public static function findHomepage() 
    {
        return self::where('is_homepage', 1)->firstOrFail();
    }

    public static function findBySlug($slug) 
    {
        return self::where('slug', $slug)->where('is_homepage', 0)->first();
    }
}
