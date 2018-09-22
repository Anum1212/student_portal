<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    // ----------------- Mutators -----------------
    public function setSenderNameAttribute($value)
    {
        return $this->attributes['sender_name'] = strtolower($value);
    }



    public function setTitleAttribute($value)
    {
        return $this->attributes['title'] = strtolower($value);
    }



    public function setMessageAttribute($value)
    {
        return $this->attributes['message'] = strtolower($value);
    }



    // ----------------- Accessors -----------------
    public function getSenderNameAttribute($value)
    {
        return ucwords($value);
    }



    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    }



    public function getMessageAttribute($value)
    {
        return ucfirst($value);
    }
}
