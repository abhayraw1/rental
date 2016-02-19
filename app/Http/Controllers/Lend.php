<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;

class Lend extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'from','to'
    ];
    protected $table = 'lend_table';
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
   }
