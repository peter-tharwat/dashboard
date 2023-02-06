<?php

namespace App\Observers;

use App\Models\ContactReply;
use Illuminate\Support\Facades\Notification;
class ContactReplyObserver
{
    /**
     * Handle the ContactReply "created" event.
     *
     * @param  \App\Models\ContactReply  $contactReply
     * @return void
     */
    public function created(ContactReply $contactReply)
    { 
        $email = null;
        $name = null;
        if($contactReply->contact->email!=null)$email=$contactReply->contact->email;
        elseif(isset($contactReply->contact->user->email))$email=$contactReply->contact->user->email;


        if($contactReply->contact->name!=null)$name=$contactReply->contact->name;
        elseif(isset($contactReply->contact->user->name))$name=$contactReply->contact->user->name;


        if($email!=null && !isset($contactReply->contact->user)){
            $options=[
                'emails'=>["admin@admin.com"],
                'content'=>[$contactReply->content],
                'action_url'=>"",
                'methods'=>['mail'],
                'image'=>"",
                'btn_text'=>"عرض الإشعار"
            ];
            if(env("MAIL_USERNAME")!=null)
            Notification::route('mail', $options['emails'])
                ->notify(new \App\Notifications\GeneralNotification([
                    'content'=>$options['content'],
                    'action_url'=>$options['action_url'],
                    'btn_text'=>$options['btn_text'],
                    'methods'=>$options['methods'],
                    'image'=>$options['image']
                ]));
        }else{ 
            
            \MainHelper::notify_user([
                'user_id'=>$contactReply->contact->user_id,
                'content'=>[$contactReply->content],
                'action_url'=>$contactReply->contact->user_id == auth()->id()? route('user.ticket',$contactReply->contact):route('admin.contacts.show',$contactReply->contact),
                'methods'=>env("MAIL_USERNAME")!=null?['database','mail']:['database'],
                'btn_text'=>"عرض التذكرة"
            ]);
        }
        
    }

    /**
     * Handle the ContactReply "updated" event.
     *
     * @param  \App\Models\ContactReply  $contactReply
     * @return void
     */
    public function updated(ContactReply $contactReply)
    {
        //
    }

    /**
     * Handle the ContactReply "deleted" event.
     *
     * @param  \App\Models\ContactReply  $contactReply
     * @return void
     */
    public function deleted(ContactReply $contactReply)
    {
        //
    }

    /**
     * Handle the ContactReply "restored" event.
     *
     * @param  \App\Models\ContactReply  $contactReply
     * @return void
     */
    public function restored(ContactReply $contactReply)
    {
        //
    }

    /**
     * Handle the ContactReply "force deleted" event.
     *
     * @param  \App\Models\ContactReply  $contactReply
     * @return void
     */
    public function forceDeleted(ContactReply $contactReply)
    {
        //
    }
}
