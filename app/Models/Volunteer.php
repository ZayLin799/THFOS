<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Volunteer extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'volunteername',
        'viberph',
        'skill',
        'email',
        'age',
        'gender',
        'education',
        'experience',
        'tele_name',
        'reason',
        'subject',
        'teaching_time',
        'position_id',
        'course_category_id'
    ];

    public function position()
    {
        return $this->belongsTo('App\Models\Position');
    }

    public function v_course()
    {
        return $this->belongsTo('App\Models\V_course');
    }
}
