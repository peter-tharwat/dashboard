@extends('front.app',['page_title'=>'تسجيل الدخول'])

@section('content')
<div class="login-wrap">
	<div class="login-html" style="text-align: right">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">تسجيل الدخول</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">إنشاء حساب</label>
		<div class="login-form">
           <form method="POST" action="{{ route('login') }}">
            @csrf
			<div class="sign-in-htm">
				<div class="group">
					<label for="user" class="label">البريد الإلكتروني</label>
					<input id="email" type="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
				</div>
				<div class="group">
					<label for="pass" class="label">كلمة المرور</label>
					<input id="password" type="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
				</div>
				<div class="group">
					<input id="check" type="checkbox" class="check" checked>
					<label for="check"><span class="icon"></span> تذكرني عند الدخول مرة أخرى</label>
				</div>
				<div class="group">
					<input type="submit" class="button" value="دخول">
                </div>
               </form>
               <div class="alter-login container" style="color: white"> 
                   <h1 style="text-align: center;font-size:16px;margin-bottom:15px">الدخول بواسطة</h1>
                   <div class="row" style="text-align: center;font-size:14px">
                       <div class="col-md-6 col-sm-12"><a class="facebook" href="{{url('/login/facebook')}}">الدخول عبر فيسبوك<i class="fab fa-facebook-f"></i></a></div>
                       <div class="col-md-6 col-sm-12"><a class="google" href="{{url('/login/google')}}">الدخول عبر جوجل<i class="fab fa-google"></i></a></div>
                   </div>
                  
               </div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="{{ route('password.request') }}">نسيت كلمة السر ؟</a>
				</div>
			</div>
			<div class="sign-up-htm">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
				<div class="group">
					<label for="user" class="label">اسم المستخدم</label>
					<input id="name" type="text" class="input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="group">
					<label for="pass" class="label">البريد الإلكتروني</label>
                    <input id="email" type="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="group">
					<label for="pass" class="label">كلمة المرور</label>
                    <input id="password" type="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
				</div>
				<div class="group">
					<label for="pass" class="label">تأكيد كلمة المرور</label>
					<input id="password-confirm" type="password" class="input" name="password_confirmation" required autocomplete="new-password">
				</div>
				
				<div class="group">
					<input type="submit" class="button" value="إنشاء حساب">
                </div>
            </form>
				<div class="hr"></div>
				<div class="foot-lnk">
					<label for="tab-1">لديك حساب ؟</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!--div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div-->
@endsection
