<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;

class College extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'college_name','SKU'
    ];
    protected $table = 'college';
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
   }
