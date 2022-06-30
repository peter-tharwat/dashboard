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
            <div class="col-12 p-0" style="width: 550px;max-width: 100%;margin: 0px auto;">
                        <div class="col-12 p-0 mb-5" style="width: 550px;max-width: 100%;margin: 0px auto;">
                            <h3 class="mb-4">{{ __('lang.Verify Your Email Address') }}</h3>
                             <div class="divider"></div>
                        </div>
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>

                </div>
        </div>
    </div>
    <div class="col-12 col-md-6 p-0 d-none d-md-block" >
            <div style="height: 100vh;background-image: url('{{asset('/images/auth-backgroud.jpg')}}');object-fit: cover;    vertical-align: middle;background-size: cover;background-repeat: no-repeat;"></div>
    </div>
</div>
@endsection
