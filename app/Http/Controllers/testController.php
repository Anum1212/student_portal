<?php

namespace App\Http\Controllers;

use Auth;
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
        // if(Auth::user()->userType == '0')
        // dd('Super Admin');
        // if(Auth::user()->userType == '1')
        // dd('department Admin');
        // if(Auth::user()->userType == '2')
        // dd('society Admin');
        // if(Auth::user()->userType == '3')
        // dd('student');

        // dd(Auth::user());
        $departmentAnnouncement = Department::find(1)->announcement;
        $departmentUsers = Department::find(1)->users;
        $societyAnnouncement = Society::find(1)->announcement;
        $societyUsers = Society::find(1)->users;
        $studentSocieties = User::find(3)->society;
        // dd('departmentAnnouncement', $departmentAnnouncement,'departmentUsers', $departmentUsers,'societyAnnouncement', $societyAnnouncement,'societyUsers', $societyUsers, 'studentSocieties', $studentSocieties);
        // return view('layouts.dashboard');
    }
}
