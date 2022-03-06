<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $fillable =[
        'name',

    ];
    public function student()
    {
        return $this->hasMany(Student::class);
        // return $this->hasMany(Student::class,'major_id','id');
    }
}
