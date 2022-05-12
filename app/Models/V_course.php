<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class V_course extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'v_course_name',
        'subject'
    ];

    public function volunteers()
    {
        return $this->hasMany('App\Models\Volunteer');
    }
}
