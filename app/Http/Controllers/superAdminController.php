<?php



// controller Details
// ------------------
// Methods Present
// ------------------
// 1) __construct
// 2) index
// 3) viewAllDepartments
// 4) addDepartmentForm
// 5) addDepartment
// 6) editDepartmentForm
// 7) editDepartment
// 8) deleteDepartment
// 9) viewAllDepartmentAdmins
// 10) addDepartmentAdminForm
// 11) addDepartmentAdmin
// 12) editDepartmentAdminForm
// 13) editDepartmentAdmin
// 14) deleteDepartmentAdmin
// 15) viewAllSocieties
// 16) addSocietyForm
// 17) addSociety
// 18) editSocietyForm
// 19) editSociety
// 20) deleteSociety
// 21) viewAllSocietyAdmins
// 22) addSocietyAdminForm
// 23) addSocietyAdmin
// 24) editSocietyAdminForm
// 25) editSocietyAdmin
// 26) deleteSocietyAdmin




namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Department;
use App\DepartmentAnnouncement;
use App\Society;
use App\SocietyAnnouncement;
use App\Society_User;

class superAdminController extends Controller
{



    // |---------------------------------- 1) construct ----------------------------------|
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('typeAdmin');
    }



    // |---------------------------------- 2) index ----------------------------------|
    public function index()
    {
        return view('superAdmin.dashboard');
    }



    // |---------------------------------- 3) viewAllDepartments ----------------------------------|
    public function viewAllDepartments()
    {
        $departments = Department::all();
        return view('superAdmin.department.viewAll', compact('departments'));
    }



    // |---------------------------------- 4) addDepartmentForm ----------------------------------|
    public function addDepartmentForm()
    {
        return view('superAdmin.department.addForm');
    }
    
    
    
    // |---------------------------------- 5) addDepartment ----------------------------------|
    public function addDepartment(Request $req)
    {
        $department = new Department;
        $department->departmentCode = $req->code;
        $department->departmentName = $req->name;
        $department->save();
       return redirect()->route('superAdmin.viewAllDepartments');
    }



    // |---------------------------------- 6) editDepartmentForm ----------------------------------|
    public function editDepartmentForm($departmentId)
    {
        $details = Department::find($departmentId);
        return view('superAdmin.department.editForm', compact('details'));
    }



    // |---------------------------------- 7) editDepartment ----------------------------------|
    public function editDepartment(Request $req, $departmentId)
    {
        $details = Department::find($departmentId);
        $details->departmentCode = $req->code;
        $details->departmentName = $req->name;
        $details->save();
        return redirect()->route('superAdmin.viewAllDepartments');
    }



    // |---------------------------------- 8) deleteDepartment ----------------------------------|
    public function deleteDepartment($departmentId)
    {
        $details = Department::find($departmentId);
        return redirect()->route('superAdmin.viewAllDepartments');
    }



    // |---------------------------------- 9) viewAllDepartmentAdmins ----------------------------------|
    public function viewAllDepartmentAdmins()
    {
        $departmentAdmins = User::where('userType', '1')->get();
        return view('superAdmin.departmentAdmin.viewAll', compact('departmentAdmins'));
    }



    // |---------------------------------- 10) addDepartmentAdminForm ----------------------------------|
    public function addDepartmentAdminForm()
    {
        $departments = Department::all();
        return view('superAdmin.departmentAdmin.addForm', compact('departments'));
    }



    // |---------------------------------- 11) addDepartmentAdmin ----------------------------------|
    public function addDepartmentAdmin(Request $req)
    {
        $admin = new User;
        $admin->name = $req->name;
        $admin->email = $req->email;
        $admin->registration = $req->registration;
        $admin->password = Hash::make($req->registration);
        $admin->department_id = $req->department;
        $admin->userType = '1';
        $admin->save();
        return redirect()->route('superAdmin.viewAllDepartmentAdmins');
    }



    // |---------------------------------- 12) editDepartmentAdminForm ----------------------------------|
    public function editDepartmentAdminForm($departmentAdminId)
    {
        $details = User::find($departmentAdminId);
        $departments = Department::all();
        return view('superAdmin.departmentAdmin.editForm', compact('details', 'departments'));
    }



    // |---------------------------------- 13) editDepartmentAdmin ----------------------------------|
    public function editDepartmentAdmin(Request $req, $departmentAdminId)
    {
        $admin = User::find($departmentAdminId);

        // check if field email is different than admin email
        // if email is different check if it matches some other db email.
        if($req->email!= $admin->email){
            // Get the value from the form
        $input['email'] = Input::get('email');

        // Must not already exist in the `email` column of `users` table
        $rules = array('email' => 'unique:users,email');

        $validator = Validator::make($input, $rules);
        // if it matches some existing email return back with error
        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Entered Email already Exists');
        }
    }
    // if admin email unchanged or unique simply save record
        $admin->name = $req->name;
        $admin->email = $req->email;
        $admin->registration = $req->registration;
        $admin->password = Hash::make($req->registration);
        $admin->department_id = $req->department;
        $admin->save();
        return redirect()->route('superAdmin.viewAllDepartmentAdmins');
    }



    // |---------------------------------- 14) deleteDepartmentAdmin ----------------------------------|
    public function deleteDepartmentAdmin($departmentAdminId)
    {
        $details = User::find($departmentAdminId);
        return redirect()->route('superAdmin.viewAllDepartmentAdmins');
    }



    // |---------------------------------- 15) viewAllSocieties ----------------------------------|
    public function viewAllSocieties()
    {
        $societies = Society::all();
        return view('superAdmin.society.viewAll', compact('societies'));
    }



    // |---------------------------------- 16) addSocietyForm ----------------------------------|
    public function addSocietyForm()
    {
        return view('superAdmin.society.addForm');
    }



    // |---------------------------------- 17) addSociety ----------------------------------|
    public function addSociety(Request $req)
    {
        $society = new Society;
        $society->societyCode = $req->code;
        $society->societyName = $req->name;
        $society->save();
        return redirect()->route('superAdmin.viewAllSocieties');
    }



    // |---------------------------------- 18) editSocietyForm ----------------------------------|
    public function editSocietyForm($societyId)
    {
        $details = Society::find($societyId);
        return view('superAdmin.society.editForm', compact('details'));
    }



    // |---------------------------------- 19) editSociety ----------------------------------|
    public function editSociety(Request $req, $societyId)
    {
        $details = Society::find($societyId);
        $details->societyCode = $req->code;
        $details->societyName = $req->name;
        $details->save();
        return redirect()->route('superAdmin.viewAllSocieties');
    }



    // |---------------------------------- 20) deleteSociety ----------------------------------|
    public function deleteSociety($societyId)
    {
        $details = Society::find($societyId);
        return redirect()->route('superAdmin.viewAllSocieties');
    }



    // |---------------------------------- 21) viewAllSocietyAdmins ----------------------------------|
    public function viewAllSocietyAdmins()
    {
        $societyAdmins = User::where('userType','2')->get();
        return view('superAdmin.societyAdmin.viewAll', compact('societyAdmins'));
    }



    // |---------------------------------- 22) addSocietyAdminForm ----------------------------------|
    public function addSocietyAdminForm()
    {
        $societies = Society::all();
        return view('superAdmin.societyAdmin.addForm', compact('societies'));
    }



    // |---------------------------------- 23) addSocietyAdmin ----------------------------------|
    public function addSocietyAdmin(Request $req)
    {
        // save admin details
        $admin = new User;
        $admin->name = $req->name;
        $admin->email = $req->email;
        $admin->registration = $req->registration;
        $admin->password = Hash::make($req->registration);
        $admin->userType = '2';
        $admin->save();

        // get last inserted id
        $lastInsertId = $admin->id;

        // save user_id and society_id in pivot table
        $society_user = new Society_User;
        $society_user->user_id = $lastInsertId;
        $society_user->society_id = $req->society;
        $society_user->save();

        return redirect()->route('superAdmin.viewAllSocietyAdmins');
    }



    // |---------------------------------- 24) editSocietyAdminForm ----------------------------------|
    public function editSocietyAdminForm($societyAdminId)
    {
        $details = User::find($societyAdminId);
        $societies = Society::all();
        // dd($details->society[0]->id);
        return view('superAdmin.societyAdmin.editForm', compact('details', 'societies'));
    }



    // |---------------------------------- 25) editSocietyAdmin ----------------------------------|
    public function editSocietyAdmin(Request $req, $societyAdminId)
    {
        $admin = User::find($societyAdminId);

        // check if field email is different than admin email
        // if email is different check if it matches some other db email.
        if ($req->email != $admin->email) {
            // Get the value from the form
            $input['email'] = Input::get('email');

        // Must not already exist in the `email` column of `users` table
            $rules = array('email' => 'unique:users,email');

            $validator = Validator::make($input, $rules);
        // if it matches some existing email return back with error
            if ($validator->fails()) {
                return redirect()->back()->with('error', 'Entered Email already Exists');
            }
        }
    // if admin email unchanged or unique simply save record

        $admin->name = $req->name;
        $admin->email = $req->email;
        $admin->registration = $req->registration;
        $admin->password = Hash::make($req->registration);
        $admin->save();

        // save user_id and society_id in pivot table
        $society_user = Society_User::where('user_id', $admin->id)->first();
        $society_user->society_id = $req->society;
        $society_user->save();
        return redirect()->route('superAdmin.viewAllSocietyAdmins');
    }



    // |---------------------------------- 26) deleteSocietyAdmin ----------------------------------|
    public function deleteSocietyAdmin($societyAdminId)
    {
        $details = User::find($societyAdminId);
        return redirect()->route('superAdmin.viewAllSocietyAdmins');
    }
}
