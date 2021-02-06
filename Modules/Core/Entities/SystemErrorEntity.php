<?php

namespace Modules\Core\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Mails\SystemErrorAdminEmail;
use Illuminate\Support\Facades\Mail;

class SystemErrorEntity extends Model
{
    protected $table = 'system__errors';
    protected $fillable = [
        'name',
        'description'
    ];
    protected $casts = [
        'description' => 'array'
    ];

    public static function createEntity($name, $data = []) 
    {
        try {
            self::create([
                'name' => $name,
                'description' => $data
            ]);
        } catch (\Throwable $th) {
            // TODO: log to file
        }

        if (env('APP_ENV') == 'production') {
            try {
                Mail::to(env('MAIL_FROM_ADDRESS'))->send(new SystemErrorAdminEmail($name));
            } catch (\Throwable $th) {}
        }
    }

}
