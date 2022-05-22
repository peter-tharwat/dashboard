<!DOCTYPE html>
<html lang="ar">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://nafezly.com/css/cust-fonts.css">
    <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://nafezly.com/css/responsive-font.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('/css/font-fileuploader.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/jquery.fileuploader.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/jquery.fileuploader-theme-dragdrop.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/main.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    @php
    $page_title="لوحة التحكم";
    @endphp
    @include('seo.index')
    @livewireStyles
    @yield('styles')
    @if(auth()->check())
        @php
        if(session('seen_notifications')==null)
            session(['seen_notifications'=>0]);
        $notifications=auth()->user()->notifications()->orderBy('created_at','DESC')->limit(50)->get();
        $unreadNotifications=auth()->user()->unreadNotifications()->count();
        @endphp
    @endif
    <style type="text/css">
        *:not([class^="fa"]){
            font-family: 'Noto Kufi Arabic', sans-serif;
        }
        .fa, .fas {
            font-family: "Font Awesome 5 Pro"!important; 
            font-weight: 900;
        }
        ol,ul{
            padding: 5px 20px;
        }
        ol{
            list-style: auto;
        }
        ul{
            list-style: disc;
        }
        .select2-selection__arrow{
            margin-top: 2px;
        }
        .select2-selection{
            width: 100%!important;
            height: 38px!important;
            border-radius: 0px!important;
        }
        .select2{
            width: 100%!important;
        }
        pre{
            direction: ltr;
        }
    </style>
</head>

<body style="background: #f7f7f7" class="dash">
    @yield('after-body')
    @if(flash()->message)
        <div style="position: absolute;z-index: 4444444444444;left: 35px;top: 80px;max-width: calc(100% - 70px);padding: 16px 22px;border-radius: 7px;overflow: hidden;width: 273px;border-right: 8px solid #374b52;background: #2196f3;color: #fff;cursor: pointer;"  onclick="$(this).slideUp();">
            <span class="fas fa-info-circle"></span> {{ flash()->message }} 
        </div>
    @endif 
    <div class="col-12 justify-content-end d-flex">
        @if($errors->any())
        <div class="col-12" style="position: absolute;top: 80px;left: 10px;">
            {!! implode('', $errors->all('<div class="alert-click-hide alert alert-danger alert alert-danger col-9 col-xl-3 rounded-0 mb-1" style="position: fixed!important;z-index: 11;opacity:.9;left:25px;cursor:pointer;" onclick="$(this).fadeOut();">:message</div>')) !!}
        </div>
        @endif
    </div>

{{--<div class="modal fade" data-bs-backdrop="static" id="open-image-selector-modal" data-bs-keyboard="false" tabindex="-1"  aria-hidden="true">
      <div class="modal-dialog modal-xl  modal-fullscreen-sm-down ">
        <div class="modal-content overflow-hidden">
        <div class="col-12 px-0 d-flex row">

            <div class="col-10 px-3 py-3">
                <span class="fal fa-info-circle"></span>    إختر من الملفات
            </div>
            <div class="col-2 px-3 align-items-center d-flex justify-content-end">
                <span class="far fa-times font-2 cursor-pointer mx-2" data-bs-dismiss="modal"></span>
            </div>

            <div class="col-12 divider" style="min-height: 2px;"></div>

        </div>
          <div class="modal-body p-0">
            <div class="col-12">
                <livewire:files-viewer />
            </div>
          </div>
         
        </div>
      </div>
    </div>
 --}}
    <form method="POST" action="{{route('logout')}}" id="logout-form" class="d-none">@csrf</form>
    <div class="col-12 d-flex">
        <div style="width: 280px;background: #11233b;min-height: 100vh;position: fixed;z-index: 100" class="aside active">
            <div class="col-12 px-0 d-flex" style="height: 60px;background: #1a2d4d">
                <div class="col-12 px-2 font-3  d-flex  justify-content-center pt-md-1" style="color: #fff">
                    <span class="fal fa-chart-pie font-4 pt-3 d-inline-block "></span>
                    <span class="d-inline-block px-2 pt-2">لوحة التحكم</span> 
                    <div class="d-flex d-md-none justify-content-center align-items-center px-0   asideToggle" style="width: 40px;height: 40px;">
                        <span class="fal fa-bars font-4 cursor-pointer"></span>
                    </div>
                </div>
            </div>
        <div class="col-12 px-0 py-5 text-center justify-content-center align-items-center ">
            <a href="{{route('admin.profile.edit')}}">
            <img src="{{auth()->user()->getUserAvatar()}}" style="width: 40px;height: 40px;color: #fff;border-radius: 50%" class="d-inline-block">
                </a>
                <div class="col-12 px-0 mt-2" style="color: #fff">
                    مرحباً {{auth()->user()->name}}
                </div> 
            </div>
            <div class="col-12 px-0">



                <div class="col-12 px-0 aside-menu" style="height: calc(100vh - 250px);overflow: auto;">

                    <a href="{{route('admin.index')}}" class="col-12 px-0">
                        <div class="col-12 item px-0 d-flex" >
                            <div style="width: 50px" class="px-3 text-center">
                                <span class="fal fa-home font-3"> </span> 
                            </div>
                            <div style="width: calc(100% - 50px)" class="px-2">
                                الرئيسية
                            </div> 
                        </div>
                    </a>
                    @can('viewAny',\App\Models\User::class)
                    <a href="{{route('admin.users.index')}}" class="col-12 px-0">
                        <div class="col-12 item px-0 d-flex " >
                            <div style="width: 50px" class="px-3 text-center">
                                <span class="fal fa-users font-3"> </span> 
                            </div>
                            <div style="width: calc(100% - 50px)" class="px-2">
                                المستخدمين
                            </div> 
                        </div>
                    </a>
                    @endcan
                    @can('viewAny',\App\Models\Category::class)
                    <a href="{{route('admin.categories.index')}}" class="col-12 px-0">
                        <div class="col-12 item px-0 d-flex " >
                            <div style="width: 50px" class="px-3 text-center">
                                <span class="fal fa-tag font-3"> </span> 
                            </div>
                            <div style="width: calc(100% - 50px)" class="px-2">
                                الأقسام
                            </div> 
                        </div>
                    </a>
                    @endcan
                    @can('viewAny',\App\Models\Article::class)
                    <a href="{{route('admin.articles.index')}}" class="col-12 px-0">
                        <div class="col-12 item px-0 d-flex " >
                            <div style="width: 50px" class="px-3 text-center">
                                <span class="fal fa-newspaper font-3"> </span> 
                            </div>
                            <div style="width: calc(100% - 50px)" class="px-2">
                                المقالات
                            </div> 
                        </div>
                    </a>
                    @endcan
                    
                    @can('viewAny',\App\Models\Announcement::class)
                    <a href="{{route('admin.announcements.index')}}" class="col-12 px-0">
                        <div class="col-12 item px-0 d-flex " >
                            <div style="width: 50px" class="px-3 text-center">
                                <span class="fal fa-bullhorn font-3"> </span> 
                            </div>
                            <div style="width: calc(100% - 50px)" class="px-2">
                                الإعلانات
                            </div> 
                        </div>
                    </a>
                    @endcan
                    @can('viewAny',\App\Models\Contact::class)
                    <a href="{{route('admin.contacts.index')}}" class="col-12 px-0">
                        <div class="col-12 item px-0 d-flex " >
                            <div style="width: 50px" class="px-3 text-center">
                                <span class="fal fa-phone font-3"> </span> 
                            </div>
                            <div style="width: calc(100% - 50px)" class="px-2">
                                طلب التواصل 
                            @php
                            $contacts_count = \App\Models\Contact::where('status','PENDING')->count();
                            @endphp
                            @if($contacts_count)
                            <span style="background: #d34339;border-radius: 2px;color:#fff;display: inline-block;font-size: 11px;text-align: center;padding: 1px 5px;">{{$contacts_count}}</span>
                            
                            @endif
                            </div> 
                        </div>
                    </a>
                    @endcan
                    @can('viewAny',\App\Models\Page::class)
                    <a href="{{route('admin.pages.index')}}" class="col-12 px-0">
                        <div class="col-12 item px-0 d-flex " >
                            <div style="width: 50px" class="px-3 text-center">
                                <span class="fal fa-file-invoice font-3"> </span> 
                            </div>
                            <div style="width: calc(100% - 50px)" class="px-2">
                                الصفحات
                            </div> 
                        </div>
                    </a>
                    @endcan
                    @can('viewAny',\App\Models\Menu::class)
                    <a href="{{route('admin.menus.index')}}" class="col-12 px-0">
                        <div class="col-12 item px-0 d-flex " >
                            <div style="width: 50px" class="px-3 text-center">
                                <span class="fal fa-list font-3"> </span> 
                            </div>
                            <div style="width: calc(100% - 50px)" class="px-2">
                                القوائم
                            </div> 
                        </div>
                    </a>
                    @endcan
                    @can('viewAny',\App\Models\Faq::class)
                    <a href="{{route('admin.faqs.index')}}" class="col-12 px-0">
                        <div class="col-12 item px-0 d-flex " >
                            <div style="width: 50px" class="px-3 text-center">
                                <span class="fal fa-question font-3"> </span> 
                            </div>
                            <div style="width: calc(100% - 50px)" class="px-2">
                                الأسئلة الشائعة
                            </div> 
                        </div>
                    </a>
                    @endcan
                    @can('viewAny',\App\Models\Setting::class)
                    <a href="{{route('admin.settings.index')}}" class="col-12 px-0">
                        <div class="col-12 item px-0 d-flex " >
                            <div style="width: 50px" class="px-3 text-center">
                                <span class="fal fa-wrench font-3"> </span> 
                            </div>
                            <div style="width: calc(100% - 50px)" class="px-2">
                               الإعدادات
                            </div> 
                        </div>
                    </a> 
                    @endcan
                    

                    

                    <a href="#" class="col-12 px-0" onclick="document.getElementById('logout-form').submit();">
                        <div class="col-12 item px-0 d-flex " >
                            <div style="width: 50px" class="px-3 text-center">
                                <span class="fal fa-sign-out-alt font-3"> </span> 
                            </div>
                            <div style="width: calc(100% - 50px)" class="px-2">
                               تسجيل خروج
                            </div> 
                        </div>
                    </a>
                </div>
            </div>
           
        </div>
        <div class="main-content in-active" style="overflow: hidden;">
            <div class="col-12 px-0 d-flex justify-content-between top-nav" style="height: 60px;box-shadow: 0px 0px 12px #f1f1f1;background: #fff;position: fixed;width: 100%;width: calc(100% - 280px);z-index: 1000;">
                <div class="col-12 px-0 d-flex justify-content-center align-items-center btn btn-light asideToggle" style="width: 60px;height: 60px;">
                    <span class="fal fa-bars font-4"></span>
                </div> 
                <div class="col-12 px-0 d-flex justify-content-end  " style="height: 60px;">
                    <div class="btn-group" id="notificationDropdown">

                        <div class="col-12 px-0 d-flex justify-content-center align-items-center btn btn-light " style="width: 60px;height: 60px;" data-bs-toggle="dropdown" aria-expanded="false" id="dropdown-notifications">
                            <span class="fas fa-bell font-4 d-inline-block" style="color: #ff9800;transform: rotate(15deg)"></span>
                            <span style="position: absolute;min-width: 25px;min-height: 25px;
                            @if($unreadNotifications!=0)
                            display: inline-block;
                            @else
                            display: none;
                            @endif
                            right: 0px;top: 0px;border-radius: 20px;background: #c00;color:#fff;font-size: 14px;" id="dropdown-notifications-icon">{{$unreadNotifications}}</span>

                        </div>
                        <div class="dropdown-menu py-0 rounded-0 border-0 shadow " style="cursor: auto!important;z-index: 20000;width: 350px;height: 450px;">
                            <div class="col-12 notifications-container" style="height:406px;overflow: auto;">
                                <x-notifications :notifications="$notifications" />
                            </div>
                            <div class="col-12 d-flex border-top"> 
                                <a href="{{route('admin.notifications.index')}}" class="d-block py-2 px-3 ">
                                    <div class="col-12 align-items-center">
                                      <span class="fal fa-bells"></span>  عرض كل الإشعارات
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 px-0 d-flex justify-content-center align-items-center  dropdown"  style="width: 60px;height: 60px;" >
                        <div style="width: 60px;height: 60px;cursor: pointer;" data-bs-toggle="dropdown" aria-expanded="false" class="d-flex justify-content-center align-items-center cursor-pointer">
                            <img src="{{auth()->user()->getUserAvatar()}}" style="padding: 10px;border-radius: 50%;width: 60px;height: 60px;">
                        </div>
                        <ul class="dropdown-menu shadow border-0" aria-labelledby="dropdownMenuButton1" >
                                <li><a class="dropdown-item font-1" href="/" target="_blank"><span class="fal fa-desktop font-1"></span> عرض الموقع</a></li>
                                <li><a class="dropdown-item font-1" href="{{route('admin.profile.index')}}"><span class="fal fa-user font-1"></span> ملفي الشخصي</a></li>

                                <li><a class="dropdown-item font-1" href="{{route('admin.profile.edit')}}"><span class="fal fa-edit font-1"></span> تعديل ملفي الشخصي</a></li> 

                                @can('viewAny',\App\Models\Redirection::class)
                                <li><a class="dropdown-item font-1" href="{{route('admin.redirections.index')}}"><span class="fal fa-directions font-1"></span> التحويلات</a></li> 
                                @endcan


                                @can('viewAny',\App\Models\HubFile::class)
                                <li><a class="dropdown-item font-1" href="{{route('admin.files.index')}}"><span class="fal fa-file font-1"></span> الملفات</a></li> 
                                @endcan


                                @can('viewAny',\App\Models\RateLimit::class)
                                <li><a class="dropdown-item font-1" href="{{route('admin.traffics.index')}}"><span class="fal fa-traffic-light font-1"></span> الترافيك</a></li> 
                                @endcan

                                @can('viewAny',\App\Models\ReportError::class)
                                <li><a class="dropdown-item font-1" href="{{route('admin.traffics.error-reports')}}"><span class="fal fa-bug font-1"></span> تقارير الأخطاء</a></li> 
                                @endcan
 
 


                                <li><hr style="height: 1px;margin: 10px 0px 5px;"></li>
                                <li><a class="dropdown-item font-1" href="#" onclick="document.getElementById('logout-form').submit();"><span class="fal fa-sign-out-alt font-1"></span> تسجيل خروج</a></li>
                        </ul>

                    </div>

                    <div class="dropdown" style="width: 60px;height: 60px;background: #2381c6">
                        <span class="d-inline-block fal fa-user"></span> 
                    </div>

                </div>
            </div>
            <div class="col-12 px-0 py-2" style="margin-top: 60px;">
                @yield('content')
            </div>
        </div>
    </div>
    <input type="hidden" id="current_selected_editor">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{asset('/js/jquery.fileuploader.min.js')}}"></script>
    <script src="{{asset('/js/validatorjs.min.js')}}"></script>
    <script src="{{asset('/js/favicon_notification.js')}}"></script>
    <script src="{{asset('/js/main.js')}}"></script>
    <script type="text/javascript">
        $('input[required],select[required],textarea[required]').parent().parent().find('>div:nth-of-type(1)').append('<span style="color:red;font-size:16px">*</span>');
        $("[name='title'],[name='slug'],[name='meta_description']").on('keypress',function(){
            $(this).parent().find('.last_appended_counter').remove();
            $(this).parent().append('<div class="col-12 p-2 last_appended_counter"><span class="d-inline-block" style="font-size:13px">عدد الحروف <span style="font-weight:bolder;color:#007469;font-size:15px">'+$(this).val().length+'</span> حرفاً</span></div>');
        });

        $("[name='title'],[name='slug'],[name='description_ar'],[name='description_en'],[name='meta_description']").append(function(){
            $(this).parent().find('.last_appended_counter').remove();
            $(this).parent().append('<div class="col-12 p-2 last_appended_counter"><span class="d-inline-block" style="font-size:13px">عدد الحروف <span style="font-weight:bolder;color:#007469;font-size:15px">'+$(this).val().length+'</span> حرفاً</span></div>');
        }); 
        $(document).ready(function() {
              $('.select2-select').select2();
          });
    </script>
    @livewireScripts
    @include('layouts.scripts')
    @yield('scripts')
</body>
</html>