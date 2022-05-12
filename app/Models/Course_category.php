<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course_category extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = ['course_category_name'];

    public function courses()
    {
        return $this->hasMany('App\Models\Course');
    }
}
