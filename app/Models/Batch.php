<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Batch extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = ['batch_name'];

    public function batch_infos()
    {
        return $this->hasMany('App\Models\Batch_info');
    }
}
