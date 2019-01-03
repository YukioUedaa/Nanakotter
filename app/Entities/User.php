<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Member.
 *
 * @package namespace App\Entities;
 */
class User extends BaseEntity
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password','remember_token',
    ];

}
