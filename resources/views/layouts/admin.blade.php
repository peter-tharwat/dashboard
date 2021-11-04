<!DOCTYPE html>
<html lang="ar">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://nafezly.com/css/cust-fonts.css">
    <link rel="stylesheet" type="text/css" href="https://nafezly.com/css/fontawsome.min.css">
    <link rel="stylesheet" type="text/css" href="https://nafezly.com/css/responsive-font.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    @notifyCss
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body style="background: #f7f7f7">
    <x:notify-messages />
    <style>
    td,
    th {
        padding-top: 15px !important;
        padding-bottom: 15px !important;
        border-bottom: 1px solid #f3f3f3;
        font-size: 14px;
    }
    .fixed {
        z-index: 11;
    }
    .ml-4.flex-1 {
        margin-left: 0px;
        margin-right: 30px !important;
    }
    thead th {
        border-bottom: 1px solid #ddd !important;
    }
    .aside,
    .main-content,
    .top-nav {
        transition: .2s ease-in-out;
    }
    .aside .item.active {
        background: #101d30;
    }
    .aside .item.active * {
        color: #38b59c;
    }
    * {
        text-decoration: unset !important;
    }
    .main-content {
        width: calc(100% - 280px);
        margin-right: 280px;
    }
    .top-nav {
        width: calc(100% - 280px);
    }
    .aside * {
        color: #fff;
    }
    .aside .item div {
        font-size: 16px;
    }
    .aside.active {
        right: 0px;
    }
    .aside.in-active {
        right: -280px;
    }
    .item {
        padding: 12px 0px 15px 0px;
        margin: 2px 0px;
    }
    .main-content.active .top-nav {
        width: 100% !important;
    }
    @media (max-width: 700px) {
        .main-content {
            width: 100% !important;
            margin-right: 0px !important;
        }
        .top-nav {
            width: 100% !important;
        }
        .aside {
            right: -280px;
        }
        .aside.active {
            right: -280px;
        }
        .aside.in-active {
            right: 0px;
        }
    }
    @media (min-width: 700px) {
        .main-content.active {
            width: 100% !important;
            margin-right: 0px !important
        }
    }
    .ck[dir=rtl],
    .ck[dir=rtl],
    .ck,
    .ck * {
        text-align: right;
    }
    </style>
    <div class="col-12 justify-content-end d-flex">
        @if($errors->any())
        <div class="col-12" style="position: absolute;top: 80px;left: 10px;">
            {!! implode('', $errors->all('<div class="alert-click-hide alert alert-danger alert alert-danger col-9 col-xl-3 rounded-0 mb-1" style="position: fixed!important;z-index: 11;opacity:.9;left:25px;cursor:pointer;" onclick="$(this).fadeOut();">:message</div>')) !!}
        </div>
        @endif
    </div>
    <form method="POST" action="{{route('logout')}}" id="logout-form">@csrf</form>
    

    <div class="col-12 d-flex">
        

        <div style="width: 280px;background: #11233b;min-height: 100vh;position: fixed;z-index: 1" class="aside active">
            <div class="col-12 px-0 d-flex" style="height: 60px;background: #1a2d4d">
                <div class="col-12 px-2 font-3  d-flex  justify-content-center pt-md-1" style="color: #fff">
                    <span class="fal fa-chart-pie font-4 pt-3 d-inline-block "></span>
                    <span class="d-inline-block px-2 pt-2">لوحة التحكم</span> 
                    <div class="d-flex d-md-none justify-content-center align-items-center px-0   asideToggle" style="width: 60px;height: 60px;">
                        <span class="fal fa-bars font-4 cursor-pointer"></span>
                    </div>
                </div>
            </div>
        <div class="col-12 px-0 py-5 text-center ">
                <span class="fal fa-user font-5 pt-2" style="border: 2px solid #fff;width: 55px;height: 55px;color: #fff;border-radius: 50%"> </span>
                <div class="col-12 px-0 mt-2" style="color: #fff">
                    مرحباً مدير
                </div> 
            </div>
            <div class="col-12 px-0">
                <div class="col-12 px-0">

                    <a href="#" class="col-12 px-0">
                        <div class="col-12 item px-0 d-flex" >
                            <div style="width: 50px" class="px-3 text-center">
                                <span class="fal fa-home font-3"> </span> 
                            </div>
                            <div style="width: calc(100% - 50px)" class="px-2">
                                الرئيسية
                            </div> 
                        </div>
                    </a>
                    <a href="#" class="col-12 px-0">
                        <div class="col-12 item px-0 d-flex " >
                            <div style="width: 50px" class="px-3 text-center">
                                <span class="fal fa-users font-3"> </span> 
                            </div>
                            <div style="width: calc(100% - 50px)" class="px-2">
                                المستخدمين
                            </div> 
                        </div>
                    </a>
                    <a href="#" class="col-12 px-0">
                        <div class="col-12 item px-0 d-flex " >
                            <div style="width: 50px" class="px-3 text-center">
                                <span class="fab fa-youtube font-3"> </span> 
                            </div>
                            <div style="width: calc(100% - 50px)" class="px-2">
                                الدورات التعليمية
                            </div> 
                        </div>
                    </a>
                    <a href="#" class="col-12 px-0">
                        <div class="col-12 item px-0 d-flex " >
                            <div style="width: 50px" class="px-3 text-center">
                                <span class="fas fa-hands-helping font-3"> </span> 
                            </div>
                            <div style="width: calc(100% - 50px)" class="px-2">
                                شركاء النجاح
                            </div> 
                        </div>
                    </a>
                    <a href="#" class="col-12 px-0">
                        <div class="col-12 item px-0 d-flex " >
                            <div style="width: 50px" class="px-3 text-center">
                                <span class="fal fa-box-full font-3"> </span> 
                            </div>
                            <div style="width: calc(100% - 50px)" class="px-2">
                                الكورسات
                            </div> 
                        </div>
                    </a>
                    <a href="#" class="col-12 px-0">
                        <div class="col-12 item px-0 d-flex " >
                            <div style="width: 50px" class="px-3 text-center">
                                <span class="fal fa-play font-3"> </span> 
                            </div>
                            <div style="width: calc(100% - 50px)" class="px-2">
                                الفيديوهات
                            </div> 
                        </div>
                    </a>
                    <a href="#" class="col-12 px-0">
                        <div class="col-12 item px-0 d-flex " >
                            <div style="width: 50px" class="px-3 text-center">
                                <span class="fal fa-stars font-3"> </span> 
                            </div>
                            <div style="width: calc(100% - 50px)" class="px-2">
                                التقييمات
                            </div> 
                        </div>
                    </a>
                    <a href="#" class="col-12 px-0">
                        <div class="col-12 item px-0 d-flex " >
                            <div style="width: 50px" class="px-3 text-center">
                                <span class="fal fa-box-check font-3"> </span> 
                            </div>
                            <div style="width: calc(100% - 50px)" class="px-2">
                                الطلبات
                            </div> 
                        </div>
                    </a>
                    <a href="#" class="col-12 px-0">
                        <div class="col-12 item px-0 d-flex " >
                            <div style="width: 50px" class="px-3 text-center">
                                <span class="fal fa-sack-dollar font-3"> </span> 
                            </div>
                            <div style="width: calc(100% - 50px)" class="px-2">
                                عمليات الدفع
                            </div> 
                        </div>
                    </a>
                    <a href="#" class="col-12 px-0">
                        <div class="col-12 item px-0 d-flex " >
                            <div style="width: 50px" class="px-3 text-center">
                                <span class="fal fa-book font-3"> </span> 
                            </div>
                            <div style="width: calc(100% - 50px)" class="px-2">
                                مقالات - أخبار
                            </div> 
                        </div>
                    </a>
                    <a href="#" class="col-12 px-0">
                        <div class="col-12 item px-0 d-flex " >
                            <div style="width: 50px" class="px-3 text-center">
                                <span class="fal fa-wrench font-3"> </span> 
                            </div>
                            <div style="width: calc(100% - 50px)" class="px-2">
                               الإعدادات
                            </div> 
                        </div>
                    </a>
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
            <div class="col-12 px-0 d-flex justify-content-between top-nav" style="height: 60px;box-shadow: 0px 0px 12px #f1f1f1;background: #fff;position: fixed;width: 100%;width: calc(100% - 280px)">
                <div class="col-12 px-0 d-flex justify-content-center align-items-center btn btn-light asideToggle" style="width: 60px;height: 60px;">
                    <span class="fal fa-bars font-4"></span>
                </div>
                {{-- <div class="col-12 px-0 d-flex justify-content-center align-items-center btn btn-light" style="width: 60px;height: 60px;">
                </div>
                --}}
                <div class="col-12 px-0 d-flex justify-content-end  " style="height: 60px;">
                    <div class="btn-group" id="notificationDropdown">
                        @php
                        $notifications=auth()->user()->notifications()->orderBy('created_at','DESC')->limit(50)->get();
                        $unreadNotifications=auth()->user()->unreadNotifications()->count();
                        /*dd($notifications[0]->data['level']);*/
                        @endphp
                        <div class="col-12 px-0 d-flex justify-content-center align-items-center btn btn-light " style="width: 60px;height: 60px;" data-bs-toggle="dropdown" aria-expanded="false" id="dropdown-notifications">
                            <span class="fas fa-bell font-4 d-inline-block" style="color: #ff9800;transform: rotate(15deg)"></span>
                            @if($unreadNotifications!=0)
                            <span style="position: absolute;min-width: 25px;min-height: 25px;display: inline-block;right: 0px;top: 0px;border-radius: 20px;background: #c00;color:#fff;font-size: 14px" id="dropdown-notifications-icon">{{$unreadNotifications}}</span>
                            @endif
                        </div>
                        <!-- Example single danger button -->
                        <ul class="dropdown-menu rounded-0 border-0 shadow pb-3" style="cursor: auto!important;z-index: 9999999999999999;">
                            <div class="col-12 pb-3" style="overflow: auto;width: 350px;height: 390px;">
                                @foreach($notifications as $notification)
                                <div class="col-12 px-3 text-right" style="background: {{$notification->read_at==null?'#f7f7f7':''}}">
                                    {!!$notification->data['message']!!}
                                    <div class="col-12 border-bottom pb-3">
                                        <span class="font-1">
                                            <span class="fas fa-clock"></span> {{\Carbon::parse($notification->created_at)->diffForHumans()}}
                                        </span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </ul>
                    </div>
                    <div class="col-12 px-0 d-flex justify-content-center align-items-center  dropdown"  style="width: 60px;height: 60px;background: #2381c6" >
                        <div style="width: 60px;height: 60px;" data-bs-toggle="dropdown" aria-expanded="false" class="d-flex justify-content-center align-items-center cursor-pointer">
                             <span class="fal fa-user font-4 "  style="color: #fff"></span>

                            

                        </div>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                              </ul>
                        {{-- onclick="document.getElementById('logout-form').submit();" --}}
                       

                    </div>

                    <div class="dropdown" style="width: 60px;height: 60px;background: #2381c6">
                        <span class="d-inline-block fal fa-user"></span>
                  {{--     <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown button
                      </button> --}}
                      
                    </div>

                </div>
            </div>
            <div class="col-12 px-0 py-2" style="margin-top: 60px;">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>
    <script>
    var allEditors = document.querySelectorAll('.editor');
    for (var i = 0; i < allEditors.length; ++i) {
        ClassicEditor
            .create(allEditors[i], {
                toolbar: {
                    items: [
                        'heading', '|',
                        'fontfamily', 'fontsize', '|',
                        'alignment', '|',
                        'fontColor', 'fontBackgroundColor', '|',
                        'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
                        'link', '|',
                        'outdent', 'indent', '|',
                        'bulletedList', 'numberedList', 'todoList', '|',
                        'code', 'codeBlock', '|',
                        'insertTable', '|',
                        'uploadImage', 'blockQuote', '|',
                        'undo', 'redo'
                    ],
                    shouldNotGroupWhenFull: true
                },
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                        { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                        { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                        { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                        { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                    ]
                },
                alignment: {
                    options: ['left', 'right', 'center']
                },
                ckfinder: {
                    uploadUrl: '{{route('admin.upload-image')}}'
                },
                image: {
                    toolbar: ['toggleImageCaption', 'imageTextAlternative']
                }
            })
            .catch(error => {
                console.error(error);
            });
    }
    </script>
    <script>
    $('.asideToggle').on('click', function() {
        $('.aside').toggleClass('active');
        $('.aside').toggleClass('in-active');
        $('.main-content').toggleClass('active');
        $('.main-content').toggleClass('in-active');
    });
    $("a[href='" + window.location.href + "'] >div").addClass('active');
    $('.alert-click-hide').on('click', function() {
        $(this).fadeOut();
    });
    var notificationDropdown = document.getElementById('notificationDropdown')
    notificationDropdown.addEventListener('show.bs.dropdown', function() {
        $.ajax({
            method: "POST",
            url: "{{route('admin.notifications.seen')}}",
            data: { _token: "{{csrf_token()}}" }
        }).done(function(res) {
            $('.dropdown-notifications-icon').addClass('d-none');
        });
    });
    </script>
    @yield('scripts')
</body>
@notifyJs

</html>