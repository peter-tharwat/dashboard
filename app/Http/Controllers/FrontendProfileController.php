<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactReply;

class FrontendProfileController extends Controller
{
    public function dashboard(Request $request)
    {
        return view('front.user.index');
    }
    public function balances(Request $request)
    {
        return view('front.user.balances');
    }
    public function support(Request $request)
    {
        return view('front.user.support');
    }
    public function create_ticket(Request $request)
    {
        return view('front.user.create-ticket');
    }
    public function store_ticket(Request $request)
    {
        $ticket = \App\Models\Contact::create([
            'user_id'=>auth()->user()->id,
            'name'=>auth()->user()->name,
            'email'=>auth()->user()->email,
            'message'=>$request->message
        ]);
        if($request->files !=null){
            foreach($request->files as $file){
                $ticket->addMedia($file)->toMediaCollection();
            }
        }
        return redirect()->route('user.ticket',$ticket);
    }
    
    public function ticket(Request $request,Contact $ticket)
    {
        return view('front.user.ticket',compact('ticket'));
    }
    public function reply_ticket(Request $request)
    {
        $request->validate([
            'message'=>"required|string|min:10|max:1000",
        ]);
        $ticket = \App\Models\Contact::where('user_id',auth()->user()->id)->where('id',$request->ticket_id)->firstOrFail();
        ContactReply::create([
            'user_id'=>auth()->user()->id,
            'is_support_reply'=>0,
            'contact_id'=>$ticket->id,
            'content'=>$request->message
        ]);
        return redirect()->back()->with([
            'message'=>"تم ارسال رسالتك بنجاح",
            'alert-type'=>"warning"
        ]);
        
    }
    public function notifications(Request $request)
    {
        return view('front.user.notifications');
    }
    public function profile_edit(Request $request)
    {
        return view('front.user.settings');
    }
    public function profile_update(Request $request)
    {
        return view('front.user.index');
    }
    public function profile_update_password(Request $request)
    {
        return view('front.user.index');
    }
    public function profile_update_email(Request $request)
    {
        return view('front.user.index');
    }

}
