<div class="col-12 p-0" style="max-width: 100%;">
    <form method="POST" action="{{route('admin.plugins.update',['plugin'=>$plugin])}}">
        @method("PUT")
        @csrf
        <h5><img src="{{collect(config()->get('plugins'))->where('slug',$plugin->slug)->first()['image']}}" style="width: 15px;"> {{collect(config()->get('plugins'))->where('slug',$plugin->slug)->first()['title']}}</h5>
        <p>{{ mb_strimwidth(collect(config()->get('plugins'))->where('slug',$plugin->slug)->first()['description'],0,80,'...')}}</p>
        <div class="col-12 my-3">
            <div class="hr"></div>
        </div>
        <div class="col-12 p-0">
            <div class="col-12 p-0">
                <div class="col-12 col-lg-12 p-2">
                    <div class="col-12">
                        تفعيل الاضافة
                    </div>
                    <div class="col-12 pt-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="activated" value="1" role="switch" {{old('activated',$plugin??1) == 1 ?'checked':''}} style="outline: none;">
                        </div>
                    </div>
                </div>

                <div class="col-12 p-2">
                    <div class="col-12">
                        رقم واتس آب
                    </div>
                    <div class="col-12 pt-3">
                        <input type="text" name="settings[whatsapp_number]" class="form-control" value="{{$plugin->settings['whatsapp_number']??''}}">
                    </div>
                </div>


                @php
                    $code = \MainHelper::generate_whatsapp_qr_code($plugin->id??"");
                @endphp

             


                @if(isset($code))
                @if(isset($code['qr_code']))
                <div class="col-12 p-2">
                    <div class="col-12 text-center">
                        قم بفتح تطبيق واتس آب ومسح الرمز واضغط حفظ بعد ذلك
                    </div>
                    <div class="col-12 pt-3 text-center">
                        <img src="{{$code['qr_code']}}" style="width:300px;max-width:90%">
                    </div>
                </div>




                @endif
                @if(isset($code['active']))
                @php
                cache()->forget('whatsapp_qr_code_plugin_'.$plugin->id);
                @endphp
                <div class="col-12 p-2">
                    <div class="col-12">
                        متصل بالفعل
                    </div>
                    <div class="col-12 pt-3">
                        <span class="fas fa-check-circle text-success font-12"></span>
                    </div>
                </div>
                @endif
                @else

                <div class="col-12 p-2">
                    <div class="col-12">
                        حالة التحميل
                    </div>
                    <div class="col-12 pt-3">
                        <span class="fas fa-times text-danger"></span> فشل تحميل الاضافة
                    </div>
                </div>

                @endif

                <div class="col-12 p-2">
                    <div class="col-12">
                        استخدام لتأكيد الحسابات
                    </div>
                    <div class="col-12 pt-3">
                       <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="settings[use_for_account_confirmation]" value="1" role="switch" {{$plugin->settings['use_for_account_confirmation']??0 == 1 ?'checked':''}} style="outline: none;">
                        </div>
                    </div>
                </div>

                <div class="col-12 p-2">
                    <div class="col-12">
                        استخدام لتأكيد الطلبات
                    </div>
                    <div class="col-12 pt-3">
                       <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="settings[use_for_order_confirmation]" value="1" role="switch" {{$plugin->settings['use_for_order_confirmation']??0 == 1 ?'checked':''}} style="outline: none;">
                        </div>
                    </div>
                </div>

                <div class="col-12 p-2">
                    <div class="col-12">
                        استخدام للرسائل الجماعية
                    </div>
                    <div class="col-12 pt-3">
                       <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="settings[use_for_campaign_messages]" value="1" role="switch" {{$plugin->settings['use_for_campaign_messages']??0 == 1 ?'checked':''}} style="outline: none;">
                        </div>
                    </div>
                </div>
                



            </div>
            <div class="col-12 col-lg-12 p-2">
                <button class="btn btn-success rounded-0">حفظ التعديلات</button>
            </div>
        </div>
    </form>

    <div class="col-12 px-2">
        <form method="POST" action="{{route('admin.website.plugins.push',['plugin'=>$plugin])}}">
        @csrf
        <button class="btn btn-outline-danger rounded-0 font-small" onclick="var result = confirm('هل أنت متأكد');if(result){}else{event.preventDefault()}" style="color: #ff5454!important;border-color: #ff5454;" >تسجيل خروج</button>
        </form>
    </div>
</div>
