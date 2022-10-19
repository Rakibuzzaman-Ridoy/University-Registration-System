<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;
    protected $table = "registrations";
    protected $primaryKey = "registration_id";

    protected $guarded = ['registration_id'];

    public function student()
    {
        return $this->belongsTo(Student::class,'student_id','id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class,'department_id','department_id');
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class,'semester_id','semester_id');
    }

     public function course()
    {
        return $this->belongsTo(Course::class,'course_id','course_id');
    }


}
