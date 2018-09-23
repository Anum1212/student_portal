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
// 10) senderDetails
// 11) viewAllMessages
// 12) viewMessage
// 13) sendMessage




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
use App\Message;
use App\User;
use Mail;
use App\Mail\announcementUpdate;

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

        $department = Department::whereId(Auth::user()->department_id)->first();
        $announcementMakerName = $department->departmentName;

        $students = User::where([['department_id', Auth::user()->department_id],['userType', '3']])->get();
        foreach ($students as $student) {
            Mail::send(new announcementUpdate($announcementMakerName, $announcement->title, $student));
        }
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



    // |---------------------------------- 10) senderDetails ----------------------------------|
    public function senderDetails($senderId)
    {
        $details = User::find($senderId);
        return view('departmentAdmin.senderDetails', compact('details'));
    }



    // |---------------------------------- 11) viewAllMessages ----------------------------------|
    public function viewAllMessages()
    {
         $unReadMessages = Message::where([['message_status', '0'], ['receiver_id', Auth::user()->id]])->orderBy('created_at', 'DESC')->get();
         $readMessages = Message::where([['message_status', '!=', '0'], ['receiver_id', Auth::user()->id]])
         ->orWhere('sender_id', Auth::user()->id)
         ->orderBy('created_at', 'DESC')
         ->get();

        return view('departmentAdmin.messages.viewAll', compact('unReadMessages', 'readMessages'));
    }



    // |---------------------------------- 12) viewMessage ----------------------------------|
    public function viewMessage($messageId)
    {
        $messageDetails = Message::whereId($messageId)->first();
        $messages = Message::where([['message_status', '0'], ['receiver_id', Auth::user()->id]])
        ->orderBy('created_at', 'DESC')
        ->get();

        if($messageDetails->message_status == '0'){
        $messageDetails->message_status = '1';
        $messageDetails->save();
        }

        return view('departmentAdmin.messages.viewIndividual', compact('messageDetails', 'messages'));
    }



    // |---------------------------------- 13) sendMessage ----------------------------------|
    public function sendMessage(Request $req, $messageId=NULL)
    {
        $message = new Message;
        $message->sender_id = Auth::user()->id;
        $message->sender_name = Auth::user()->name;
        $message->sender_type = Auth::user()->userType;
        $message->title = $req->title;
        $message->message = $req->message;
        if ($req->file('messageFile')) {
            Storage::put('public/messageFile', $req->messageFile);
            $message->file = $req->messageFile->hashName();
        }

        if($messageId){
            $messageDetails = Message::find($messageId);
            $message->message_type = '0';
            $message->receiver_id = $messageDetails->sender_id;
            $message->receiver_type = $messageDetails->sender_type;
            $message->replied_to_message_id = $messageId;
            $messageDetails->message_status = '2';
            $messageDetails->save();
        }

        else{
        $message->message_type = $req->messageType;
        $message->receiver_id = '0';
        $message->receiver_type = '0';
        }

        $message->save();

        return redirect()->route('departmentAdmin.viewAllMessages')->with('message', 'Message Sent');
    }
}
