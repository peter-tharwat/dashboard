<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ContactReply;
use Illuminate\Http\Request;

class BackendContactReplyController extends Controller
{


    public function __construct()
    {
        $this->middleware('can:contacts-create', ['only' => ['create','store']]);
        $this->middleware('can:contacts-read',   ['only' => ['show', 'index']]);
        $this->middleware('can:contacts-update',   ['only' => ['edit','update','resolve']]);
        $this->middleware('can:contacts-delete',   ['only' => ['delete']]);
    }

    public function index(Request $request)
    {
        if(!auth()->user()->can('contacts-read'))abort(403);
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
        if(!auth()->user()->can('contacts-create'))abort(403);
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
        if(!auth()->user()->can('contacts-create'))abort(403);
        $contact= \App\Models\Contact::where('id',$request->contact_id)->firstOrFail();
        $contact->update(['has_support_reply'=>1]);

        $contact_reply = ContactReply::create(['user_id'=>auth()->user()->id,'contact_id'=>$request->contact_id,'content'=>$request->content,'is_support_reply'=>1]);

        if($request->hasFile('files'))
        foreach($request['files'] as $file){
            $contact_reply->addMedia($file)->toMediaCollection('files');
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
        if(!auth()->user()->can('contacts-read'))abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContactReply  $contactReply
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactReply $contactReply)
    {
        if(!auth()->user()->can('contacts-update'))abort(403);
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
        if(!auth()->user()->can('contacts-update'))abort(403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactReply  $contactReply
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactReply $contactReply)
    {
        if(!auth()->user()->can('contacts-delete'))abort(403);
    }

    public function resolve(Request $request){
        if(!auth()->user()->can('contacts-update'))abort(403);
        $contact = \App\Models\Contact::where('contact_id',$request->contact_id)->firstOrFail();
        $contact->update(['status'=>$contact->status=="PENDING"?"DONE":"PENDING"]);
        return 1;
    }
}
