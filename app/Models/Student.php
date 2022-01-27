<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    protected $dates = ['deleted_at'];
    public function school(){
        return $this->belongsTo('App\Models\School','school_id');
    }

    public function orders(){
        return $this->hasMany('App\Models\StudentOrder','student_id');
    }
}
