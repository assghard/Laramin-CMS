<?php

namespace Modules\Dashboard\Entities;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    protected $table = 'dashboard__settings';
    protected $fillable = [
        'name',
        'value',
        'description'
    ];

    public static function findByName($name)
    {
        return self::where('name', $name)->first();
    }

    public static function getValueByName($name)
    {
        $entity = self::findByName($name);
        if (empty($entity)) {
            return NULL;
        }

        return $entity->value;
    }
}
