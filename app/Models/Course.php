<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $primaryKey = "course_id";
    protected $table = "courses";

    public function teacher_info()
    {
        //return $this->hasMany("App\Models\Teacher","teacher_id","teacher_id");
        return $this->belongsTo(Teacher::class,"teacher_id","teacher_id");
    }
    public function credit_info()
    {
        // return $this->hasMany("App\Models\Credit",'credit_id','credit_id');
        return $this->belongsTo(Credit::class,'credit_id','credit_id');
    }
}
