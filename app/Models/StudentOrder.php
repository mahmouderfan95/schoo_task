<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentOrder extends Model
{
    protected $guarded = [];

    public function student(){
        return $this->belongsTo('App\Models\Student','student_id ');
    }

    public function school(){
        return $this->belongsTo('App\Models\School','student_id ');
    }
}
