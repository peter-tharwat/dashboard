<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{


    public function __construct()
    {
        $this->middleware('permission:users-create', ['only' => ['create','store']]);
        $this->middleware('permission:users-read',   ['only' => ['show', 'index']]);
        $this->middleware('permission:users-update',   ['only' => ['edit','update']]);
        $this->middleware('permission:users-delete',   ['only' => ['delete']]);
    }

    public function index(Request $request)
    {
        
        $users =  User::where(function($q)use($request){
            if($request->id!=null)
                $q->where('id',$request->id);
            if($request->q!=null)
                $q->where('name','LIKE','%'.$request->q.'%')->orWhere('phone','LIKE','%'.$request->q.'%')->orWhere('email','LIKE','%'.$request->q.'%');
        })->orderBy('id','DESC')->paginate();

        return view('admin.users.index',compact('users'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = \App\Models\Role::get();
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
        if(auth()->user()->isAbleTo('user-roles-update')){
            $request->validate([
                'roles'=>"required|array",
                'roles.*'=>"required|exists:roles,id",
            ]);
            $user->syncRoles($request->roles);
            $user->syncPermissions(DB::table('permission_role')->whereIn('role_id',$request->roles)->pluck('permission_id'));
        }

        if($request->hasFile('avatar')){
            $file = $this->store_file([
                'source'=>$request->avatar,
                'validation'=>"image",
                'path_to_save'=>'/uploads/users/',
                'type'=>'USER', 
                'user_id'=>\Auth::user()->id,
                'resize'=>[500,1000],
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER'),
                /*'watermark'=>true,*/
                'optimize'=>true
            ]); 
            $user->update(['avatar'=>$file['filename']]);
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
        $roles = \App\Models\Role::get();
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
        if(auth()->user()->isAbleTo('user-roles-update')){
            $request->validate([
                'roles'=>"required|array",
                'roles.*'=>"required|exists:roles,id",
            ]);
            $user->syncRoles($request->roles);
            $user->syncPermissions(DB::table('permission_role')->whereIn('role_id',$request->roles)->pluck('permission_id'));
        }

        if($request->password!=null){
            $user->update([
                "password"=>\Hash::make($request->password)
            ]);
        }
        if($request->hasFile('avatar')){
            $file = $this->store_file([
                'source'=>$request->avatar,
                'validation'=>"image",
                'path_to_save'=>'/uploads/users/',
                'type'=>'USER', 
                'user_id'=>\Auth::user()->id,
                'resize'=>[500,1000],
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER'),
                /*'watermark'=>true,*/
                'optimize'=>true
            ]); 
            $user->update(['avatar'=>$file['filename']]);
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
        if(!auth()->user()->isAbleTo('users-delete'))abort(403);
        $user->delete();
        toastr()->success('تم حذف المستخدم بنجاح','عملية ناجحة');
        return redirect()->route('admin.users.index');
    }
}
