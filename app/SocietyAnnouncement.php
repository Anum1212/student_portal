<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocietyAnnouncement extends Model
{
     public function society(){
        return $this->belongsTo(Society::class);
    }
}
