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
    <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    @notifyCss
    @livewireStyles
    @yield('styles')
    @php
    if(session('seen_notifications')==null)
        session(['seen_notifications'=>0]);

    $notifications=auth()->user()->notifications()->orderBy('created_at','DESC')->limit(50)->get();
    $unreadNotifications=auth()->user()->unreadNotifications()->count();
    /*dd($notifications[0]->data['level']);*/
    @endphp
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="title" content="{{ config('app.name', 'Laravel') }}">
    <link rel="icon" type="image/png" href="{{env('DEFAULT_IMAGE_LOGO')}}" />
</head>

<body style="background: #f7f7f7">
    @yield('after-body')

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
    .main-box{
        background: #fff;
        border-radius: 5px;
    }
    .row{
        margin: 0px;
    }
    tr{
        height: 60px;
        align-items: center;
    }

    .divider {
        background-image: linear-gradient(90deg ,transparent,#666);
        right: auto;
        left: 10px;
        opacity: .1;
        margin: 0px 0px ;
        min-height: 2px;
    }
    .divider-right {
        background-image: linear-gradient(270deg ,transparent,#666);
        right: auto;
        left: 10px;
        opacity: .1;
        margin: 0px 0px ;
        min-height: 2px;
    }
    .form-control.error{
        border: 1px solid #ff2121!important;
    }
    label.error{
        font-size: 13px;
        color: #ff2121;
    }
    .fa, .fas {
        font-family: "Font Awesome 5 Pro"!important;
        font-weight: 900;
    }
    .ck-editor{
        z-index: 0;
    }
    .image-file.active{
        border: 3px solid #2381c6;
    }
    </style>
    <div class="col-12 justify-content-end d-flex">
        @if($errors->any())
        <div class="col-12" style="position: absolute;top: 80px;left: 10px;">
            {!! implode('', $errors->all('<div class="alert-click-hide alert alert-danger alert alert-danger col-9 col-xl-3 rounded-0 mb-1" style="position: fixed!important;z-index: 11;opacity:.9;left:25px;cursor:pointer;" onclick="$(this).fadeOut();">:message</div>')) !!}
        </div>
        @endif
    </div>

    <div class="modal fade" data-bs-backdrop="static" id="open-image-selector-modal" data-bs-keyboard="false" tabindex="-1"  aria-hidden="true">
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



    <form method="POST" action="{{route('logout')}}" id="logout-form">@csrf</form>
    <div class="col-12 d-flex">
        

        <div style="width: 280px;background: #11233b;min-height: 100vh;position: fixed;z-index: 2" class="aside active">
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
            <div class="col-12 px-0 d-flex justify-content-between top-nav" style="height: 60px;box-shadow: 0px 0px 12px #f1f1f1;background: #fff;position: fixed;width: 100%;width: calc(100% - 280px);z-index: 1;">
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
                        <div style="width: 60px;height: 60px;" data-bs-toggle="dropdown" aria-expanded="false" class="d-flex justify-content-center align-items-center cursor-pointer">
                            <img src="{{auth()->user()->getUserAvatar()}}" style="padding: 10px;border-radius: 50%;width: 60px;height: 60px;">
                        </div>
                        <ul class="dropdown-menu shadow border-0" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item font-1" href="/" target="_blank"><span class="fal fa-desktop font-1"></span> عرض الموقع</a></li>
                                <li><a class="dropdown-item font-1" href="{{route('admin.profile.index')}}"><span class="fal fa-user font-1"></span> ملفي الشخصي</a></li>
                                <li><a class="dropdown-item font-1" href="{{route('admin.profile.edit')}}"><span class="fal fa-edit font-1"></span> تعديل ملفي الشخصي</a></li> 
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <script src="{{asset('/js/validatorjs.min.js')}}"></script>
    <script src="{{asset('/js/favicon_notification.js')}}"></script>
    <script src="{{asset('/js/main.js')}}"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>
    <script>
    var allEditors = document.querySelectorAll('.editor');
    var allEditorsAfterRender=[];
    let i;
    for ( i = 0; i < allEditors.length; i++) {
        $(allEditors[i]).attr('data-id',i);
        ClassicEditor.create(allEditors[i], {
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
                        'undo', 'redo',
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
                    uploadUrl: '{{route('admin.upload-image',['_token' => csrf_token() ])}}',
                    options: {
                        resourceType: 'Images'
                    }, 
                },
                image: {
                    toolbar: ['toggleImageCaption', 'imageTextAlternative']
                }
            })
            .catch(error => {
                console.error(error);
            }).then( (editor)=> {  
                console.log(allEditorsAfterRender.length - 1);
                allEditorsAfterRender.push(editor);
                var current_id = allEditorsAfterRender.length-1;
                $(editor.ui.view.toolbar.element).find('.ck-toolbar__items').append('<span><button class="ck ck-button ck-off" data-exe="open-image-selector-opener" type="button" tabindex="-1" data-bs-toggle="modal" data-bs-target="#open-image-selector-modal"  data-editor-id="'+current_id+'" onClick="set_latest_clicked_ckeditor('+current_id+');"><span class="fas fa-images "  ></span></button></span>');
            }); 
    }
    function set_latest_clicked_ckeditor(id){
        allEditorsAfterRender[id].execute( 'insertImage', {
            source:  [
                { src: 'https://static.remove.bg/remove-bg-web/f50bd6ad4990ff621deccea155ab762c39d8c77a/assets/start_remove-c851bdf8d3127a24e2d137a55b1b427378cd17385b01aec6e59d5d4b5f39d2ec.png', alt: 'First alt text',customAttribute:'' },
            ]
        });
    }
    $(document).on('click','.open-image-selector-opener',function(){
        alert($(this).data('editor-id'));
        
    });
    </script>
    <script>
    function get_website_title(){
        return $('meta[name="title"]').attr('content');
    }
    var notificationDropdown = document.getElementById('notificationDropdown')
    notificationDropdown.addEventListener('show.bs.dropdown', function() {
        $.ajax({
            method: "POST",
            url: "{{route('admin.notifications.see')}}",
            data: { _token: "{{csrf_token()}}" }
        }).done(function(res) {
            $('#dropdown-notifications-icon').fadeOut();
            favicon.badge(0);
        });
    });
    function append_notification_notifications(msg) {
        if (msg.count_unseen_notifications > 0) {
            $('#dropdown-notifications-icon').fadeIn(0);
            $('#dropdown-notifications-icon').text(msg.count_unseen_notifications);
        } else {
            $('#dropdown-notifications-icon').fadeOut(0);
            favicon.badge(0);
        }
        $('.notifications-container').empty();
        $('.notifications-container').append(msg.response);
        $('.notifications-container a').on('click', function() { window.location.href = $(this).attr('href'); });
    } 
    function get_notifications() {
        $.ajax({
            method: "GET",
            url: "{{route('admin.notifications.ajax')}}", 
            success: function(data, textStatus, xhr) {

                favicon.badge(data.notifications.response.count_unseen_notifications);

                if (data.alert) {
                    var audio = new Audio('{{asset("/sounds/notification.wav")}}');
                    audio.play();
                }  
                append_notification_notifications(data.notifications.response); 
                if (data.notifications.response.count_unseen_notifications > 0) {
                    $('title').text('(' + parseInt(data.notifications.response.count_unseen_notifications) + ')' + " " +  
                    get_website_title());

                } else {
                    $('title').text(get_website_title());
                }
            }
        });
    } 
    window.focused = 25000;
    window.onfocus = function() {
        get_notifications(); 
        window.focused = 25000;
    };
    window.onblur = function() {
        window.focused = 250000;
    }; 
    function get_nots() {
        setTimeout(function() { 
            get_notifications();
            get_nots();
        }, window.focused);
    }
    get_nots();
    </script>
    @if($unreadNotifications!=session('seen_notifications') && $unreadNotifications!=0)
    @php
    session(['seen_notifications'=>$unreadNotifications]);
    @endphp
    <script type="text/javascript">
        var audio = new Audio('{{asset("/sounds/notification.wav")}}');
        audio.play();
    </script>
    @endif
    @yield('scripts') 
    @livewireScripts
    <script type="text/javascript">
        var open_files_viewer = document.getElementById('open-image-selector-modal')
        open_files_viewer.addEventListener('show.bs.modal', function (event) {
            Livewire.emit('load_files');
        }); 
        $(document).on('click','.image-file',function(){
            $(this).toggleClass('active');
            $('#checkbox_file_'+$(this).attr('data-id')).attr('checked', function(_, attr){ return !attr});
        }); 
    </script>
</body>
@notifyJs

</html>