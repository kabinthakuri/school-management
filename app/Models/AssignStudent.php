<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignStudent extends Model
{
    public function Student(){
        return $this->belongsTo(User::class,'student_id','id');
    }
    public function Year(){
        return $this->belongsTo(StudentYear::class,'year_id','id');
    }
    public function Class(){
        return $this->belongsTo(StudentClass::class,'class_id','id');
    }
    public function discount(){
        return $this->belongsTo(DiscountStudent::class,'id','assign_student_id');
    }
}
