<?php

namespace Modules\Dashboard\Entities;

use Illuminate\Database\Eloquent\Model;

class UserSubmission extends Model
{
    protected $table = 'dashboard__user_submissions';
    protected $fillable = [
        'email',
        'description'
    ];
    
}
