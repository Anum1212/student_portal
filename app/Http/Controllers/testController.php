<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Department;
use App\DepartmentAnnouncement;
use App\Society;
use App\SocietyAnnouncement;

class testController extends Controller
{
    public function index(Request $req)
    {
        $departmentAnnouncement = Department::find(1)->announcement;
        $departmentUsers = Department::find(1)->users;
        $societyAnnouncement = Society::find(1)->announcement;
        $societyUsers = Society::find(1)->users;
        $studentSocieties = User::find(3)->society;
        dd('departmentAnnouncement', $departmentAnnouncement,'departmentUsers', $departmentUsers,'societyAnnouncement', $societyAnnouncement,'societyUsers', $societyUsers, 'studentSocieties', $studentSocieties);
    }
}
