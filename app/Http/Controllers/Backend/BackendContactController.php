<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class BackendContactController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:contacts-create', ['only' => ['create','store']]);
        $this->middleware('can:contacts-read',   ['only' => ['show', 'index']]);
        $this->middleware('can:contacts-update',   ['only' => ['edit','update']]);
        $this->middleware('can:contacts-delete',   ['only' => ['delete']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!auth()->user()->can('contacts-read'))abort(403);
        $contacts =  Contact::where(function($q)use($request){
            if($request->id!=null)
                $q->where('id',$request->id);
            if($request->user_id!=null)
                $q->where('user_id',$request->user_id);
            if($request->q!=null)
                $q->where('name','LIKE','%'.$request->q.'%')->orWhere('phone','LIKE','%'.$request->q.'%')->orWhere('email','LIKE','%'.$request->q.'%')->orWhere('message','LIKE','%'.$request->q.'%');
        })->orderBy('id','DESC')->paginate();

        return view('admin.contacts.index',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->can('contacts-create'))abort(403);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        if(!auth()->user()->can('contacts-read'))abort(403);
        return view('admin.contacts.show',compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        if(!auth()->user()->can('contacts-update'))abort(403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        if(!auth()->user()->can('contacts-update'))abort(403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        if(!auth()->user()->can('contacts-delete'))abort(403);
        $contact->delete();
        toastr()->success(__('utils/toastr.contact_destroy_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.contacts.index');
    }

    public function resolve(Request $request){
        if(!auth()->user()->can('contacts-update'))abort(403);
        $contact = \App\Models\Contact::where('id',$request->id)->firstOrFail();
        $contact->update(['status'=>$contact->status=="PENDING"?"DONE":"PENDING"]);
        return ['status'=>$contact->status=="DONE"?"DONE":"PENDING" ];
    }
}
