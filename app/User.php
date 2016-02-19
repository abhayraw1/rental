<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
<<<<<<< HEAD
use Illuminate\Contracts\Auth\CanResetPassword;
=======
>>>>>>> a0b0f68032027eb6de3773fc8498ba9827c95427

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
<<<<<<< HEAD
         'email','password','active','confirmation_code'
    ];
    protected $table = 'users';
=======
        'name', 'email', 'password',
    ];

>>>>>>> a0b0f68032027eb6de3773fc8498ba9827c95427
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
