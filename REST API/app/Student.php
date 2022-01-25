<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $fillable = ['id','class_id','section_id','name','phone','enail','password','photo','address','gender',];

}
