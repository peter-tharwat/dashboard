<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\View\Components\Notifications as NotificationComponent;
class BackendNotificationsController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:notifications-create', ['only' => ['create','store']]);
        $this->middleware('can:notifications-read',   ['only' => ['see', 'index','ajax']]);
    }


    public function index(Request $request){
        if(!auth()->user()->can('notifications-read'))abort(403);

        $user=auth()->user();
        if($request->user_id!=null)
            $user=\App\Models\User::where('id',$request->user_id)->firstOrFail();
        if(auth()->user()->id==$user->id)
            $user->unreadNotifications->markAsRead();
        $notifications = $user->notifications()->simplePaginate(); 
        return view('admin.notifications.index',compact('notifications'));
    }
    public function see(Request $request){
        if(!auth()->user()->can('notifications-read'))abort(403);
        session(['seen_notifications'=>0]);
        auth()->user()->unreadNotifications->markAsRead();
    }

    public function ajax(Request $request){
        if(!auth()->user()->can('notifications-read'))abort(403);
        $notifications = \Auth::user()->notifications()->limit(15)->get(); 
        $not_response  = array(
            'response'                   => (new NotificationComponent($notifications))->render(1),
            'count_unseen_notifications' => intval($notifications->whereNull('read_at')->count()),
        );
        $data = [
            'notifications' => [
                'response'        => $not_response,
                'counter_session' => intval(session('seen_notifications')),
            ],
            'alert' => false,
        ];

        if ($data['notifications']['counter_session'] < $not_response['count_unseen_notifications'])
            $data['alert'] = true; 
  
            session(['seen_notifications' => $not_response['count_unseen_notifications']]);
        return $data;
    }

    public function create(Request $request){
        if(!auth()->user()->can('notifications-create'))abort(403);
        $request->validate(['user_id'=>"required|exists:users,id"]);
        return view('admin.notifications.create');
    }
    public function store(Request $request){
        if(!auth()->user()->can('notifications-create'))abort(403);
        $contact = \App\Models\Contact::create([
            'user_id'=>$request->user_id,
            'message'=>$request->content,
            'has_support_reply'=>1,
            'status'=>"DONE",
        ]);
        if($request->hasFile('files'))
        foreach($request['files'] as $file){
            $contact->addMedia($file)->toMediaCollection('file');
        } 

        $user = \App\Models\User::where('id',$request->user_id)->firstOrFail();
        (new \MainHelper)->notify_user([
            'user_id'=>$request->user_id,
            'content'=>[$request->content],
            'btn_text'=>"عرض التنبيه",
            'action_url'=>route('admin.contacts.show',$contact)
        ]);
        toastr()->success('تم إرسال التنبيه بنجاح');
        return redirect()->route('admin.notifications.index',['user_id'=>$request->user_id]);

    }

}
