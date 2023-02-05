<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\Models\User;
use Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }




    public function login(Request $request)
    {

        if(str_contains($request->email, "@gmail.com") || str_contains($request->email, "@googlemail.com")){
            $email=str_replace(['.','+'],'',$request->email);
            $email=str_replace(['@gmailcom','@googlemailcom'],['@gmail.com','@gmail.com'],$email);
            $request->merge([
                'email'=>$email
            ]);
        }

        $this->validateLogin($request);

        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }

            return $this->sendLoginResponse($request);
        }
        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
    }



    public function redirect_facebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function redirect_google()
    {
        return Socialite::driver('google')->redirect();
    } 

    public function callback_facebook()
    {
        $user = Socialite::driver('facebook')->stateless()->user();

        $user_mail="";
        if($user->email==null)$user_mail=$user->id.'@facebook.com';
        else $user_mail=$user->email;

        if(str_contains($user_mail, "@gmail.com") || str_contains($user_mail, "@googlemail.com")){
            $user_mail=str_replace(['.','+'],'',$user_mail);
            $user_mail=str_replace(['@gmailcom','@googlemailcom'],['@gmail.com','@gmail.com'],$user_mail);
        }
            
        if($user_mail==null)abort(404);
        $is_registered=User::where('email',$user_mail)->first();

        if(null!==$is_registered){
            auth()->loginUsingId($is_registered['id'], true);
            return redirect('/dashboard');
        }
        else
        {
            $created_user= User::create([
                'name' => ucwords(strtolower($user->name)),
                'email' =>$user_mail,
                'email_verified_at'=>date('Y-m-d H:i:s'),
                'password' => Hash::make(Str::random(30)),
            ]);
            $created_user->assignRole("user");
            if($user->avatar_original!=null){
                $avatar = $created_user->addMediaFromUrl($user->avatar_original)->toMediaCollection('avatar');
                $created_user->update(['avatar'=>$avatar->id .'/'.$avatar->file_name]);
            }
            auth()->loginUsingId($created_user->id, true);
            return redirect('/dashboard')->with([
                'message'=>"تم انشاء الحساب الخاص بك بنجاح",
                "alert-type"=>"success"
            ]);
        }
    }
    public function callback_google(){
        
        $user = Socialite::driver('google')->stateless()->user();
        if(str_contains($user->user['email'], "@gmail.com") || str_contains($user->user['email'], "@googlemail.com")){
            $user->user['email']=str_replace(['.','+'],'',$user->user['email']);
            $user->user['email']=str_replace(['@gmailcom','@googlemailcom'],['@gmail.com','@gmail.com'],$user->user['email']);
        }
            
        if($user->user['email']==null)abort(404);
        $is_registered=User::where('email',$user->user['email'])->first();

        if(null!==$is_registered){
            auth()->loginUsingId($is_registered['id'], true);
            return redirect('/dashboard');
        }
        else
        {
            $created_user= User::create([
                'name' => ucwords(strtolower($user->user['name'])),
                'email' =>$user->user['email'],
                'email_verified_at'=>date('Y-m-d H:i:s'),
                'password' => Hash::make(Str::random(30)),
            ]);
            $created_user->assignRole("user");
            if($user->user['picture']!=null){
                $avatar = $created_user->addMediaFromUrl(strtok($user->user['picture'],'='))->toMediaCollection('avatar');
                $created_user->update(['avatar'=>$avatar->id .'/'.$avatar->file_name]);
            }
            auth()->loginUsingId($created_user->id, true);
            return redirect('/dashboard')->with([
                'message'=>"تم انشاء الحساب الخاص بك بنجاح",
                "alert-type"=>"success"
            ]);
        }




    }


}
