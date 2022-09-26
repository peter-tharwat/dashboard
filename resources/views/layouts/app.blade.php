<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

  
    @include('seo.index')
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
    <link rel="stylesheet" type="text/css" href="{{asset('/css/main-basic.css')}}">
    {!!$settings->header_code!!}
    @livewireStyles
    @if(auth()->check())
        @php
        if(session('seen_notifications')==null)
            session(['seen_notifications'=>0]);
        $notifications=auth()->user()->notifications()->orderBy('created_at','DESC')->limit(50)->get();
        $unreadNotifications=auth()->user()->unreadNotifications()->count();
        @endphp
    @endif
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <style type="text/css">
        body,*{
            direction: rtl;
            text-align: start;
            
        }
        html{
            font-size: 16px;
        }
        /**:not(.fileuploader):not([class^=fa]):not([class^=vj]):not([class^=tie-]) {
            font-family: dubai, sans-serif;
        }*/
        .start-head {
            height: 20px;
            width: 12px;
            display: inline-block;
            background: #0194fe;
            position: relative;
            top: 5px;
            margin-left: 5px;
        }
        .main-box-stylex{
            box-shadow: 0 8px 16px 0 rgb(10 14 29 / 2%), 0 8px 64px 0 rgb(119 119 119 / 8%);
        }
        .row{
            margin: 0px;
        }
    </style>
    @yield('styles')
</head>
<body style="background:#eef4f5">
    <style type="text/css">
        #toast-container>div {
            opacity: 1;
        }
    </style>
    @yield('after-body')
    <div id="app">



        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">{{$settings->website_name}}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">الرئيسية</a>
        </li>
      
      </ul>
      <div class="d-flex">
          <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">دخول</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">تسجيل</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <button class="btn nav-link dropdown-toggle" type="button" id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                              </button>

                              {{--   <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    
                                </a> --}}

                                <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('admin.index') }}">
                                        لوحة التحكم
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        تسجيل خروج
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
      </div>
     
    </div>
  </div>
</nav>

  {{--       @if(flash()->message)
            <div style="position: absolute;z-index: 4444444444444;left: 35px;top: 80px;max-width: calc(100% - 70px);padding: 16px 22px;border-radius: 7px;overflow: hidden;width: 273px;border-right: 8px solid #374b52;background: #2196f3;color: #fff;cursor: pointer;"  onclick="$(this).slideUp();">
                <span class="fas fa-info-circle"></span> {{ flash()->message }} 
            </div>
        @endif  --}}
        <div class="col-12 justify-content-end d-flex">
            @if($errors->any())
            <div class="col-12" style="position: absolute;top: 80px;left: 10px;">
                {!! implode('', $errors->all('<div class="alert-click-hide alert alert-danger alert alert-danger col-9 col-xl-3 rounded-0 mb-1" style="position: fixed!important;z-index: 11;opacity:.9;left:25px;cursor:pointer;" onclick="$(this).fadeOut();">:message</div>')) !!}
            </div>
            @endif
        </div>
        

        <main class="p-0">
            @yield('content')
        </main>
    </div>

    <input type="hidden" id="current_selected_editor">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>
    
    <script src="{{asset('/js/jquery.fileuploader.min.js')}}"></script>
    <script src="{{asset('/js/validatorjs.min.js')}}"></script>
    <script src="{{asset('/js/favicon_notification.js')}}"></script>
    <script src="{{asset('/js/main.js')}}"></script>
    @livewireScripts
    @include('layouts.scripts')
    @yield('scripts')
    {!!$settings->footer_code!!}
</body>
</html>
