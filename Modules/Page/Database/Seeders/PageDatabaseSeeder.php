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
            'title' => 'at CMS homepage',
            'slug' => 'at-CMS-homepage',
            'caption' => 'CMS based on Laravel for quick create a simple website',
            'body' => 'Every website needs homepage, subpages, contact page, SEO base features, content manager. atCMS solves this problem and provides basic functions for creation quick and lightweight website',
            'meta_title' => 'at CMS homepage',
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
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod',
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
