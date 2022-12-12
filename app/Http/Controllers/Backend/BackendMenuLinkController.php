<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\MenuLink;
use Illuminate\Http\Request;

class BackendMenuLinkController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:menu-links-create', ['only' => ['create','store']]);
        $this->middleware('can:menu-links-read',   ['only' => ['show', 'index']]);
        $this->middleware('can:menu-links-update',   ['only' => ['edit','update']]);
        $this->middleware('can:menu-links-delete',   ['only' => ['delete']]);
    }

    public function index(Request $request)
    {
        if(!auth()->user()->can('menu-links-read'))abort(403);
        $menuLinks =  MenuLink::where(function($q)use($request){
            if($request->menu_id!=null)
                $q->where('menu_id',$request->menu_id);
            if($request->id!=null)
                $q->where('id',$request->id);
            if($request->q!=null)
                $q->where('type','LIKE','%'.$request->q.'%')->orWhere('url','icon','%'.$request->q.'%');
        })->orderBy('order','ASC')->orderBy('id','DESC')->paginate(100);
        return view('admin.menu-links.index',compact('menuLinks'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if(!auth()->user()->can('menu-links-create'))abort(403);
        $request->validate(['menu_id'=>"required|exists:menus,id"]);
        return view('admin.menu-links.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!auth()->user()->can('menu-links-create'))abort(403);
        $request->validate([
            'menu_id'=>"required|exists:menus,id",
            'title'=>"required",
            //'menu_link_id'=>"nullable|exists:menu_links,id",
            'type'=>"required|in:CUSTOM_LINK,PAGE,CATEGORY",
            'type_id'=>"nullable|integer",
            'url'=>"required_if:type,CUSTOM_LINK",
            'icon'=>"nullable",
        ]);
        $link = MenuLink::create([
            'menu_id'=>$request->menu_id,
            //'menu_link_id'=>$request->menu_link_id,
            'title'=>$request->title,
            'type'=>$request->type,
            'type_id'=>$request->type_id,
            'icon'=>$request->icon,
            'url'=>$request->url
        ]);
        $link->update([
            'url'=>\MainHelper::menuLinkGenerator($link)
        ]);

        toastr()->success('تمت العملية بنجاح');
        return redirect()->route('admin.menu-links.index',['menu_id'=>$request->menu_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MenuLink  $menuLink
     * @return \Illuminate\Http\Response
     */
    public function show(MenuLink $menuLink)
    {
        if(!auth()->user()->can('menu-links-read'))abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MenuLink  $menuLink
     * @return \Illuminate\Http\Response
     */
    public function edit(MenuLink $menuLink)
    {
        if(!auth()->user()->can('menu-links-update'))abort(403);
        return view('admin.menu-links.edit',compact('menuLink'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MenuLink  $menuLink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MenuLink $menuLink)
    {
        if(!auth()->user()->can('menu-links-update'))abort(403);
        $request->validate([
            'menu_id'=>"required|exists:menus,id",
            'title'=>"required",
            //'menu_link_id'=>"nullable|exists:menu_links,id",
            'type'=>"required|in:CUSTOM_LINK,PAGE,CATEGORY",
            'type_id'=>"nullable|integer",
            'url'=>"required_if:type,CUSTOM_LINK",
            'icon'=>"nullable",
        ]);
        $menuLink->update([
            'menu_id'=>$request->menu_id,
            'title'=>$request->title,
            //'menu_link_id'=>$request->menu_link_id,
            'type'=>$request->type,
            'type_id'=>$request->type_id,
            'icon'=>$request->icon,
            'url'=>$request->url
        ]);
        $menuLink->update([
            'url'=>\MainHelper::menuLinkGenerator($menuLink)
        ]);
        toastr()->success('تمت العملية بنجاح');
        return redirect()->route('admin.menu-links.index',['menu_id'=>$request->menu_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MenuLink  $menuLink
     * @return \Illuminate\Http\Response
     */
    public function destroy(MenuLink $menuLink)
    {  
        if(!auth()->user()->can('menu-links-delete'))abort(403);
        $menu_id=$menuLink->menu_id;
        $menuLink->delete();
        toastr()->success('تمت العملية بنجاح');
        return redirect()->route('admin.menu-links.index',['menu_id'=>$menu_id]);
    }


    public function order(Request $request)
    {
        if(!auth()->user()->can('menu-links-update'))abort(403);
        //return dd($request->order);
        foreach($request->order as $key => $value){
            MenuLink::where('id',$value)->update(['order'=>$key]);
        }
    }
    public function getType(Request $request)
    {
        if(!auth()->user()->can('menu-links-read'))abort(403);
        //dd($request->all());
        if($request->type=="PAGE")
            return \App\Models\Page::where(function($q)use($request){
                if($request->id!=null)
                    $q->where('id',$request->id);
            })->orderBy('id','DESC')->get();
        if($request->type=="CATEGORY")
            return \App\Models\Category::where(function($q)use($request){
                if($request->id!=null)
                    $q->where('id',$request->id);
            })->orderBy('id','DESC')->get();
    }
}
