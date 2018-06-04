<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Form extends Model
{
    use SoftDeletes;
    protected $table = "form";
    protected $fillable = ['photo','name','schoolName','sscRegNo','sscRollNo','gpa',
                            'presentAddress','permanentAddress','occupation','currentBusinessOrWorkingOrg',
                            'expertise','mobileNumber','fbIdName','selfDescription','bloodGroup','board',
                            'policeStation','district','designation','interest'];
    protected $date = ['deleted_at'];


    public function setPhotoAttribute($value){
        $this->attributes['photo'] = ($value);
    }
    public function setNameAttribute($value){
        $this->attributes['name'] = ($value);
    }
    public function setSchoolNameAttribute($value){
        $this->attributes['schoolName'] = ($value);
    }
    public function setSscRegAttribute($value){
        $this->attributes['sscRegNo'] = ($value);
    }
    public function setSscRollNoAttribute($value){
        $this->attributes['sscRollNo'] = ($value);
    }
    public function setGpaAttribute($value){
        $this->attributes['gpa'] = ($value);
    }
    public function setPresentAddressAttribute($value){
        $this->attributes['presentAddress'] = ($value);
    }
    public function setPermanentAddressAttribute($value){
        $this->attributes['permanentAddress'] = ($value);
    }
    public function setOccupationAttribute($value){
        $this->attributes['occupation'] = ($value);
    }
    public function setCurrentBusinessOrWorkingOrgAttribute($value){
        $this->attributes['currentBusinessOrWorkingOrg'] = ($value);
    }
    public function setExpertiseAttribute($value){
        $this->attributes['expertise'] = ($value);
    }
    public function setMobileNumberAttribute($value){
        $this->attributes['mobileNumber'] = ($value);
    }
    public function setFbIdNameAttribute($value){
        $this->attributes['fbIdName'] = ($value);
    }
    public function setSelfDescriptionAttribute($value){
        $this->attributes['selfDescription'] = ($value);
    }
    public function setBloodGroupAttribute($value){
        $this->attributes['bloodGroup'] = ($value);
    }
    public function setBoardAttribute($value){
        $this->attributes['board'] = ($value);
    }
    public function setPoliceStationAttribute($value){
        $this->attributes['policeStation'] = ($value);
    }
    public function setDistrictAttribute($value){
        $this->attributes['district'] = ($value);
    }
    public function setDesignationAttribute($value){
        $this->attributes['designation'] = ($value);
    }
    public function setInterestAttribute($value){
        $this->attributes['interest'] = ($value);
    }

}
