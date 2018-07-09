<?php



// controller Details
// ------------------
// Methods Present
// ------------------
// 1) __construct




namespace App \Http \Controllers;

use Illuminate\Http\Request;

class studentController extends Controller
{



    // |---------------------------------- 1) construct ----------------------------------|
    public function __construct()
    {
        $this->middleware('auth');
    }



    // |---------------------------------- 2) index ----------------------------------|
    public function index()
    {
        return view('student.dashboard');
    }
}
