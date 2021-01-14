<?php

namespace Modules\Page\Entities;

use Illuminate\Database\Eloquent\Model;

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
    ];
    
}
