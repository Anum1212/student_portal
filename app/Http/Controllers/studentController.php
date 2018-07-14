<?php



// controller Details
// ------------------
// Methods Present
// ------------------
// 1) __construct
// 2) dashboard




namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Auth;
use App\User;
use App\Department;
use App\DepartmentAnnouncement;
use App\Society;
use App\SocietyAnnouncement;
use App\Society_User;

class studentController extends Controller
{



    // |---------------------------------- 1) construct ----------------------------------|
    public function __construct()
    {
        $this->middleware('auth');
    }



    // |---------------------------------- 2) dashboard ----------------------------------|
    public function dashboard()
    {
        return view('student.dashboard');
    }



    // |---------------------------------- 2) departmentAlerts ----------------------------------|
    public function departmentAnnouncements()
    {
        $departmentAnnouncements = DepartmentAnnouncement::where('department_id', Auth::user()->department_id)
        ->orderBy('created_at', 'DESC')
        ->get();
        return view('student.department.viewAll', compact('departmentAnnouncements'));
    }
    
    
    
    // |---------------------------------- 2) societyAlerts ----------------------------------|
    public function societyAnnouncements()
    {
        for ($i = 0; $i < count(Auth::user()->society); $i++)
            $societyAnnouncementsCollection[] = SocietyAnnouncement::where('society_id', Auth::user()->society[$i]->id)
            ->orderBy('created_at', 'DESC')
            ->get();
            
            // ********** critical step **********
            // $websiteProducts is an array of collections
            // in the code below we combine the collections into 1 collection
            $societyAnnouncements = new Collection();
            foreach ($societyAnnouncementsCollection as $collection) {
                foreach ($collection as $item) {
                    $societyAnnouncements->push($item);
                }
            }

        return view('student.society.viewAll', compact('societyAnnouncements'));
    }
}
