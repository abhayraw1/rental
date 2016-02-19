<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;

class UserDetails extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'email','college','contact','name'
    ];
    protected $table = 'user_details';
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
   }
