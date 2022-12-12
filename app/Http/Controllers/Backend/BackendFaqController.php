<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
class BackendFaqController extends Controller
{


    public function __construct()
    {
        $this->middleware('can:faqs-create', ['only' => ['create','store']]);
        $this->middleware('can:faqs-read',   ['only' => ['show', 'index']]);
        $this->middleware('can:faqs-update',   ['only' => ['edit','update']]);
        $this->middleware('can:faqs-delete',   ['only' => ['delete']]);
    }

    public function index(Request $request)
    {
        $faqs = Faq::where(function($q)use($request){
            if($request->id!=null)
                $q->where('id',$request->id);
            if($request->q!=null)
                $q->where('question','LIKE','%'.$request->q.'%')->orWhere('answer','LIKE','%'.$request->q.'%');
        })->orderBy('order','ASC')->orderBy('id','DESC')->paginate(100);
        return view('admin.faqs.index',compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Faq::create([
           'user_id'=>auth()->user()->id,
           'question'=>$request->question,
           'answer'=>$request->answer,
           'is_featured'=>$request->is_featured, 
        ]);
        toastr()->success(__('utils/toastr.process_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.faqs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        return view('admin.faqs.edit',compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faq $faq)
    {
        $faq->update([
           'question'=>$request->question,
           'answer'=>$request->answer,
           'is_featured'=>$request->is_featured, 
        ]);
        toastr()->success(__('utils/toastr.process_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.faqs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        if(!auth()->user()->can('faqs-delete'))abort(403);
        $faq->delete();
        toastr()->success(__('utils/toastr.process_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.faqs.index');
    }


    public function order(Request $request)
    {
        foreach($request->order as $key => $value){
            Faq::where('id',$value)->update(['order'=>$key]);
        }
    }

}
