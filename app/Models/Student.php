<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{   use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'studentname',
        'viberph',
        'email',
        'age',
        'gender',
        'previous_level',
        'comment'
    ];

    public function batch_infos()
    {
        return $this->belongsToMany(Batch_info::class,'student_batch_infos')
        ->withTimestamps()
        ->withPivot(['deleted_at']);
    }
}
