@extends('layouts.admin')
@section('content')
<div class="col-12 py-5 rounded-2" style="text-align: center;background: var(--background-1);margin-top: -5px;">
    <div class="col-12" style="display:flex;justify-content: center;">
        <img src="{{$user->getUserAvatar()}}" style="width:130px;height: 130px;border-radius: 50%;">
    </div>
    <div class="col-12 p-2 text-center" style="overflow:auto;">
        {{$user->id}} <br>
        {{$user->name}} <br>
        {{$user->email}}<br>
        {{$user->phone}}<br>
    </div>
</div>
<div class="col-12 py-0 px-3 row">
    <div class="col-12  pt-2" style="min-height: 80vh">
     
        <div class="col-12 col-lg-9 px-3 py-5 d-flex mx-auto justify-content-center align-items-center">
            <div class="col-12 p-0 row justify-content-center">
                <div class="col-12 row p-0">
                    <div class="col-12 col-sm-6 col-lg-4 col-xl-3  px-2 mb-3">
                        <a href="{{route('admin.articles.index',['user_id'=>$user->id])}}" style="color:inherit;">
                            <div class="col-12 px-0 py-2 d-flex rounded-3 card-wedit" style="background: #ffffff;">
                                <div style="width: 80px;" class="p-2">
                                    <div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background-image: linear-gradient(rgba(0,0,0,.04),rgba(0,0,0,.04))!important;height: 64px;border-radius: 50%;">
                                        <span class="fal fa-book font-5"></span>
                                    </div>
                                </div>
                                <div style="width: calc(100% - 80px)" class="px-2 py-2">
                                    <h6 class="font-1">{{ __('lang.articles') }}</h6>
                                    <h6 class="font-3">{{$user->articles->count()}}</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-4 col-xl-3  px-2 mb-3">
                        <a href="{{route('admin.traffics.index',['user_id'=>$user->id])}}" style="color:inherit;">
                            <div class="col-12 px-0 py-2 d-flex rounded-3 card-wedit" style="background: #ffffff;">
                                <div style="width: 80px;" class="p-2">
                                    <div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background-image: linear-gradient(rgba(0,0,0,.04),rgba(0,0,0,.04))!important;height: 64px;border-radius: 50%;">
                                        <span class="fal fa-traffic-light font-5"></span>
                                    </div>
                                </div>
                                <div style="width: calc(100% - 80px)" class="px-2 py-2">
                                    <h6 class="font-1">{{ __('lang.traffic') }}</h6>
                                    <h6 class="font-3">{{$user->traffics->count()}}</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-4 col-xl-3  px-2 mb-3">
                        <a href="{{route('admin.traffics.error-reports',['user_id'=>$user->id])}}" style="color:inherit;">
                            <div class="col-12 px-0 py-2 d-flex rounded-3 card-wedit" style="background: #ffffff;">
                                <div style="width: 80px;" class="p-2">
                                    <div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background-image: linear-gradient(rgba(0,0,0,.04),rgba(0,0,0,.04))!important;height: 64px;border-radius: 50%;">
                                        <span class="fal fa-bug font-5"></span>
                                    </div>
                                </div>
                                <div style="width: calc(100% - 80px)" class="px-2 py-2">
                                    <h6 class="font-1">{{ __('lang.bug_reports') }}</h6>
                                    <h6 class="font-3">{{$user->report_errors->count()}}</h6>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-4 col-xl-3  px-2 mb-3">
                        <a href="{{route('admin.contacts.index',['user_id'=>$user->id])}}" style="color:inherit;">
                            <div class="col-12 px-0 py-2 d-flex rounded-3 card-wedit" style="background: #ffffff;">
                                <div style="width: 80px;" class="p-2">
                                    <div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background-image: linear-gradient(rgba(0,0,0,.04),rgba(0,0,0,.04))!important;height: 64px;border-radius: 50%;">
                                        <span class="fal fa-phone font-5"></span>
                                    </div>
                                </div>
                                <div style="width: calc(100% - 80px)" class="px-2 py-2">
                                    <h6 class="font-1">{{ __('lang.contact_requests') }}</h6>
                                    <h6 class="font-3">{{$user->contacts->count()}}</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@endsection
