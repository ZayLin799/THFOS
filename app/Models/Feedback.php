<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feedback extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'name',
        'batch_info_id',
        'feedback',
        'image'
    ];

    public function batch_info()
    {
        return $this->belongsTo('App\Models\Batch_info');
    }
}
