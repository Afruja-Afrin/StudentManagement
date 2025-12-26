<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    //
    use HasFactory;
    use SoftDeletes;

    // protected $hidden = [
    //     'name'
    // ];

    // public function scopeFemale($query, $age)
    // {
    //     return $query->where('gender', 'f')
    //     ->where('age', $age);
    // }
}
