<?php

namespace Modules\Page\Entities;

use Illuminate\Database\Eloquent\Model;

class ContactRequest extends Model
{
    protected $table = 'page__contact_requests';
    protected $fillable = [
        'email',
        'description'
    ];
    
}
