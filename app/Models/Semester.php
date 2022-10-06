<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Semester extends Model
{
    use HasFactory;
    protected $table = "semesters";
    protected $primaryKey = "semester_id";

    //Mutator For Semester Input
    public function setSemesterNameAttribute($value)
    {
        $this->attributes['semester_name'] = ucfirst($value);
    }
}
