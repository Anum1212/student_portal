<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\DepartmentAnnouncement;

class Department extends Model
{
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function announcement()
    {
        return $this->hasMany(DepartmentAnnouncement::class);
    }
}
