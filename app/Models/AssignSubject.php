<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\StudentClass;
use App\Models\SchoolSubject;

class AssignSubject extends Model
{
    protected $fillable=['class_id','subject_id','pass_mark','full_mark','subjective_mark'];
    public function student_class(){
        return $this->belongsTo(StudentClass::class,'class_id','id');
    }
    public function subject(){
        return $this->belongsTo(SchoolSubject::class,'subject_id','id');
    }
}
