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
                        محتوى الصفحة
                    </div>
                    <div class="col-12 pt-3">
                       <textarea class="d-none" name="settings[component_content]">{{$plugin->settings['component_content']??''}}</textarea>
                        <a target="_blank" href="{{route('admin.plugins.builder-edit',['plugin'=>$plugin,'input_parameter'=>'component_content'])}}" class="btn btn-outline-primary font-1 px-3 pt-0 pb-1 rounded-0" >تعديل</a>
                    </div>
                </div>



                


                <div class="col-12 p-2">
                    <div class="col-12">
                        كلمة المرور
                    </div>
                    <div class="col-12 pt-3">
                        <input type="text" name="settings[lock_password]" class="form-control" value="{{$plugin->settings['lock_password']??''}}">
                    </div>
                </div>
                <div class="col-12 p-2">
                    <div class="col-12">
                        كود الاغلاق (ضع لكل عجلة كود مختلف)
                    </div>
                    <div class="col-12 pt-3">
                        <input type="text" name="settings[lock_id]" class="form-control" value="{{$plugin->settings['lock_id']??''}}">
                    </div>
                </div>
                <div class="col-12 p-2">
                    <div class="col-12">
                        رسالة نجاح التسجيل
                    </div>
                    <div class="col-12 pt-3">
                        <input type="text" name="settings[registeration_message]" class="form-control" value="{{$plugin->settings['registeration_message']??''}}">
                    </div>
                </div>
                <div class="col-12 py-3">
                    <div class="hr"></div>
                </div>
                <div class="col-12 p-2">
                    <div class="col-12">
                        حقل الاسم مطلوب
                    </div>
                    <div class="col-12 pt-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="settings[name_required]" value="1" role="switch" {{$plugin->settings['name_required']??0 == 1 ?'checked':''}} style="outline: none;">
                        </div>
                    </div>
                </div>
                <div class="col-12 p-2">
                    <div class="col-12">
                        عنوان حقل الاسم
                    </div>
                    <div class="col-12 pt-3">
                        <input type="text" name="settings[name_title]" class="form-control" value="{{$plugin->settings['name_title']??''}}">
                    </div>
                </div>
                <div class="col-12 py-3">
                    <div class="hr"></div>
                </div>
                <div class="col-12 p-2">
                    <div class="col-12">
                        حقل الهاتف مطلوب
                    </div>
                    <div class="col-12 pt-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="settings[phone_required]" value="1" role="switch" {{$plugin->settings['phone_required']??0 == 1 ?'checked':''}} style="outline: none;">
                        </div>
                    </div>
                </div>
                <div class="col-12 p-2">
                    <div class="col-12">
                        عنوان حقل الهاتف
                    </div>
                    <div class="col-12 pt-3">
                        <input type="text" name="settings[phone_title]" class="form-control" value="{{$plugin->settings['phone_title']??''}}">
                    </div>
                </div>
                <div class="col-12 py-3">
                    <div class="hr"></div>
                </div>
                <div class="col-12 p-2">
                    <div class="col-12">
                        حقل البريد الالكتروني مطلوب
                    </div>
                    <div class="col-12 pt-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="settings[email_required]" value="1" role="switch" {{$plugin->settings['email_required']??0 == 1 ?'checked':''}} style="outline: none;">
                        </div>
                    </div>
                </div>
                <div class="col-12 p-2">
                    <div class="col-12">
                        عنوان حقل البريد الالكتروني
                    </div>
                    <div class="col-12 pt-3">
                        <input type="text" name="settings[email_title]" class="form-control" value="{{$plugin->settings['email_title']??''}}">
                    </div>
                </div>
                <div class="col-12 py-3">
                    <div class="hr"></div>
                </div>
                <div class="col-12 p-2">
                    <div class="col-12">
                        عرض نموذج الدخول
                    </div>
                    <div class="col-12 pt-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="settings[view_password_tab]" value="1" role="switch" {{$plugin->settings['view_password_tab']??0 == 1 ?'checked':''}} style="outline: none;">
                        </div>
                    </div>
                </div>
                <div class="col-12 p-2">
                    <div class="col-12">
                        عرض نموذج التسجيل
                    </div>
                    <div class="col-12 pt-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="settings[view_registeration_tab]" value="1" role="switch" {{$plugin->settings['view_registeration_tab']??0 == 1 ?'checked':''}} style="outline: none;">
                        </div>
                    </div>
                </div>



                


            </div>
        </div>
        <div class="col-12 col-lg-12 p-2">
            <button class="btn btn-success rounded-0" id="submit-plugin">حفظ التعديلات</button>
        </div>
    </form>
</div>
