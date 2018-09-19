<?php



// controller Details
// ------------------
// Methods Present
// ------------------
// 1) __construct
// 2) dashboard
// 3) viewAllAnnouncements
// 4) addAnnouncementForm
// 5) addAnnouncement
// 6) editAnnouncementForm
// 7) editAnnouncement
// 8) searchAnnouncement
// 9) deleteAnnouncement




namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Carbon\carbon;
use File;
use Auth;
use App\DepartmentAnnouncement;
use App\Department;

class departmentAdminController extends Controller
{



    // |---------------------------------- 1) construct ----------------------------------|
    public function __construct()
    {
        $this->middleware('auth');
    }



    // |---------------------------------- 2) dashboard ----------------------------------|
    public function dashboard()
    {
        $departmentAnnouncements = DepartmentAnnouncement::where([
            ['department_id', Auth::user()->department_id],
            ['created_at', '>=', Carbon::now()->subDays(1)]
        ])->count();
        return view('departmentAdmin.dashboard', compact('departmentAnnouncements'));
    }



    // |---------------------------------- 3) viewAllAnnouncements ----------------------------------|
    public function viewAllAnnouncements()
    {
        $announcements = DepartmentAnnouncement::where('department_id', Auth::user()->department_id)
        ->orderBy('created_at', 'DESC')
        ->get();
        return view('departmentAdmin.announcement.viewAll', compact('announcements'));
    }



    // |---------------------------------- 4) addAnnouncementForm ----------------------------------|
    public function addAnnouncementForm()
    {
        return view('departmentAdmin.announcement.addForm');
    }



    // |---------------------------------- 5) addAnnouncement ----------------------------------|
    public function addAnnouncement(Request $req)
    {
        $announcement = new DepartmentAnnouncement;
        $announcement->department_id = Auth::user()->department_id;
        $announcement->title = $req->title;
        $announcement->description = $req->description;
        if ($req->file('announcementFile')) {
            Storage::put('public/departmentAnnouncements', $req->announcementFile);
            $announcement->file = $req->announcementFile->hashName();
        }
        $announcement->save();
        return redirect()->route('departmentAdmin.viewAllAnnouncements');
    }



    // |---------------------------------- 6) editAnnouncementForm ----------------------------------|
    public function editAnnouncementForm($announcementId)
    {
        $announcement = DepartmentAnnouncement::find($announcementId);
        return view('departmentAdmin.announcement.editForm', compact('announcement'));
    }



    // |---------------------------------- 7) editAnnouncement ----------------------------------|
    public function editAnnouncement(Request $req, $announcementId)
    {
        $announcement = DepartmentAnnouncement::find($announcementId);
        $announcement->department_id = Auth::user()->department_id;
        $announcement->title = $req->title;
        $announcement->description = $req->description;
        if ($req->file('announcementFile')) {
            if (File::exists('storage/departmentAnnouncements/' . $announcement->file))
                Storage::delete('public/departmentAnnouncements/' . $announcement->file);
            Storage::put('public/departmentAnnouncements', $req->announcementFile);
            $announcement->file = $req->announcementFile->hashName();
        }
        $announcement->save();
        return redirect()->route('departmentAdmin.viewAllAnnouncements');
    }



    // |---------------------------------- 8) searchAnnouncement ----------------------------------|
    public function searchAnnouncement(Request $req)
    {
        $announcements = DepartmentAnnouncement::where([['title', 'LIKE', '%' . $req->search . '%'],['department_id', Auth::user()->department_id]])
        ->orderBy('created_at', 'DESC')
        ->get();
        return view('departmentAdmin.announcement.searchResult', compact('announcements'));
    }



    // |---------------------------------- 9) deleteAnnouncement ----------------------------------|
    public function deleteAnnouncement($announcementId)
    {
        $announcement = DepartmentAnnouncement::find($announcementId);
        if (File::exists('storage/departmentAnnouncements/' . $announcement->file))
            Storage::delete('public/departmentAnnouncements/' . $announcement->file);
        $announcement->delete();
        return redirect()->route('departmentAdmin.viewAllAnnouncements');
    }
}
