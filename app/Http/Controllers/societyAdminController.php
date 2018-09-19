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




namespace App \Http \Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Carbon\carbon;
use File;
use Auth;
use App\Society;
use App\SocietyAnnouncement;


class societyAdminController extends Controller
{



    // |---------------------------------- 1) construct ----------------------------------|
    public function __construct()
    {
        $this->middleware('auth');
    }



    // |---------------------------------- 2) dashboard ----------------------------------|
    public function dashboard()
    {
        $societyAnnouncements = SocietyAnnouncement::where([
            ['society_id', Auth::user()->society[0]->id],
            ['created_at', '>=', Carbon::now()->subDays(1)]
        ])->count();

        return view('societyAdmin.dashboard', compact('societyAnnouncements'));
    }



    // |---------------------------------- 3) viewAllAnnouncements ----------------------------------|
    public function viewAllAnnouncements()
    {
        $announcements = SocietyAnnouncement::where('society_id', Auth::user()->society[0]->id)
        ->orderBy('created_at', 'DESC')
        ->get();
        return view('societyAdmin.announcement.viewAll', compact('announcements'));
    }



    // |---------------------------------- 4) addAnnouncementForm ----------------------------------|
    public function addAnnouncementForm()
    {
        return view('societyAdmin.announcement.addForm');
    }



    // |---------------------------------- 5) addAnnouncement ----------------------------------|
    public function addAnnouncement(Request $req)
    {
        $announcement = new SocietyAnnouncement;
        $announcement->society_id = Auth::user()->society[0]->id;
        $announcement->title = $req->title;
        $announcement->description = $req->description;
        if ($req->file('announcementFile')) {
            Storage::put('public/societyAnnouncements', $req->announcementFile);
            $announcement->file = $req->announcementFile->hashName();
        }
        $announcement->save();
        return redirect()->route('societyAdmin.viewAllAnnouncements');
    }



    // |---------------------------------- 6) editAnnouncementForm ----------------------------------|
    public function editAnnouncementForm($announcementId)
    {
        $announcement = SocietyAnnouncement::find($announcementId);
        return view('societyAdmin.announcement.editForm', compact('announcement'));
    }



    // |---------------------------------- 7) editAnnouncement ----------------------------------|
    public function editAnnouncement(Request $req, $announcementId)
    {
        $announcement = SocietyAnnouncement::find($announcementId);
        $announcement->society_id = Auth::user()->society[0]->id;
        $announcement->title = $req->title;
        $announcement->description = $req->description;
        if ($req->file('announcementFile')) {
            if (File::exists('storage/societyAnnouncements/' . $announcement->file))
                Storage::delete('public/societyAnnouncements/' . $announcement->file);
            Storage::put('public/societyAnnouncements', $req->announcementFile);
            $announcement->file = $req->announcementFile->hashName();
        }
        $announcement->save();
        return redirect()->route('societyAdmin.viewAllAnnouncements');
    }



    // |---------------------------------- 8) searchAnnouncement ----------------------------------|
    public function searchAnnouncement(Request $req)
    {
        $announcements = SocietyAnnouncement::where([['title', 'LIKE', '%' . $req->search . '%'],['society_id', Auth::user()->society[0]->id]])
        ->orderBy('created_at', 'DESC')
        ->get();
        return view('societyAdmin.announcement.searchResult', compact('announcements'));
    }



    // |---------------------------------- 9) deleteAnnouncement ----------------------------------|
    public function deleteAnnouncement($announcementId)
    {
        $announcement = SocietyAnnouncement::find($announcementId);
        if (File::exists('storage/societyAnnouncements/' . $announcement->file))
            Storage::delete('public/societyAnnouncements/' . $announcement->file);
            $announcement->delete();
        return redirect()->route('societyAdmin.viewAllAnnouncements');
    }
}
