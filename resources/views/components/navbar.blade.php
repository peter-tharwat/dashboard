<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>

<div class="col-12 fixed-top  main-nav shadow" style="background: #fff;padding: 3px 0px;min-height: 65px;">
    <div class="container px-1 my-auto">
        <div class="col-12 row p-0">
            <div class="col-auto p-3 d-flex align-items-center hover-main-color-flexable" onclick="document.getElementById('aside-menu').classList.toggle('active');document.getElementById('body-overlay').classList.toggle('active');" style="cursor: pointer;">
                <span class="far fa-bars font-3 px-0"></span>
            </div>
            <div class="col-auto d-flex align-items-center px-1 py-2">
                <a href="/">
                    <img src="{{$settings['get_website_wide_logo']}}" style="width: 105px;" alt="{{$settings['website_name']}}" >
                </a>
            </div>
            <div class="col me-auto p-0 row justify-content-between d-flex">
                <div class="col row m-0 px-2">

                    @php
                    $menu = \App\Models\Menu::where('location',"NAVBAR")->with(['links'=>function($q){$q->orderBy('order','ASC');}])->first();
                    @endphp
                    @if($menu !=null)
                    @foreach($menu->links as $link)
                    <div class="col-auto  d-none d-lg-flex align-items-center p-0 mx-1 " >
                        <a href="{{$link->url}}" class="d-flex align-items-center py-2 px-3 top-navbar-link rounded" style="color: inherit;">
                            <span class="{{$link->icon}} mx-1"></span> {{$link->title}}
                        </a>
                    </div>
                    @endforeach
                    @endif
                </div>
                <div class="col-auto  d-flex align-items-center px-1 ">
                    @guest
                    <a href="{{route('login')}}">
                        <button class=" font-1 kufi  btn btn-primary " style="padding:5px 10px;">تسجيل دخول</button>
                    </a>
                    @else


                    @if(auth()->check())
                        @php
                        if(session('seen_notifications')==null)
                            session(['seen_notifications'=>0]);
                        $notifications=auth()->user()->notifications()->orderBy('created_at','DESC')->limit(50)->get();
                        $unreadNotifications=auth()->user()->unreadNotifications()->count();
                        @endphp
                    @endif
                    <div class="btn-group" id="notificationDropdown">

                        <div class="col-12 px-0 d-flex justify-content-center align-items-center " style="width: 55px;height: 55px;cursor: pointer" data-bs-toggle="dropdown" aria-expanded="false" id="dropdown-notifications">
                            <span class="fal fa-bell font-3 d-inline-block" style="color: var(--color-2);transform: rotate(15deg);"></span>
                            <span style="position: absolute;min-width: 25px;min-height: 25px;
                            @if($unreadNotifications!=0)
                            display: inline-block;
                            @else
                            display: none;
                            @endif
                            right: 0px;top: 0px;border-radius: 20px;background: #c00;color:#fff;font-size: 14px;" class="text-center" id="dropdown-notifications-icon">{{$unreadNotifications}}</span>

                        </div>
                        <div class="dropdown-menu dropdown-menu-end py-0 rounded-0 border-0 shadow " style="cursor: auto!important;z-index: 20000;width: 350px;height: 450px;">
                            <div class="col-12 notifications-container" style="height:406px;overflow: auto;">
                                <x-notifications :notifications="$notifications" />
                            </div>
                            <div class="col-12 d-flex border-top" style="border-color: rgb(46 46 46 / 9%)!important;"> 
                                <a href="{{route('user.notifications')}}" class="d-block py-2 px-3 ">
                                    <div class="col-12 align-items-center">
                                      <span class="fal fa-bells"></span>  عرض كل الإشعارات
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 px-0 d-flex justify-content-center align-items-center  dropdown"  style="width: 55px;height: 55px;" >
                        <div style="width: 55px;height: 55px;cursor: pointer;" data-bs-toggle="dropdown" aria-expanded="false" class="d-flex justify-content-center align-items-center cursor-pointer">
                            <img src="{{auth()->user()->getUserAvatar()}}" style="padding: 10px;border-radius: 50%;width: 55px;height: 55px;" alt="{{auth()->user()->name}}">
                        </div>
                        <ul class="dropdown-menu dropdown-menu-end shadow border-0 py-2" aria-labelledby="dropdownMenuButton1" style="top: -3px;">
                                <li><a class="dropdown-item font-1" href="{{route('user.dashboard')}}" ><span class="fal fa-sliders-h font-1" style="width: 20px;"></span> لوحة التحكم</a></li>
                                <li><a class="dropdown-item font-1" href="{{route('user.support')}}"><span class="fal fa-comments-alt font-1" style="width: 20px;"></span> الدعم الفني</a></li>

                        

                                <li><a class="dropdown-item font-1" href="{{route('user.profile.edit')}}"><span class="fal fa-wrench font-1" style="width: 20px;"></span> الاعدادات</a></li>

                                <li><a class="dropdown-item font-1" href="{{route('user.notifications')}}"><span class="fal fa-bells font-1" style="width: 20px;"></span> الاشعارات</a></li> 
                           
                                <li><hr style="height: 1px;margin: 10px 0px 5px;"></li>
                                <li><a class="dropdown-item font-1"  onclick="document.getElementById('logout-form').submit();" style="cursor:pointer;"><span class="fal fa-sign-out-alt font-1" style="width: 20px;"></span> تسجيل خروج</a></li>
                        </ul>

                    </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
<div id="aside-menu" class=" shadow">
    <div class="col-12 d-flex justify-content-between  align-items-center p-0 shadow" style="height:65px">
        <span class="px-3 font-1 kufi">

            <img src="{{$settings['get_website_wide_logo']}}" style="width: 105px;" alt="{{$settings['website_name']}}">

        </span>
        <span class="d-flex">
            <span class="font-1"><span class="far fa-times font-3 px-4 py-3" style="cursor: pointer;" onclick="document.getElementById('aside-menu').classList.toggle('active');document.getElementById('body-overlay').classList.toggle('active');"></span></span>
        </span>
    </div>
    <div class="col-12 p-0">
        <div class="col-12 p-0 aside-scroll pt-2" style="height: calc(100vh - 186px);overflow: auto;position: relative;">

            @php
            $aside_menu = \App\Models\Menu::where('location',"ASIDE_BAR")->with(['links'=>function($q){$q->orderBy('order','ASC');}])->first();
            @endphp
            @if($aside_menu !=null)
            @foreach($aside_menu->links as $link)
            <div class="nav-item ">
                <a href="{{$link->url}}" style="color: inherit;" class="d-block">
                <div class="nav-link" style="cursor: pointer;" >
                    <div class="col-12 px-0 row">
                        <div class="col-12 px-0 kufi" >
                            <span class="{{$link->icon}} mx-1"></span> {{$link->title}}
                        </div>
                    </div>
                </div>
                </a>
            </div>
            @endforeach
            @endif
 
        
        </div>
        <div class="col-12 px-0 py-2" style="position:absolute;width: 100%;">
            <div class="col-12  p-0">
                <div class="col-12 p-0">
                    <ul style=";padding: 0px;list-style: none;min-height: 48px;" class="d-flex align-items-center justify-content-center row my-2">
                        @if($settings['facebook_link']!=null)
                        <a href="{{$settings['facebook_link']}}" class="d-inline-block p-1" style="width:48px">
                            <span class="fab fa-facebook-f d-inline-block border rounded-circle" style="width: 40px;@height: 40px;padding: 11px 14px ;color: #3b5998;cursor: pointer;"></span>
                        </a>
                        @endif
                        @if($settings['twitter_link']!=null)
                        <a href="{{$settings['twitter_link']}}" class="d-inline-block p-1" style="width:48px">
                            <span class="fab fa-twitter d-inline-block border rounded-circle" style="width: 40px;height: 40px;padding: 11px 11px ;color: #00aced;cursor: pointer;"></span>
                        </a>
                        @endif
                        @if($settings['youtube_link']!=null)
                        <a href="{{$settings['youtube_link']}}" class="d-inline-block p-1" style="width:48px">
                            <span class="fab fa-youtube d-inline-block border rounded-circle" style="width: 40px;height: 40px;padding: 11px 10px ;color: #FF0000;cursor: pointer;"></span>
                        </a>
                        @endif
                        @if($settings['linkedin_link']!=null)
                        <a href="{{$settings['linkedin_link']}}" class="d-inline-block p-1" style="width:48px">
                            <span class="fab fa-linkedin-in d-inline-block border rounded-circle" style="width: 40px;height: 40px;padding: 11px 12px ;color: #1976d2;cursor: pointer;"></span>
                        </a>
                        @endif
                        @if($settings['telegram_link']!=null)
                        <a href="{{$settings['telegram_link']}}" class="d-inline-block p-1" style="width:48px">
                            <span class="fab fa-telegram-plane d-inline-block border rounded-circle" style="width: 40px;height: 40px;padding: 11px 12px ;color: #1e96c8;cursor: pointer;"></span>
                        </a>
                        @endif
                    </ul>
                </div>
                <div class="col-12 p-0 text-center" style="font-size: 12px;color: var(--font-1);">
                    جميع الحقوق محفوظة © {{$settings['website_name']}} {{date('Y')}} </div>
            </div>
        </div>
    </div>
</div>