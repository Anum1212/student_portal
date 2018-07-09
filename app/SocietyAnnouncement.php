<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocietyAnnouncement extends Model
{


    
    // 1 society has many announcements
     public function society(){
        return $this->belongsTo(Society::class);
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
