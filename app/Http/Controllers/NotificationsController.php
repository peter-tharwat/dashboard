<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\View\Components\Notifications as NotificationComponent;
class NotificationsController extends Controller
{
    public function index(Request $request){
        auth()->user()->unreadNotifications->markAsRead();
        $notifications = \Auth::user()->notifications()->simplePaginate(); 
        return view('admin.notifications.index',compact('notifications'));
    }
    public function notifications_see(Request $request){
        session(['seen_notifications'=>0]);
        auth()->user()->unreadNotifications->markAsRead();
    }

    public function notifications_ajax(Request $request){

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

}
