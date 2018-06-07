<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Registration extends Model
{
    use SoftDeletes;
    protected $table = "registration";
//    protected $fillable = ['photo','name','schoolName','sscRegNo','sscRollNo','gpa',
//        'presentAddress','permanentAddress','occupation','currentBusinessOrWorkingOrg',
//        'expertise','mobileNumber','fbIdName','selfDescription','bloodGroup','board',
//        'policeStation','district','designation','interest'];
    protected $date = ['deleted_at'];
}
