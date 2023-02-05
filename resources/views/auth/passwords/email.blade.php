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
<div class="col-12 p-0 row">
    <div class="col-12 col-xxl-4 col-lg-6  mx-auto text-center p-0" style="">
        <div class="col-12 p-4 align-items-center justify-content-center d-flex row" style="height:100vh">
            <div class="col-12 p-3 p-lg-4" style="background:#fff;border-radius: 10px;">
                
                    @if (session('status'))
                        <div class="alert alert-success mb-3" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                       
                        <div class="col-12 p-0 mb-5 mt-3" style="width: 550px;max-width: 100%;margin: 0px auto;">
                            <h3 class="mb-4 text-center font-4">{{ __('Reset Password') }}</h3>
                             
                        </div>

                        <div class="form-group row mb-4 col-12   px-0 pt-2 ">
                            <div class="col-md-12 px-2 pt-4" style="position: relative;">
                                <label for="email" class="col-form-label text-md-right mb-1 font-small px-2 py-1 d-inline" style="background:#f4f4f4;position: absolute;top: 17px;right: 20px; border-radius: 3px!important">{{ __('Email') }}</label>
                                <input id="email" type="email" class="form-control mt-2 d-inline-block @error('email') is-invalid @enderror" name="email" value="" required="" autocomplete="off" autofocus="" style=";height: 42px;border-color: #eaedf1;border-radius: 3px!important" value="{{ old('email') }}">
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
 
                        <div class="col-12 p-0 row d-flex align-items-center">
                          
                            <div class="col-12 col-lg-6 p-2 ">
                                <div class="form-group row mb-0 ">
                                    <div class="col-12 p-0 d-flex">
                                        <button type="submit" class="btn btn-success font-1">
                                            {{ __('Send Password Reset Link') }}
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    

                    </form>
                </div>
        </div>
    </div>
</div>
@endsection
