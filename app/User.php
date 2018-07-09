<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];



    // 1 Student belongs to 1 Department Only
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    


    // 1 Student belongs to Many Societies
    public function society()
    {
        return $this->belongsToMany(Society::class);
    }



    // ----------------- Mutators -----------------
    public function setNameAttribute($value)
    {
        return $this->attributes['name'] = strtolower($value);
    }
    
    
    
    public function setRegistrationAttribute($value)
    {
        return $this->attributes['registration'] = strtolower($value);
    }



    // ----------------- Accessors -----------------
    public function getNameAttribute($value)
    {
        return ucwords($value);
    }



    public function getRegistrationAttribute($value)
    {
        return strtoupper($value);
    }
}
