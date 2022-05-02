<?php

namespace App\Http\Controllers;

use App\Models\ContactReply;
use Illuminate\Http\Request;

class ContactReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
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
        $request->validate(['contact_id'=>"required|exists:contacts,id"]);
        $contact= \App\Models\Contact::where('id',$request->id)->with(['replies'])->firstOrFail();
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
        ContactReply::create(['user_id'=>auth()->user()->id,'contact_id'=>$request->contact_id,'content'=>$request->content]);
        flash()->success('تمت العملية بنجاح');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContactReply  $contactReply
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactReply $contactReply)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactReply  $contactReply
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactReply $contactReply)
    {
        //
    }
}
