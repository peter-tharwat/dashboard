<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{


    protected function resourceAbilityMap()
    {
        return [
            'index'=>'viewAny',
            'create'=>'store',
            'store'=>'store',
            'show' => 'view',
            'create' => 'create',
            'store' => 'create',
            'edit' => 'update',
            'update' => 'update',
            'destroy' => 'delete',
            /*'customMethod'=>'customMethod',*/
        ];
    }
    protected function resourceMethodsWithoutModels()
    {
        return ['index', 'create', 'store' /*, 'customMethod'*/];
    }


    public function __construct()
    {
        $this->middleware(['CheckRole:ADMIN']);
        $this->authorizeResource(User::class, 'user'); 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        return view('admin.users.create');
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
            'power'=>"required|in:ADMIN,EDITOR,CONTRIBUTOR",
            'bio'=>"nullable|max:5000",
            'blocked'=>"required|in:0,1",
            'email'=>"required|unique:users,email",
            'password'=>"required|min:8|max:190"
        ]);
        $user = User::create([
            "name"=>$request->name,
            "phone"=>$request->phone,
            "power"=>$request->power,
            "bio"=>$request->bio,
            "blocked"=>$request->blocked,
            "email"=>$request->email,
            "password"=>\Hash::make($request->password),
        ]);

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
                'compress'=>'auto'
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
        return view('admin.users.edit',compact('user'));
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
            'power'=>"required|in:ADMIN,EDITOR,CONTRIBUTOR",
            'bio'=>"nullable|max:5000",
            'blocked'=>"required|in:0,1",
            'email'=>"required|unique:users,email,".$user->id,
            'password'=>"nullable|min:8|max:190"
        ]);
        $user->update([
            "name"=>$request->name,
            "phone"=>$request->phone,
            "power"=>$request->power,
            "bio"=>$request->bio,
            "blocked"=>$request->blocked,
            "email"=>$request->email,
            
        ]);
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
                'compress'=>'auto'
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
        $user->delete();
        toastr()->success('تم حذف المستخدم بنجاح','عملية ناجحة');
        return redirect()->route('admin.users.index');
    }
}
