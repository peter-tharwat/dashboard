<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class BackendUserController extends Controller
{


    public function __construct()
    {
        $this->middleware('can:users-create', ['only' => ['create','store']]);
        $this->middleware('can:users-read',   ['only' => ['show', 'index']]);
        $this->middleware('can:users-update',   ['only' => ['edit','update']]);
        $this->middleware('can:users-delete',   ['only' => ['delete']]);
    }

    public function index(Request $request)
    {
        
        $users =  User::where(function($q)use($request){
            if($request->id!=null)
                $q->where('id',$request->id);
            if($request->q!=null)
                $q->where('name','LIKE','%'.$request->q.'%')->orWhere('phone','LIKE','%'.$request->q.'%')->orWhere('email','LIKE','%'.$request->q.'%');
        })->withCount(['logs','articles','contacts','comments'])->with(['roles'])->orderBy('last_activity','DESC')->orderBy('id','DESC')->paginate();

        return view('admin.users.index',compact('users'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>"nullable|max:190",
            'phone'=>"nullable|max:190",
            'bio'=>"nullable|max:5000",
            'blocked'=>"required|in:0,1",
            'email'=>"required|unique:users,email",
            'password'=>"required|min:8|max:190"
        ]);
        $user = User::create([
            "name"=>$request->name,
            "phone"=>$request->phone,
            "bio"=>$request->bio,
            "blocked"=>$request->blocked,
            "email"=>$request->email,
            "password"=>\Hash::make($request->password),
        ]);
        if(auth()->user()->can('user-roles-update')){
            $request->validate([
                'roles'=>"required|array",
                'roles.*'=>"required|exists:roles,id",
            ]);
            $user->syncRoles($request->roles);
        }

        if($request->hasFile('avatar')){
            $avatar = $user->addMedia($request->avatar)->toMediaCollection('avatar');
            $user->update(['avatar'=>$avatar->id.'/'.$avatar->file_name]);
        }

        toastr()->success('تم إضافة المستخدم بنجاح','عملية ناجحة');
        return redirect()->route('admin.users.index');
            
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::get();
        return view('admin.users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'=>"nullable|max:190",
            'phone'=>"nullable|max:190",
            'bio'=>"nullable|max:5000",
            'blocked'=>"required|in:0,1",
            'email'=>"required|unique:users,email,".$user->id,
            'password'=>"nullable|min:8|max:190"
        ]);
        $user->update([
            "name"=>$request->name,
            "phone"=>$request->phone,
            "bio"=>$request->bio,
            "blocked"=>$request->blocked,
            "email"=>$request->email,
            
        ]);
        if(auth()->user()->can('user-roles-update')){
            $request->validate([
                'roles'=>"required|array",
                'roles.*'=>"required|exists:roles,id",
            ]);
            $user->syncRoles($request->roles);
        }

        if($request->password!=null){
            $user->update([
                "password"=>\Hash::make($request->password)
            ]);
        }
        if($request->hasFile('avatar')){
            $avatar = $user->addMedia($request->avatar)->toMediaCollection('avatar');
            $user->update(['avatar'=>$avatar->id.'/'.$avatar->file_name]);
        }

        toastr()->success('تم تحديث المستخدم بنجاح','عملية ناجحة');
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(!auth()->user()->can('users-delete'))abort(403);
        $user->delete();
        toastr()->success('تم حذف المستخدم بنجاح','عملية ناجحة');
        return redirect()->route('admin.users.index');
    }

    public function access(Request $request,User $user){
        if(auth()->user()->hasRole('superadmin')){
            auth()->logout();
            auth()->loginUsingId($user->id);
            return redirect('/');
        }
    }
}
