@extends('layouts.app')
@section('content')

<style type="text/css">
    #navbar{
        display: none;
    }
    .form-control{
        box-shadow: none!important;
        font-size: 14px;
    }
    .form-control:focus{
        border: 1px solid #0194fe!important;
        background: rgb(1 148 254 / 4%)!important;
    }
    .form-control.is-invalid, .was-validated .form-control:invalid {
        border-color: #dc3545!important;
        background-color: rgb(255 184 184 / 41%)!important;
        padding-left: calc(1.5em + 0.75rem);
        background-image: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e)!important;
        background-repeat: no-repeat;
        background-position: left calc(0.375em + 0.1875rem) center;
        background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
    }
</style>
<div class="container p-0">
    <div class="col-12 p-0 row d-flex">
        <div class="col-12 col-lg-6 text-center p-0" style="">
            <div class="col-12 p-4 align-items-center justify-content-center d-flex row" style="min-height:70vh">
                

                <div class="col-12 p-3 p-lg-4" style="background:#fff;border-radius: 10px;">
                    
                        <div class="col-12 p-0 mb-5 mt-3" style="width: 550px;max-width: 100%;margin: 0px auto;">
                            <h3 class="mb-4 font-4">{{ __('lang.Verify Your Email Address') }}</h3>
                             
                        </div>
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif

                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }}
                        <br>
                        {{auth()->user()->email}}
                        <br>
                        <form class="d-block mt-3" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-success py-2 px-3 m-0 align-baseline">{{ __('click here to request another') }}</button>
                        </form>
                </div>


            </div>
        </div>
        <div class="col-12 col-lg-6 d-none d-lg-flex text-center p-0 d-flex align-items-center justify-content-center row position-relative" style="">
            <div class="overlap-grid overlap-grid-2">
                <div class="item mx-auto">
                    <div class="shape bg-dot primary rellax w-16 h-20" data-rellax-speed="1" style="top: 3rem; left: 5.5rem"></div>
                    <div class="col-12 p-0 align-items-center py-5 justify-content-center d-flex " style="background-image: url('/images/character.webp');background-size: cover;padding-top: 57%;background-position: center;height: 342px;z-index: 1;position: relative;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
