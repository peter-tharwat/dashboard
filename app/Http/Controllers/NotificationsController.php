<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\View\Components\Notifications as NotificationComponent;
class NotificationsController extends Controller
{
    public function index(Request $request){
        $user=auth()->user();
        if($request->user_id!=null)
            $user=\App\Models\User::where('id',$request->user_id)->firstOrFail();
        if(auth()->user()->id==$user->id)
            $user->unreadNotifications->markAsRead();
        $notifications = $user->notifications()->simplePaginate(); 
        return view('admin.notifications.index',compact('notifications'));
    }
    public function see(Request $request){
        session(['seen_notifications'=>0]);
        auth()->user()->unreadNotifications->markAsRead();
    }

    public function ajax(Request $request){

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
        $request->validate(['user_id'=>"required|exists:users,id"]);
        return view('admin.notifications.create');
    }
    public function store(Request $request){

        $contact = \App\Models\Contact::create([
            'user_id'=>$request->user_id,
            'message'=>$request->content,
            'has_support_reply'=>1,
            'status'=>"DONE",
        ]);
        if($request->hasFile('files'))
        foreach($request['files'] as $file){
            $uploaded_file = $this->store_file([
                'source'=>$file,
                'validation'=>"file",
                'path_to_save'=>'/uploads/contacts/',
                'type'=>'CONTACT', 
                'user_id'=>auth()->user()->id,
                'resize'=>[500,1000],
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER'),
                /*'watermark'=>true,*/
                'compress'=>'auto'
            ]);
            $this->use_hub_file($uploaded_file['filename'],$contact->id,$request->user_id);
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
