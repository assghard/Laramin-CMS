<?php

namespace Modules\Page\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PageDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        \DB::table('page__pages')->insert([
            'is_homepage' => 1,
            'is_active' => 1,
            'title' => 'Laramin CMS - simple MVP Content Management System based on Laravel framework',
            'slug' => 'laramin-CMS-homepage',
            'caption' => 'CMS based on Laravel for quick create a simple website',
            'body' => 'Every website needs homepage, subpages, contact page, SEO base features, user and content manager. Laramin CMS solves this problem and provides basic functions for creation quick and lightweight website. 
                <strong>Laramin CMS</strong> is a MVP CMS (Content Management System) based on Laravel framework created for web developers to support them in creating web applications. 
                This is a Laravel with <b>nwidart/laravel-modules</b>, auth, dashboard, user and pages management. Laramin CMS provides a basic functionality needed in every project so you do not start from the white space. It has: 
                - Homepage, subpages, contact page, send contact
                - Admin dashboard (to manage content, pages, menus, media, users, user submissions)
                - SEO features: Headers, content, meta and Open Graph data, structured Schema.org data, titles and alts for images
Also it provides a few more tips like system settings, system errors, auth management, user module. 
I tried to create it as simple as it can be, using as less packages as possible (for maintenance reasons) - only MVP functions. So you can easily develop it and implement own stuff needed in your project. ',
            'meta_title' => 'Laramin CMS homepage',
            'meta_description' => 'CMS based on Laravel for quick create a simple website',
            'og_title' => 'CMS based on Laravel for quick create a simple website',
            'og_description' => 'Every website needs homepage, subpages, contact page, SEO base features, content manager',
            'og_type' => 'website',
            'og_image' => NULL,
            'created_at' => now()
        ]);

        \DB::table('page__pages')->insert([
            'is_homepage' => 0,
            'is_active' => 1,
            'title' => 'Subpage',
            'slug' => 'subpage',
            'caption' => 'Subpage is here',
            'body' => 'Test subpage. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod',
            'meta_title' => NULL,
            'meta_description' => NULL,
            'og_title' => NULL,
            'og_description' => NULL,
            'og_type' => 'website',
            'og_image' => NULL,
            'created_at' => now()
        ]);
    }
}
