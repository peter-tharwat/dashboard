<?php

namespace App\Http\Controllers;

use App\Models\ContactReply;
use Illuminate\Http\Request;

class ContactReplyController extends Controller
{


    public function __construct()
    {
        $this->middleware('permission:contacts-create', ['only' => ['create','store']]);
        $this->middleware('permission:contacts-read',   ['only' => ['show', 'index']]);
        $this->middleware('permission:contacts-update',   ['only' => ['edit','update','resolve']]);
        $this->middleware('permission:contacts-delete',   ['only' => ['delete']]);
    }

    public function index(Request $request)
    {
        if(!auth()->user()->isAbleTo('contacts-read'))abort(403);
        $request->validate(['contact_id'=>"required|exists:contacts,id"]);
        $contact= \App\Models\Contact::where('id',$request->id)->with(['replies'])->firstOrFail();
        return view('admin.contacts.replies.index',compact('contact'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if(!auth()->user()->isAbleTo('contacts-create'))abort(403);
        $request->validate(['contact_id'=>"required|exists:contacts,id"]);
        $contact = \App\Models\Contact::where('id',$request->id)->with(['replies'])->firstOrFail();
        return view('admin.contacts.replies.create',compact('contact'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!auth()->user()->isAbleTo('contacts-create'))abort(403);
        $contact= \App\Models\Contact::where('id',$request->contact_id)->firstOrFail();
        $contact->update(['has_support_reply'=>1]);

        $contact_reply = ContactReply::create(['user_id'=>auth()->user()->id,'contact_id'=>$request->contact_id,'content'=>$request->content,'is_support_reply'=>1]);

        if($request->hasFile('files'))
        foreach($request['files'] as $file){
            $uploaded_file = $this->store_file([
                'source'=>$file,
                'validation'=>"file",
                'path_to_save'=>'/uploads/contact-replies/',
                'type'=>'CONTACT_REPLY', 
                'user_id'=>auth()->user()->id,
                'resize'=>[500,1000],
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER'),
                /*'watermark'=>true,*/
                'optimize'=>true
            ]);
            $this->use_hub_file($uploaded_file['filename'],$contact_reply->id,auth()->user()->id);
        } 

        toastr()->success(__('utils/toastr.process_success_message'));
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContactReply  $contactReply
     * @return \Illuminate\Http\Response
     */
    public function show(ContactReply $contactReply)
    {
        if(!auth()->user()->isAbleTo('contacts-read'))abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContactReply  $contactReply
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactReply $contactReply)
    {
        if(!auth()->user()->isAbleTo('contacts-update'))abort(403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContactReply  $contactReply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactReply $contactReply)
    {
        if(!auth()->user()->isAbleTo('contacts-update'))abort(403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactReply  $contactReply
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactReply $contactReply)
    {
        if(!auth()->user()->isAbleTo('contacts-delete'))abort(403);
    }

    public function resolve(Request $request){
        if(!auth()->user()->isAbleTo('contacts-update'))abort(403);
        $contact = \App\Models\Contact::where('contact_id',$request->contact_id)->firstOrFail();
        $contact->update(['status'=>$contact->status=="PENDING"?"DONE":"PENDING"]);
        return 1;
    }
}
