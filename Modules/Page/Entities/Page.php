<?php

declare(strict_types=1);

namespace Modules\Page\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Page\Scopes\PageScope;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;

class Page extends Model implements HasMedia
{
    use InteractsWithMedia;
    
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
            if (strpos(request()->url(), env('BACKEND_URI'))) {
                return;
            }
        } catch (\Throwable $th) {}

        static::addGlobalScope(new PageScope()); // frontend Page scope: only active pages are available for user
    }

    /**
     * Method describes all medias for this model.
     * 
     * There are a lot of manipulations you can do with images. 
     * See Spatie\Image\Manipulations for details. Cool and useful effects: sepia, pixelate(5), greyscale(), fit
     * 
     * Command: `php artisan media-library:regenerate` regenerates all media conversions 
     * 
     * @return void
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('main')->singleFile();
        $this->addMediaCollection('gallery');

        $this->addMediaConversion('thumb')->width(600)->height(400)->fit(Manipulations::FIT_CROP, 600, 400);
    }

    public function getMainImage()
    {
        return $this->getMedia('main')->first();
    }
    
    public static function findHomepage() 
    {
        return self::where('is_homepage', 1)->firstOrFail();
    }

    public static function findSubpageBySlug($slug) 
    {
        return self::where('slug', $slug)->where('is_homepage', 0)->first();
    }

    public static function findBySlug($slug) 
    {
        return self::where('slug', $slug)->first();
    }

}
