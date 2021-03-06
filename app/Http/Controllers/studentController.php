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
// 9) viewAllMessages
// 10) viewMessage
// 11) sendMessage
// 12) cvBuilder



namespace App\Http\Controllers;

use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Carbon\carbon;
use Auth;
use App\User;
use App\Department;
use App\DepartmentAnnouncement;
use App\Society;
use App\SocietyAnnouncement;
use App\Society_User;
use App\Message;
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
        $departmentAnnouncements = DepartmentAnnouncement::where([
            ['department_id', Auth::user()->department_id],
            ['created_at', '>=', Carbon::now()->subDays(1)]
        ])->count();

        for ($i = 0; $i < count(Auth::user()->society); $i++)
            $societyAnnouncements[] = SocietyAnnouncement::where([
            ['society_id', Auth::user()->society[$i]->id],
            ['created_at', '>=', Carbon::now()->subDays(1)]
        ])->count();

        return view('student.dashboard', compact('departmentAnnouncements', 'societyAnnouncements'));
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

        // if student has registered to some societies then
        if(count(Auth::user()->society)>0)
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
        return redirect()->route('student.manageSocieties');
    }



    // |---------------------------------- 7) manageSocietyNotifications ----------------------------------|
    public function manageSocietyNotifications($societyId)
    {
        $notification = Notification::firstOrCreate(array('user_id'=>Auth::user()->id, 'society_id'=>$societyId));
        if (!$notification->wasRecentlyCreated) {
            $notification->delete();
        }
        return redirect()->route('student.manageSocieties');
    }



    // |---------------------------------- 8) deleteSociety ----------------------------------|
    public function deleteSociety($societyId)
    {
        $society = Society_User::where([['user_id', Auth::user()->id], ['society_id', $societyId]]);
        $notification = Notification::where([['user_id', Auth::user()->id], ['society_id', $societyId]]);
        $society->delete();
        $notification->delete();
        return redirect()->route('student.manageSocieties');
    }



    // |---------------------------------- 9) viewAllMessages ----------------------------------|
    public function viewAllMessages()
    {
        $deptAdmins = User::where([
            ['department_id', Auth::user()->department_id],
            ['userType', '1']
            ])->get();
        $societies = Society::all();
        $socAdmins = User::where('userType', '2')->get();

        $unReadMessages = Message::where([['message_status', '0'], ['receiver_id', Auth::user()->id]])->orderBy('created_at', 'DESC')->get();
        $readMessages = Message::where([['message_status', '!=', '0'], ['receiver_id', Auth::user()->id]])
        ->orWhere('sender_id', Auth::user()->id)
        ->orderBy('created_at', 'DESC')
        ->get();

        return view('student.messages.viewAll', compact('deptAdmins', 'societies', 'socAdmins', 'unReadMessages', 'readMessages'));
    }



    // |---------------------------------- 10) viewMessage ----------------------------------|
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

        return view('student.messages.viewIndividual', compact('messageDetails', 'messages'));
    }



    // |---------------------------------- 11) sendMessage ----------------------------------|
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
        $sendTo = $req->sendTo;
        // exploding the sendTo select option into two parts receiver_type and receiver_id
        $sendToExploded = explode('-', $sendTo);
        $receiver_type = $sendToExploded[0];
        $receiver_id = $sendToExploded[1];
        $message->receiver_id = $receiver_id;
        $message->receiver_type = $receiver_type;
        }

        $message->save();
        return redirect()->route('student.viewAllMessages')->with('message', 'Message Sent');
    }



    // |---------------------------------- 12) cvBuilder ----------------------------------|
    public function cvBuilder()
    {
       return view('student.cvBuilder');

    }
}
