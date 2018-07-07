<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Society extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function announcement()
    {
        return $this->hasMany(SocietyAnnouncement::class);
    }
}
