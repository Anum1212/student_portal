<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Society extends Model
{



    // 1 Society has many Users
    public function users()
    {
        return $this->belongsToMany(User::class);
    }



    // 1 Society has many announcements
    public function announcement()
    {
        return $this->hasMany(SocietyAnnouncement::class);
    }



    // ----------------- Mutators -----------------
    public function setSocietyCodeAttribute($value)
    {
        return $this->attributes['societyCode'] = strtolower($value);
    }



    public function setSocietyNameAttribute($value)
    {
        return $this->attributes['societyName'] = strtolower($value);
    }



    // ----------------- Accessors -----------------
    public function getSocietyCodeAttribute($value)
    {
        return strtoupper($value);
    }



    public function getSocietyNameAttribute($value)
    {
        return ucwords($value);
    }
}
