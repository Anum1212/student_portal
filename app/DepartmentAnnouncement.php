<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartmentAnnouncement extends Model
{


    
    // 1 department has many announcements
    public function department(){
        return $this->belongsTo(Department::class);
    }



    // ----------------- Mutators -----------------
    public function setTitleAttribute($value)
    {
        return $this->attributes['title'] = strtolower($value);
    }



    public function setDescriptionAttribute($value)
    {
        return $this->attributes['description'] = strtolower($value);
    }



    // ----------------- Accessors -----------------
    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    }



    public function getDescriptionAttribute($value)
    {
        return ucfirst($value);
    }
}
