<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeAmount extends Model
{
    protected $fillable =['feecategory_id','class_id','amount'];
    public function fee_category(){
        return $this->belongsTo(FeeCategory::class,'feecategory_id','id');
    }
    public function class(){
        return $this->belongsTo(StudentClass::class,'class_id','id');
    }
}
