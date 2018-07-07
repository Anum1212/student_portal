<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartmentAnnouncement extends Model
{
    public function department(){
        return $this->belongsTo(Department::class);
    }
}
