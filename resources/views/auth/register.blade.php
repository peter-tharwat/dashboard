@extends('layouts.app')
@section('content')
<style type="text/css">
#navbar {
    display: none;
}


body {
    background: #fff !important;
}

</style>
<div class="container p-0">
    <div class="col-12 p-0 row d-flex">
        <div class="col-12 col-lg-6 text-center p-0" style="">
            <div class="col-12 p-2 p-lg-4 align-items-center justify-content-center d-flex row" style="min-height:70vh">
                <div class="col-12 p-3 p-lg-4" style="background:#fff;border-radius: 10px;">
                    <form method="POST" action="{{ route('register') }}" id="register-form" class="row m-0 d-flex">
                        @csrf
                        <input type="hidden" name="recaptcha" id="recaptcha">
                        <div class="col-12 p-0 mb-5 mt-3" style="width: 550px;max-width: 100%;margin: 0px auto;">
                            <h3 class="mb-4 font-4">{{ __('lang.register') }}</h3>
                        </div>

                        @if(env('GOOGLE_CLIENT_ID')!=null)
                        <div class="col-6 py-2 px-2">
                            <div class="col-12 p-0">
                                <a href="/login/google/redirect" style="border:2px solid #51c75b;color:inherit;box-shadow: 0px 6px 10px rgb(52 52 52 / 12%);" class="col-12 d-flex p-3 align-items-center justify-content-center btn">
                                 دخول عبر <img src="/images/icons/google.png" style="width:30px" class="mx-2" />
                                </a>
                            </div>
                        </div>
                        @endif
                        @if(env('FACEBOOK_CLIENT_ID')!=null)
                        <div class="col-6 py-2 px-2">
                            <div class="col-12 p-0">
                                <a href="/login/facebook/redirect" style="border:2px solid #3f71cd;color:inherit;box-shadow: 0px 6px 10px rgb(52 52 52 / 12%);background: #3f71cd;color:#fff" class="col-12 d-flex p-3 align-items-center justify-content-center btn">
                                 دخول عبر  <span class="fab fa-facebook-f mx-2" style="color:#fff"></span>
                                </a>
                            </div>
                        </div>
                        @endif

                         <div class="nafezly-divider-right" style="    background-image: linear-gradient( 90deg,transparent,rgb(0 0 0/72%));right: auto;left: 10px;opacity: .1;margin: 14px 0;min-height: 2px;"></div>
                        

                        <div class="form-group row mb-4 col-12 col-lg-6   px-0 pt-2 ">
                            <div class="col-md-12 px-2 pt-4" style="position: relative;">
                                <label for="name" class="col-form-label text-md-right mb-1 font-small px-2 py-1 d-inline" style="background:#f4f4f4;position: absolute;top: 17px;right: 20px; border-radius: 3px!important">الاسم</label>
                                <input id="name" type="text" class="form-control mt-2 d-inline-block @error('name') is-invalid @enderror" name="name" value="" required="" autocomplete="off" autofocus="" style=";height: 42px;border-color: #eaedf1;border-radius: 3px!important" value="{{ old('name') }}">
                            </div>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group row mb-4 col-12 col-lg-6   px-0 pt-2 ">
                            <div class="col-md-12 px-2 pt-4" style="position: relative;">
                                <label for="email" class="col-form-label text-md-right mb-1 font-small px-2 py-1 d-inline" style="background:#f4f4f4;position: absolute;top: 17px;right: 20px; border-radius: 3px!important">البريد الالكتروني</label>
                                <input id="email" type="email" class="form-control mt-2 d-inline-block @error('email') is-invalid @enderror" name="email" value="" required="" autocomplete="off" autofocus="" style=";height: 42px;border-color: #eaedf1;border-radius: 3px!important" value="{{ old('email') }}">
                            </div>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group row mb-4 col-12 col-lg-6   px-0 pt-2 ">
                            <div class="col-md-12 px-2 pt-4" style="position: relative;">
                                <label for="password" class="col-form-label text-md-right mb-1 font-small px-2 py-1 d-inline" style="background:#f4f4f4;position: absolute;top: 17px;right: 20px;border-radius: 3px!important">كلمة المرور</label>
                                <input id="password" type="password" class="form-control mt-2 d-inline-block @error('password') is-invalid @enderror" name="password" value="" required="" autocomplete="off" autofocus="" style=";height: 42px;border-color: #eaedf1;border-radius: 3px!important" minlength="6" aria-invalid="true">
                            </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group row mb-4 col-12 col-lg-6   px-0 pt-2 ">
                            <div class="col-md-12 px-2 pt-4" style="position: relative;">
                                <label for="password_confirmation" class="col-form-label text-md-right mb-1 font-small px-2 py-1 d-inline" style="background:#f4f4f4;position: absolute;top: 17px;right: 20px;border-radius: 3px!important">تأكيد كلمة المرور</label>
                                <input id="password_confirmation" type="password" class="form-control mt-2 d-inline-block @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="" required="" autocomplete="off" autofocus="" style=";height: 42px;border-color: #eaedf1;border-radius: 3px!important" minlength="6" aria-invalid="true">
                            </div>
                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-12 p-0 row d-flex align-items-center justify-content-start">
                            <div class="col-12  p-2 ">
                                <div class="form-group row mb-0 ">
                                    <div class="col-12 p-0 d-flex ">
                                        <button type="submit" class="btn btn-success font-1">
                                            تسجيل الآن
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12 px-4 py-2">
                            <div class="col-12 px-0 mb-2">
                                مساعدة
                            </div>
                            <ul style="list-style:none;" class="p-0 m-0">
                                @if (Route::has('login'))
                                <li class=" d-block"><a href="{{route('login')}}" class="naskh py-2 d-block" style="text-decoration: none!important;"><span class="fas fa-circle font-small"></span> لديك حساب بالفعل</a></li>
                                @endif
                                @if (Route::has('password.request'))
                                <li class="d-block"><a href="{{ route('password.request') }}" class="naskh py-2 d-block" style="text-decoration: none!important;"><span class="fas fa-circle font-small"></span> نسيت كلمة المرور</a></li>
                                @endif
                            </ul>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 d-none d-lg-flex text-center p-0 d-flex align-items-center justify-content-center row position-relative" style="">
            <div class="overlap-grid overlap-grid-2">
                <div class="item mx-auto">
                    <div class="shape bg-dot primary rellax w-16 h-20" data-rellax-speed="1" style="top: 3rem; left: 5.5rem"></div>
                    <div class="col-12 p-0 align-items-center py-5 justify-content-center d-flex svg-animation" style="background-image: url('{{$settings['get_website_logo']}}');background-size: cover;padding-top: 57%;background-position: center;height: 400px;z-index: 1;position: relative;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <style type="text/css">
#navbar {
    display: none;
}

body {
    background: #fff;
}

</style>
<div class="col-12 p-0 row">
    <div class="col-12 col-md-6 text-center p-0" style="">
        <div class="col-12 p-4 align-items-center justify-content-center d-flex row" style="height:100vh">
            <div class="col-12 p-0">
                <form method="POST" action="{{ route('register') }}" id="register-form">
                    @csrf
                    <input type="hidden" name="recaptcha" id="recaptcha">
                    <div class="col-12 p-0 mb-5" style="width: 550px;max-width: 100%;margin: 0px auto;">
                        <h3 class="mb-4">{{ __('lang.register') }}</h3>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('lang.name') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('lang.email') }}</label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('lang.password') }}</label>
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('lang.confirm_password') }}</label>
                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                    <div class="form-group row mb-4 mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('lang.register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 p-0 d-none d-md-block">
        <div style="height: 100vh;background-image: url('{{asset('/images/auth-backgroud.jpg')}}');object-fit: cover;    vertical-align: middle;background-size: cover;background-repeat: no-repeat;"></div>
    </div>
</div> --}}
@endsection
@section('scripts')
<script src="https://www.google.com/recaptcha/api.js?render={{ env("RECAPTCHA_SITE_KEY") }}"></script>
<script>
grecaptcha.ready(function() {
    document.getElementById('register-form').addEventListener("submit", function(event) {
        event.preventDefault();
        grecaptcha.execute('{{ env("RECAPTCHA_SITE_KEY") }}', { action: 'register' }).then(function(token) {
            document.getElementById("recaptcha").value = token;
            document.getElementById('register-form').submit();
        });
    }, false);
});

</script>
@endsection
