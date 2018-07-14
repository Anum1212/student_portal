<?php



// controller Details
// ------------------
// Methods Present
// ------------------
// 1) construct
// 2) dashboard
// 3) departmentAnnouncements
// 4) societyAnnouncements
// 5) manageSocieties
// 6) addSociety
// 7) manageSocietyNotifications
// 8) deleteSociety



namespace App\Http\Controllers;

use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Auth;
use App\User;
use App\Department;
use App\DepartmentAnnouncement;
use App\Society;
use App\SocietyAnnouncement;
use App\Society_User;
use App\Notification;

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



    // |---------------------------------- 3) departmentAnnouncements ----------------------------------|
    public function departmentAnnouncements()
    {
        $departmentAnnouncements = DepartmentAnnouncement::where('department_id', Auth::user()->department_id)
        ->orderBy('created_at', 'DESC')
        ->get();
        return view('student.department.viewAll', compact('departmentAnnouncements'));
    }
    
    
    
    // |---------------------------------- 4) societyAnnouncements ----------------------------------|
    public function societyAnnouncements()
    {
        for ($i = 0; $i < count(Auth::user()->society); $i++)
            $societyAnnouncementsCollection[] = SocietyAnnouncement::where('society_id', Auth::user()->society[$i]->id)
            ->orderBy('created_at', 'DESC')
            ->get();
            
            // ********** critical step **********
            // $societyAnnouncementsCollection is an array of collections
            // in the code below we combine the collections into 1 collection
            $societyAnnouncements = new Collection();
            foreach ($societyAnnouncementsCollection as $collection) {
                foreach ($collection as $item) {
                    $societyAnnouncements->push($item);
                }
            }

        return view('student.society.viewAll', compact('societyAnnouncements'));
    }
    
    
    
    // |---------------------------------- 5) manageSocieties ----------------------------------|
    public function manageSocieties()
    {
        $societyNotificationStatus = Notification::where('user_id', Auth::user()->id)->get();

        // get student registered society ids
        for ($i = 0; $i < count(Auth::user()->society); $i++)
        $studentRegisteredSocietyIds[] = Auth::user()->society[$i]->id;
        // get all society ids
        $societies = Society::all();
        for ($i = 0; $i < count($societies); $i++)
        $studentUnRegisteredSocietyIds[] = $societies[$i]->id;
        
        // intersect studentRegisteredSocietyIds and studentUnRegisteredSocietyIds to get ids of society's that student has not registered in
        $studentUnRegisteredSocietyIds = array_diff($studentUnRegisteredSocietyIds, $studentRegisteredSocietyIds);

        // remake array to fix missing indexes problem
        $studentUnRegisteredSocietyIds = array_values($studentUnRegisteredSocietyIds);
        
        // if there are no unregistered societies
        if (empty($studentUnRegisteredSocietyIds))
            return view('student.society.manageSocieties', compact('societyNotificationStatus'));

        else{
        // get details of studentUnRegisteredSocieties
        for ($i = 0; $i < count($studentUnRegisteredSocietyIds); $i++)
        $studentUnRegisteredSocieties[] = Society::whereId($studentUnRegisteredSocietyIds[$i])->first();

        return view('student.society.manageSocieties', compact('studentUnRegisteredSocieties', 'societyNotificationStatus'));
    }
    }
    
    
    
    // |---------------------------------- 6) addSociety ----------------------------------|
    public function addSociety(Request $req)
    {
        $registerSociety = new Society_User;
        $registerSociety->user_id = Auth::user()->id;
        $registerSociety->society_id = $req->studentUnRegisteredSociety;
        $registerSociety->save();
        return redirect()->route('student.manageSocietiesForm');
    }
    
    
    
    // |---------------------------------- 7) manageSocietyNotifications ----------------------------------|
    public function manageSocietyNotifications($societyId)
    {
        $notification = Notification::firstOrCreate(array('user_id'=>Auth::user()->id, 'society_id'=>$societyId));
        if (!$notification->wasRecentlyCreated) {
            $notification->delete();
        }
        return redirect()->route('student.manageSocietiesForm');
    }
    
    
    
    // |---------------------------------- 8) deleteSociety ----------------------------------|
    public function deleteSociety($societyId)
    {
        $society = Society_User::where([['user_id', Auth::user()->id], ['society_id', $societyId]]);
        $society->delete();
        return redirect()->route('student.manageSocietiesForm');
    }
}
