@extends('layouts.app')
@section('content')
<div class="col-12" style="min-height:100vh;background:#f4f4f4">
    <div class="col-12 p-0" style="background:#fff">
        <div class="container">
            <div class="col-12 p-0 d-flex align-items-center justify-content-center" style="min-height:40vh;">
                <div style="width: 700px;" class="mx-auto py-8 d-flex align-items-center justify-content-center">
                    <div class="text-center col-12 p-0 mx-auto">
                        <div class="col-12 px-0 row d-flex justify-content-between ">
                            <div class="col-12 py-5 rounded-2 text-center" style="text-align: center;background: var(--background-1);margin-top: -5px;">
                                <div class="col-12" style="display:flex;justify-content: center;">
                                    <img src="{{auth()->user()->getUserAvatar()}}" style="width:130px;height: 130px;border-radius: 50%;">
                                </div>
                                <div class="col-12 p-2 text-center" style="overflow:auto;">
                                   {{auth()->user()->name}} @if(auth()->user()->is_online() && 0)<div class="spinner-grow text-success " role="status" style="width:15px;height: 15px;margin: 0px 5px"></div>@endif 

                                   <br>
                                    <span class="font-1">{{auth()->user()->bio}}</span>
                                  
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-12 p-0 border-lg-top">
            <div class="container p-0">
                <div class="col-12 row user-menu ">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="container-fluid p-0">
                            <div class="col-12 px-0 row d-flex m-0 py-3 py-lg-0 justify-content-between align-items-center d-flex d-lg-none">
                                
                            
                            <div class="navbar-brand navbar-toggler  font-2 px-3 col-auto" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="color: inherit;">لوحة التحكم</div>
                            <button class="navbar-toggler d-flex col-auto" style="box-shadow:none;" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="fal fa-bars"></span>
                            </button>
                            </div>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <div class="navbar-nav ms-auto mb-0 mb-lg-0">
                                    <a href="{{route('user.dashboard')}}" class="user-menu d-flex align-items-center col-auto justify-content-lg-center justify-content-start py-3 px-2" style="min-width:120px;border-bottom:6px solid transparent;height: 100%;color: inherit;transition: 0s all ease;">
                                        <span class="fal fa-home mx-2"></span> الرئيسية
                                    </a>
                                  
                                    <a href="{{route('user.support')}}" class="user-menu d-flex align-items-center col-auto justify-content-lg-center justify-content-start py-3 px-2" style="min-width:120px;border-bottom:6px solid transparent;height: 100%;color: inherit;transition: 0s all ease;">
                                        <span class="fal fa-comments-alt mx-2"></span> الدعم
                                    </a>
                                    <a href="{{route('user.notifications')}}" class="user-menu d-flex align-items-center col-auto justify-content-lg-center justify-content-start py-3 px-2" style="min-width:120px;border-bottom:6px solid transparent;height: 100%;color: inherit;transition: 0s all ease;">
                                        <span class="fal fa-bells mx-2"></span> التنبيهات
                                    </a>
                                    <a href="{{route('user.profile.edit')}}" class="user-menu d-flex align-items-center col-auto justify-content-lg-center justify-content-start py-3 px-2" style="min-width:120px;border-bottom:6px solid transparent;height: 100%;color: inherit;transition: 0s all ease;">
                                        <span class="fal fa-wrench mx-2"></span> الاعدادات
                                    </a>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>


     {{--    <div class="col-12 p-0 border-lg-top">
            <div class="container p-0">
                <div class="col-12 row user-menu">
                    <div class="col-12 row d-flex px-1" style="width: 600px;margin: 0px auto;">
                        <div class="user-menu d-flex align-items-center justify-content-center row text-center p-0" style="font-size:13px">
                            <div class="col p-0 text-center">
                                <a href="{{route('home')}}" style="color:inherit;padding: 5px 1px 10px;margin: 0px 2px;position: relative;" class="mobile-menu-link d-block font-1 font-lg-2 ">
                                    <div class="p-0 text-center"><span class="fal fa-home  p-0 font-1 font-lg-2"></span></div>
                                    <div class="p-0 text-center">الرئيسية
                                    </div>
                                </a>
                            </div>
                            <div class="col p-0 text-center">
                                <a href="{{route('user.profile.edit')}}" style="color:inherit;padding: 5px 1px 10px;margin: 0px 2px;" class="mobile-menu-link d-block font-1 font-lg-2">
                                    <div class="p-0 text-center"><span class="fal fa-wrench  p-0 font-1 font-lg-2"></span></div>
                                    <div class="p-0 text-center">الإعدادات</div>
                                </a>
                            </div>
                            <div class="col p-0 text-center">
                                <a href="{{route('user.support')}}" style="color:inherit;padding: 5px 1px 10px;margin: 0px 2px;" class="mobile-menu-link d-block font-1 font-lg-2">
                                    <div class="p-0 text-center"><span class="fal fa-comments-alt  p-0 font-1 font-lg-2"></span></div>
                                    <div class="p-0 text-center">الدعم</div>
                                </a>
                            </div>
                            <div class="col p-0 text-center">
                                <a href="{{route('user.notifications')}}" style="color:inherit;padding: 5px 1px 10px;margin: 0px 2px;position: relative;" class="mobile-menu-link d-block font-1 font-lg-2 ">
                                    <div class="p-0 text-center"><span class="fal fa-bells  p-0 font-1 font-lg-2"></span></div>
                                    <div class="p-0 text-center">الاشعارات
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    <div class="col-12">
        <div class="container py-2 px-2">
            <div class="col-12 p-0 row d-flex ">
                @yield('user-content')
            </div>
        </div>
    </div>
</div>
{{--
<x-start />
<x-numbers />
<x-faqs />
<x-blog />
<x-about />
<x-call-to-action /> --}}
@endsection
@section('scripts')
<script type="module">
    setTimeout(function(){
        $('a[href="'+ window.location.href + '"], a[href="'+ window.location.path + '"]').addClass('active');
    },10);
</script>
@endsection
