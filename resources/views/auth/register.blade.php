@extends('layouts.app')
@section('content')

<style type="text/css">
    #navbar{
        display: none;
    }
    body{
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
                             <div class="divider"></div>
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
    <div class="col-12 col-md-6 p-0 d-none d-md-block" >
            <div style="height: 100vh;background-image: url('{{asset('/images/auth-backgroud.jpg')}}');object-fit: cover;    vertical-align: middle;background-size: cover;background-repeat: no-repeat;"></div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://www.google.com/recaptcha/api.js?render={{ env("RECAPTCHA_SITE_KEY") }}"></script>
<script>
grecaptcha.ready(function() {
  document.getElementById('register-form').addEventListener("submit", function(event) {
    event.preventDefault();
    grecaptcha.execute('{{ env("RECAPTCHA_SITE_KEY") }}', {action: 'register'}).then(function(token) {
       document.getElementById("recaptcha").value = token; 
       document.getElementById('register-form').submit();
    });
  }, false);
});
</script>
@endsection