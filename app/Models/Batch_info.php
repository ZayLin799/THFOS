<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Batch_info extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'avaliable_student',
        'time_limit',
        'status',
        'course_id',
        'batch_id'
    ];

    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }
    
    public function batch()
    {
        return $this->belongsTo('App\Models\Batch');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class,'student_batch_infos')
        ->withTimestamps()
        ->withPivot(['deleted_at']);
    }

    public function feedbacks()
    {
        return $this->hasMany('App\Models\Feedback');
    }
}
