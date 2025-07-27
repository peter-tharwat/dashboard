@extends('layouts.app',['page_title'=>"مغلق"])
@section('content')
<style>
    .main-nav,.mobile-bottom-nav,footer,.copy-rights-footer{
        display:none!important;
    }
    body{
        overflow:hidden;
    }
</style>
<div class="col-12 p-0 d-flex align-items-center justify-content-center row" style="min-height: 100dvh;">
    <div class="col-12 p-0">
        @php
        $lock_site_with_password = $website->plugins->where('activated',1)->where('slug','lock_site_with_password')->first();
        @endphp
        @if($lock_site_with_password != null)
        <div class="col-12 p-0">
            @if(isset($website) && isset($website) && $lock_site_with_password_component_content = data_get($lock_site_with_password->settings,'component_content',null) )
            @if(isset($lock_site_with_password_component_content))
            @if(is_countable(json_decode($lock_site_with_password_component_content,true)))
            @foreach(\MainHelper::arrayToObject(json_decode($lock_site_with_password_component_content,true)) as $component)
            @include('components.component-render',['component'=>$component])
            @endforeach
            @endif
            @endif
            @endif
        </div>
  
            <div class="col-12 p-0">
                <div class="col-12 p-0 row">
                    <div class="col-12 p-0">
                        <div class="col-12 p-3">
                            <div class="col-12 col-lg-6 mx-auto p-0">
                                <nav style="background: rgb(217, 226, 239) !important; border-radius: 5px;">
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">


                                        @if(data_get($lock_site_with_password->settings,'view_registeration_tab',false))
                                        <div class="col p-1"><button class=" active col-12 text-center nav-link" id="content-tab" data-bs-toggle="tab" data-bs-target="#nav-form" type="button" role="tab" aria-controls="nav-form" aria-selected="true" style="padding: 10px 5px; border-radius: 5px;">تسجيل</button></div>
                                        @endif

                                        @if(data_get($lock_site_with_password->settings,'view_password_tab',false))
                                        <div class="col p-1"><button class=" @if(!data_get($lock_site_with_password->settings,'view_registeration_tab',false)) active @endif col-12 text-center nav-link" id="design-tab" data-bs-toggle="tab" data-bs-target="#nav-password" type="button" role="tab" aria-controls="nav-password" aria-selected="false" style="padding: 10px 5px; border-radius: 5px;" tabindex="-1">دخول</button></div>
                                        @endif
                                    </div>
                                </nav>
                            </div>
                            <div class="tab-content col-12 col-lg-6 mx-auto px-0 m-0" id="nav-tabContent">
                                @if(data_get($lock_site_with_password->settings,'view_registeration_tab',false))
                                <div class="show active tab-pane fade" id="nav-form" role="tabpanel" aria-labelledby="content-tab">
                                    <form method="POST" action="{{route('website.plugin.notify',false)}}" id="lock_site_with_password">
                                        <input type="hidden" name="plugin" value="lock_site_with_password">
                                        <input type="hidden" name="type" value="register">
                                        @csrf
                                        <div class="col-12 py-2 px-0">
                                            <div class="col-12 mx-auto p-0">
                                                @if($lock_site_with_password->settings['name_required']??0==1)
                                                <input class="form-control my-2" required type="text" minlength="2" name="name" placeholder="{{$lock_site_with_password->settings['name_title']}}" style="border-color: #ababab;direction: rtl!important">
                                                @endif
                                                @if($lock_site_with_password->settings['phone_required']??0==1)
                                                <input class="form-control my-2" required type="number" min="999999" name="phone" placeholder="{{$lock_site_with_password->settings['phone_title']}}" style="border-color: #ababab;direction: rtl!important">
                                                @endif
                                                @if($lock_site_with_password->settings['email_required']??0==1)
                                                <input class="form-control my-2" required type="email" name="email" placeholder="{{$lock_site_with_password->settings['email_title']}}" style="border-color: #ababab;direction: rtl!important">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12 py-0 px-0">
                                            <button class="btn  btn-success font-2 py-1 rounded d-inline-block" id="lock_site_with_password_spin_btn" >تسجيل</button>
                                        </div>
                                    </form>
                                </div>
                                @endif
                                @if(data_get($lock_site_with_password->settings,'view_password_tab',false))
                                <div class="tab-pane fade" id="nav-password" role="tabpanel" aria-labelledby="design-tab">

                                    <form method="POST" action="{{route('website.plugin.notify',false)}}" id="lock_site_with_password_password">
                                        <input type="hidden" name="plugin" value="lock_site_with_password">
                                        <input type="hidden" name="type" value="password">
                                        @csrf
                                        <div class="col-12 py-2 px-0">
                                            
                                        
                                        <input class="form-control my-2" required type="text" name="password" placeholder="كلمة المرور" style="border-color: #ababab;direction: rtl!important">
                                        <div class="col-12 py-0 px-0">
                                                <button class="btn  btn-success font-2 py-1 rounded d-inline-block" id="lock_site_with_password_spin_btn" >دخول</button>
                                        </div>
                                        </div>
                                    </form>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       
    </div>
    @endif
</div>
{{-- <div style="width:100%;height:100dvh;position:fixed;right:0px;z-index:100000000000;display:flex;background:#fff;justify-content:center;align-items:center">
    <div class="container text-center"><img src="https://i.ibb.co/tBgVwSz/light-bulb-1.png" style="width:200px;max-width: 80%;">
        <h1 class="text-center">لحظة من فضلك!</h1>
        <p class="text-center">موقعنا تحت الصيانة بشكل مؤقت حالياً وسنعود بمجرد الانتهاء من عملية الصيانة</p>
    </div>
</div> --}}
@endsection
