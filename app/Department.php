<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\DepartmentAnnouncement;

class Department extends Model
{



    // Users: department 1 to Many relation
    public function users()
    {
        return $this->hasMany(User::class);
    }



    // announcement: department 1 to Many relation
    public function announcement()
    {
        return $this->hasMany(DepartmentAnnouncement::class);
    }



    // ----------------- Mutators -----------------
    public function setDepartmentCodeAttribute($value)
    {
        return $this->attributes['departmentCode'] = strtolower($value);
    }



    public function setDepartmentNameAttribute($value)
    {
        return $this->attributes['departmentName'] = strtolower($value);
    }



    // ----------------- Accessors -----------------
    public function getDepartmentCodeAttribute($value)
    {
        return strtoupper($value);
    }



    public function getDepartmentNameAttribute($value)
    {
        return ucwords($value);
    }
}
