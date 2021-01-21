<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'api_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'api_token',
        'is_admin',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*
     * Mutators
     */
    public function setIsAdminAttribute($value) {
        $this->attributes['is_admin'] = ($value == 1) ? 1 : 0;
    }
    /*
     * END Mutators
     */

    /**
     * Create new user method. Use it after validation
     * 
     * @param $email user unique email
     * @param $password pure password string
     * @param $name user name
     * 
     * @return User
     */
    public static function createNewOne($email, $password, $name = NULL) 
    {
        return User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'api_token' => Str::random(60) // for auth:api middleware
        ]);
    }
}
