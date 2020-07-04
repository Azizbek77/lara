<?php

namespace App\MOdels;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'id',
        'name',
    ];


    public $timestamps = false;
}
