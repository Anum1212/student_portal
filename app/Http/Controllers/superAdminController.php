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
// 8) searchDepartment
// 9) deleteDepartment
// 10) viewAllDepartmentAdmins
// 11) addDepartmentAdminForm
// 12) addDepartmentAdmin
// 13) editDepartmentAdminForm
// 14) editDepartmentAdmin
// 15) searchDepartmentAdmin
// 16) deleteDepartmentAdmin
// 17) viewAllSocieties
// 18) addSocietyForm
// 19) addSociety
// 20) editSocietyForm
// 21) editSociety
// 22) searchSociety
// 23) deleteSociety
// 24) viewAllSocietyAdmins
// 25) addSocietyAdminForm
// 26) addSocietyAdmin
// 27) editSocietyAdminForm
// 28) editSocietyAdmin
// 29) searchSocietyAdmin
// 30) deleteSocietyAdmin
// 31) viewAllStudents
// 32) addStudentForm
// 33) addStudent
// 34) editStudentForm
// 35) editStudent
// 36) searchStudent
// 37) deleteStudent




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



    // |---------------------------------- 8) searchDepartment ----------------------------------|
    public function searchDepartment(Request $req)
    {
        $results = Department::where('departmentCode', 'LIKE', '%' . $req->search . '%')->orWhere('departmentName', 'LIKE', '%' . $req->search . '%')->get();
        return view('superAdmin.department.searchResult', compact('results'));
    }



    // |---------------------------------- 9) deleteDepartment ----------------------------------|
    public function deleteDepartment($departmentId)
    {
        $details = Department::find($departmentId);
        return redirect()->route('superAdmin.viewAllDepartments');
    }



    // |---------------------------------- 10) viewAllDepartmentAdmins ----------------------------------|
    public function viewAllDepartmentAdmins()
    {
        $departmentAdmins = User::where('userType', '1')->get();
        return view('superAdmin.departmentAdmin.viewAll', compact('departmentAdmins'));
    }



    // |---------------------------------- 11) addDepartmentAdminForm ----------------------------------|
    public function addDepartmentAdminForm()
    {
        $departments = Department::all();
        return view('superAdmin.departmentAdmin.addForm', compact('departments'));
    }



    // |---------------------------------- 12) addDepartmentAdmin ----------------------------------|
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



    // |---------------------------------- 13) editDepartmentAdminForm ----------------------------------|
    public function editDepartmentAdminForm($departmentAdminId)
    {
        $details = User::find($departmentAdminId);
        $departments = Department::all();
        return view('superAdmin.departmentAdmin.editForm', compact('details', 'departments'));
    }



    // |---------------------------------- 14) editDepartmentAdmin ----------------------------------|
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



    // |---------------------------------- 15) searchDepartmentAdmin ----------------------------------|
    public function searchDepartmentAdmin(Request $req)
    {
        $results = User::where([['name', 'LIKE', '%' . $req->search . '%'], ['userType', '1']])
            ->orWhere([['email', 'LIKE', '%' . $req->search . '%'], ['userType', '1']])
            ->orWhere([['registration', 'LIKE', '%' . $req->search . '%'], ['userType', '1']])
            ->get();
        return view('superAdmin.departmentAdmin.searchResult', compact('results'));
    }



    // |---------------------------------- 16) deleteDepartmentAdmin ----------------------------------|
    public function deleteDepartmentAdmin($departmentAdminId)
    {
        $details = User::find($departmentAdminId);
        return redirect()->route('superAdmin.viewAllDepartmentAdmins');
    }



    // |---------------------------------- 17) viewAllSocieties ----------------------------------|
    public function viewAllSocieties()
    {
        $societies = Society::all();
        return view('superAdmin.society.viewAll', compact('societies'));
    }



    // |---------------------------------- 18) addSocietyForm ----------------------------------|
    public function addSocietyForm()
    {
        return view('superAdmin.society.addForm');
    }



    // |---------------------------------- 19) addSociety ----------------------------------|
    public function addSociety(Request $req)
    {
        $society = new Society;
        $society->societyCode = $req->code;
        $society->societyName = $req->name;
        $society->save();
        return redirect()->route('superAdmin.viewAllSocieties');
    }



    // |---------------------------------- 20) editSocietyForm ----------------------------------|
    public function editSocietyForm($societyId)
    {
        $details = Society::find($societyId);
        return view('superAdmin.society.editForm', compact('details'));
    }



    // |---------------------------------- 21) editSociety ----------------------------------|
    public function editSociety(Request $req, $societyId)
    {
        $details = Society::find($societyId);
        $details->societyCode = $req->code;
        $details->societyName = $req->name;
        $details->save();
        return redirect()->route('superAdmin.viewAllSocieties');
    }



    // |---------------------------------- 22) searchSociety ----------------------------------|
    public function searchSociety(Request $req)
    {
        $results = Society::where('societyCode', 'LIKE', '%' . $req->search . '%')->orWhere('societyName', 'LIKE', '%' . $req->search . '%')->get();
        return view('superAdmin.society.searchResult', compact('results'));
    }



    // |---------------------------------- 23) deleteSociety ----------------------------------|
    public function deleteSociety($societyId)
    {
        $details = Society::find($societyId);
        return redirect()->route('superAdmin.viewAllSocieties');
    }



    // |---------------------------------- 24) viewAllSocietyAdmins ----------------------------------|
    public function viewAllSocietyAdmins()
    {
        $societyAdmins = User::where('userType','2')->get();
        return view('superAdmin.societyAdmin.viewAll', compact('societyAdmins'));
    }



    // |---------------------------------- 25) addSocietyAdminForm ----------------------------------|
    public function addSocietyAdminForm()
    {
        $societies = Society::all();
        return view('superAdmin.societyAdmin.addForm', compact('societies'));
    }



    // |---------------------------------- 26) addSocietyAdmin ----------------------------------|
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



    // |---------------------------------- 27) editSocietyAdminForm ----------------------------------|
    public function editSocietyAdminForm($societyAdminId)
    {
        $details = User::find($societyAdminId);
        $societies = Society::all();
        // dd($details->society[0]->id);
        return view('superAdmin.societyAdmin.editForm', compact('details', 'societies'));
    }



    // |---------------------------------- 28) editSocietyAdmin ----------------------------------|
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



    // |---------------------------------- 29) searchSocietyAdmin ----------------------------------|
    public function searchSocietyAdmin(Request $req)
    {
        $results = User::where([['name', 'LIKE', '%' . $req->search . '%'],['userType', '2']])
            ->orWhere([['email', 'LIKE', '%' . $req->search . '%'],['userType', '2']])
            ->orWhere([['registration', 'LIKE', '%' . $req->search . '%'],['userType', '2']])
            ->get();
        return view('superAdmin.societyAdmin.searchResult', compact('results'));
    }



    // |---------------------------------- 30) deleteSocietyAdmin ----------------------------------|
    public function deleteSocietyAdmin($societyAdminId)
    {
        $details = User::find($societyAdminId);
        return redirect()->route('superAdmin.viewAllSocietyAdmins');
    }



    // |---------------------------------- 31) viewAllStudents ----------------------------------|
    public function viewAllStudents()
    {
        $students = User::where('userType', '3')->get();
        return view('superAdmin.student.viewAll', compact('students'));
    }



    // |---------------------------------- 32) addStudentForm ----------------------------------|
    public function addStudentForm()
    {
        $departments = Department::all();
        return view('superAdmin.student.addForm', compact('departments'));
    }



    // |---------------------------------- 33) addStudent ----------------------------------|
    public function addStudent(Request $req)
    {
        $student = new User;
        $student->name = $req->name;
        $student->email = $req->email;
        $student->registration = $req->registration;
        $student->password = Hash::make($req->registration);
        $student->department_id = $req->department;
        $student->userType = '3';
        $student->save();
        return redirect()->route('superAdmin.viewAllStudents');
    }



    // |---------------------------------- 34) editStudentForm ----------------------------------|
    public function editStudentForm($studentId)
    {
        $details = User::find($studentId);
        $departments = Department::all();
        return view('superAdmin.student.editForm', compact('details', 'departments'));
    }



    // |---------------------------------- 35) editStudent ----------------------------------|
    public function editStudent(Request $req, $studentId)
    {
        $student = User::find($studentId);

        // check if field email is different than student email
        // if email is different check if it matches some other db email.
        if ($req->email != $student->email) {
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
    // if student email unchanged or unique simply save record
        $student->name = $req->name;
        $student->email = $req->email;
        $student->registration = $req->registration;
        $student->password = Hash::make($req->registration);
        $student->department_id = $req->department;
        $student->save();
        return redirect()->route('superAdmin.viewAllStudents');
    }



    // |---------------------------------- 36) searchStudent ----------------------------------|
    public function searchStudent(Request $req)
    {
        $results = User::where([['name', 'LIKE', '%' . $req->search . '%'], ['userType', '3']])
            ->orWhere([['email', 'LIKE', '%' . $req->search . '%'], ['userType', '3']])
            ->orWhere([['registration', 'LIKE', '%' . $req->search . '%'], ['userType', '3']])
            ->get();
        return view('superAdmin.student.searchResult', compact('results'));
    }



    // |---------------------------------- 37) deleteStudent ----------------------------------|
    public function deleteStudent($studentId)
    {
        $details = User::find($studentId);
        return redirect()->route('superAdmin.viewAllStudents');
    }
}
