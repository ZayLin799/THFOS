<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'coursename',
        'course_img',
        'description',
        'duration',
        'level',
        'course_category_id'
    ];


    public function course_category()
    {
        return $this->belongsTo('App\Models\Course_category');
    }

    public function batch_infos()
    {
        return $this->hasMany('App\Models\Batch_info');
    }
}
