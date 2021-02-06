# Laramin CMS - simple MVP Content Management System based on Laravel framework


**Laramin CMS** is a MVP CMS (Content Management System) based on Laravel framework created for web developers to support them in creating web applications. This is a pure Laravel with `nwidart/laravel-modules`. Laramin CMS provides a basic functionality needed in every project so you don't start from the white space. It has: 
- Homepage, subpages, contact page, send contact
- Admin dashboard (to manage content, pages, menus, media, users, user submissions)
- SEO features: Headers, content, meta and Open Graph data, structured Schema.org data, titles and alts for images

Also it provides a few more tips like system settings, system errors, auth management, user module. 
I tried to create it as simple as it can be, using as less packages as possible (for maintenance reasons) - only MVP functions. So you can easily develop it and implement own stuff needed in your project. 


- [Modules](#laramin-cms-modules)
- [Used Packages and libraries](#used-packages-and-libraries)
- [Requirements](#requirements)
- [Installation](#installation)
- [Examples and demo](#examples-and-demo)
- [TODO list](#todo-list)
- [Licence](#Licence)

## Laramin CMS modules
 - Core (basic stuff here)
 - Dashboard
 - Page with media and thumbs
 - Media (minimal)
 - Menu (work in progress)
 - Blog (work in progress)

## Used packages and libraries
 - Laravel framework 8.26.1: `laravel/framework` 
 - Laravel modules: `nwidart/laravel-modules`
 - Spatie medialibrary: `spatie/laravel-medialibrary`

 ## Requirements
- Web server: apache / nginx / ...
- MySQL / PostgreSQL / SQLite / ...
- PHP >= 7.3 or 8.0

## Installation
 * Clone this repo: `git clone`
 * Copy .env.example to .env file: `cp .env.example .env`
 * Install the composer vendors: `composer install`
 * Install NPM packages: `npm install`
 * Compile NPM packages: `npm run dev`
 * Create new database, complete the .env file and migrate with seeders: `php artisan migrate --seed`
 * Run CMS: `php artisan serve`


## Examples and demo


## TODO list
* TEST add mail config and test send mail
* TEST auth and send mails, reset, register...
* check all config files in config folder
* check/add media allowed extensions
* Add lian-yue/vue-upload-component
* add indisposable library
* add settings seeder with basic settings
* Menu module
* Blog module
* AMP page


## Model media base usage

There is `spatie/laravel-medialibrary` installed. More information here: https://spatie.be/docs/laravel-medialibrary/v9/introduction

If you are going to use Media - remember about PHP and MySQL variables:

```php
[PHP]
memory_limit
post_max_size
upload_max_filesize

[MySQL]
max_allowed_packet

[config/media-library.php]
'max_file_size' => 1024 * 1024 * 10 // 10MB
```

Register media for model (Page model example):
```php
    use Spatie\MediaLibrary\HasMedia;
    use Spatie\MediaLibrary\InteractsWithMedia;
    use Spatie\Image\Manipulations;
    ...

    class Page extends Model implements HasMedia
{
    use InteractsWithMedia;
    ...


    /**
     * Register all media for this model with features and conversions
     * (from Spatie\MediaLibrary\InteractsWithMedia trait)
     * 
     * @return void
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('main')->singleFile();
        $this->addMediaCollection('gallery');

        $this->addMediaConversion('thumb')->width(600)->height(400)->fit(Manipulations::FIT_CROP, 600, 400);
    }

    /**
     * Custom method to get main image
     */
    public function getMainImage()
    {
        return $this->getMedia('main')->first();
    }
```

There are a lot of manipulations you can do with images. See Spatie\Image\Manipulations for details. Cool and useful effects: `sepia`, `pixelate(5)`, `greyscale()`, `fit`

Command: `php artisan media-library:regenerate` regenerates all media conversions

## Licence

MIT