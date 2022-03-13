<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userData extends Model
{
    protected $table = 'users_info';
    protected $fillable = [
        'type','name', 'email','phone','city'
    ];
}
