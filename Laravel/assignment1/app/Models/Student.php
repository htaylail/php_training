<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'grade',
        'major_id',
    ];

    public function  major()
    {
        return $this->belongsTo(Major::class);
    }
}
