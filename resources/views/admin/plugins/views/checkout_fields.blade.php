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
                <div class="col-12 py-3">
                    <div class="hr"></div>
                </div>
                <div class="col-12 pt-4 pb-3">
                    اسم العميل : 
                    <input type="hidden" name="settings[fields][shipping_name][field_key]" value="shipping_name">
                </div>
                <div class="col-12 p-2">
                    <div class="col-12">
                        اسم الخانة
                    </div>
                    <div class="col-12 pt-3">
                        <input type="text" name="settings[fields][shipping_name][field_title]" class="form-control" value="{{$plugin->settings['fields']['shipping_name']['field_title']??''}}">
                    </div>
                </div>
                <div class="col-12 p-0 row">
                    <div class="col-12 p-2">
                        <div class="col-12">
                            الرسالة المساعدة
                        </div>
                        <div class="col-12 pt-3">
                            <input type="text" name="settings[fields][shipping_name][placeholder]" class="form-control" value="{{$plugin->settings['fields']['shipping_name']['placeholder']??''}}">
                        </div>
                    </div>
                    
                </div>
                <div class="col-12 p-0 row">
                    <div class="col-6 p-2">
                        <div class="col-12">
                            تفعيل الخانة
                        </div>
                        <div class="col-12 pt-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="settings[fields][shipping_name][enabled]" value="1" role="switch" {{$plugin->settings['fields']['shipping_name']['enabled']??0 == 1 ?'checked':''}} style="outline: none;">
                            </div>
                        </div>
                    </div>
                    <div class="col-6 p-2">
                        <div class="col-12">
                            الخانة مطلوبة
                        </div>
                        <div class="col-12 pt-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="settings[fields][shipping_name][required]" value="1" role="switch" {{$plugin->settings['fields']['shipping_name']['required']??0 == 1 ?'checked':''}} style="outline: none;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 p-0 row">
                    <div class="col-6 p-2">
                        <div class="col-12">
                            المساحة
                        </div>
                        <div class="col-12 pt-3">
                            <select class="form-control" name="settings[fields][shipping_name][class]">
                                <option value="col-12" {{$plugin->settings['fields']['shipping_name']['class']=="col-12"?'selected':''}}>مساحة كاملة</option>
                                <option value="col-6" {{$plugin->settings['fields']['shipping_name']['class']=="col-6"?'selected':''}}>نصف مساحة</option>
                                <option value="col-12 col-lg-6" {{$plugin->settings['fields']['shipping_name']['class']=="col-12 col-lg-6"?'selected':''}}>نصف مساحة على الهاتف ومساحة كاملة على الحاسوب</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6 p-2">
                        <div class="col-12">
                            الترتيب
                        </div>
                        <div class="col-12 pt-3">
                            <input type="number" name="settings[fields][shipping_name][sort]" class="form-control" value="{{$plugin->settings['fields']['shipping_name']['sort']??1}}" min="0" max="8" required>
                        </div>
                    </div>
                </div>








                <div class="col-12 py-3">
                    <div class="hr"></div>
                </div>
                <div class="col-12 pt-4 pb-3">
                    رقم الهاتف :
                    <input type="hidden" name="settings[fields][shipping_phone][field_key]" value="shipping_phone">
                </div>
                <div class="col-12 p-2">
                    <div class="col-12">
                        اسم الخانة
                    </div>
                    <div class="col-12 pt-3">
                        <input type="text" name="settings[fields][shipping_phone][field_title]" class="form-control" value="{{$plugin->settings['fields']['shipping_phone']['field_title']??''}}">
                    </div>
                </div>
                <div class="col-12 p-0 row">
                    <div class="col-12 p-2">
                        <div class="col-12">
                            الرسالة المساعدة
                        </div>
                        <div class="col-12 pt-3">
                            <input type="text" name="settings[fields][shipping_phone][placeholder]" class="form-control" value="{{$plugin->settings['fields']['shipping_phone']['placeholder']??''}}">
                        </div>
                    </div>
                    
                </div>
                <div class="col-12 p-0 row">
                    <div class="col-6 p-2">
                        <div class="col-12">
                            تفعيل الخانة
                        </div>
                        <div class="col-12 pt-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="settings[fields][shipping_phone][enabled]" value="1" role="switch" {{$plugin->settings['fields']['shipping_phone']['enabled']??0 == 1 ?'checked':''}} style="outline: none;">
                            </div>
                        </div>
                    </div>
                    <div class="col-6 p-2">
                        <div class="col-12">
                            الخانة مطلوبة
                        </div>
                        <div class="col-12 pt-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="settings[fields][shipping_phone][required]" value="1" role="switch" {{$plugin->settings['fields']['shipping_phone']['required']??0 == 1 ?'checked':''}} style="outline: none;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 p-0 row">
                    <div class="col-6 p-2">
                        <div class="col-12">
                            المساحة
                        </div>
                        <div class="col-12 pt-3">
                            <select class="form-control" name="settings[fields][shipping_phone][class]">
                                <option value="col-12" {{$plugin->settings['fields']['shipping_phone']['class']=="col-12"?'selected':''}}>مساحة كاملة</option>
                                <option value="col-6" {{$plugin->settings['fields']['shipping_phone']['class']=="col-6"?'selected':''}}>نصف مساحة</option>
                                <option value="col-12 col-lg-6" {{$plugin->settings['fields']['shipping_phone']['class']=="col-12 col-lg-6"?'selected':''}}>نصف مساحة على الهاتف ومساحة كاملة على الحاسوب</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6 p-2">
                        <div class="col-12">
                            الترتيب
                        </div>
                        <div class="col-12 pt-3">
                            <input type="number" name="settings[fields][shipping_phone][sort]" class="form-control" value="{{$plugin->settings['fields']['shipping_phone']['sort']??2}}" min="0" max="8" required>
                        </div>
                    </div>
                </div>



                <div class="col-12 py-3">
                    <div class="hr"></div>
                </div>
                <div class="col-12 pt-4 pb-3">
                    رقم الهاتف الاحتياطي :

                    <input type="hidden" name="settings[fields][shipping_spare_phone][field_key]" value="shipping_spare_phone">

                </div>
                <div class="col-12 p-2">
                    <div class="col-12">
                        اسم الخانة
                    </div>
                    <div class="col-12 pt-3">
                        <input type="text" name="settings[fields][shipping_spare_phone][field_title]" class="form-control" value="{{$plugin->settings['fields']['shipping_spare_phone']['field_title']??''}}">
                    </div>
                </div>
                <div class="col-12 p-0 row">
                    <div class="col-12 p-2">
                        <div class="col-12">
                            الرسالة المساعدة
                        </div>
                        <div class="col-12 pt-3">
                            <input type="text" name="settings[fields][shipping_spare_phone][placeholder]" class="form-control" value="{{$plugin->settings['fields']['shipping_spare_phone']['placeholder']??''}}">
                        </div>
                    </div>
                    
                </div>
                <div class="col-12 p-0 row">
                    <div class="col-6 p-2">
                        <div class="col-12">
                            تفعيل الخانة
                        </div>
                        <div class="col-12 pt-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="settings[fields][shipping_spare_phone][enabled]" value="1" role="switch" {{$plugin->settings['fields']['shipping_spare_phone']['enabled']??0 == 1 ?'checked':''}} style="outline: none;">
                            </div>
                        </div>
                    </div>
                    <div class="col-6 p-2">
                        <div class="col-12">
                            الخانة مطلوبة
                        </div>
                        <div class="col-12 pt-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="settings[fields][shipping_spare_phone][required]" value="1" role="switch" {{$plugin->settings['fields']['shipping_spare_phone']['required']??0 == 1 ?'checked':''}} style="outline: none;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 p-0 row">
                    <div class="col-6 p-2">
                        <div class="col-12">
                            المساحة
                        </div>
                        <div class="col-12 pt-3">
                            <select class="form-control" name="settings[fields][shipping_spare_phone][class]">
                                <option value="col-12" {{$plugin->settings['fields']['shipping_spare_phone']['class']=="col-12"?'selected':''}}>مساحة كاملة</option>
                                <option value="col-6" {{$plugin->settings['fields']['shipping_spare_phone']['class']=="col-6"?'selected':''}}>نصف مساحة</option>
                                <option value="col-12 col-lg-6" {{$plugin->settings['fields']['shipping_spare_phone']['class']=="col-12 col-lg-6"?'selected':''}}>نصف مساحة على الهاتف ومساحة كاملة على الحاسوب</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6 p-2">
                        <div class="col-12">
                            الترتيب
                        </div>
                        <div class="col-12 pt-3">
                            <input type="number" name="settings[fields][shipping_spare_phone][sort]" class="form-control" value="{{$plugin->settings['fields']['shipping_spare_phone']['sort']??3}}" min="0" max="8" required>
                        </div>
                    </div>
                </div>
                <div class="col-12 py-3">
                    <div class="hr"></div>
                </div>
                <div class="col-12 pt-4 pb-3">
                    البريد الالكتروني :

                    <input type="hidden" name="settings[fields][shipping_email][field_key]" value="shipping_email">

                </div>
                <div class="col-12 p-2">
                    <div class="col-12">
                        اسم الخانة
                    </div>
                    <div class="col-12 pt-3">
                        <input type="text" name="settings[fields][shipping_email][field_title]" class="form-control" value="{{$plugin->settings['fields']['shipping_email']['field_title']??''}}">
                    </div>
                </div>
                <div class="col-12 p-0 row">
                    <div class="col-12 p-2">
                        <div class="col-12">
                            الرسالة المساعدة
                        </div>
                        <div class="col-12 pt-3">
                            <input type="text" name="settings[fields][shipping_email][placeholder]" class="form-control" value="{{$plugin->settings['fields']['shipping_email']['placeholder']??''}}">
                        </div>
                    </div>
                    
                </div>
                <div class="col-12 p-0 row">
                    <div class="col-6 p-2">
                        <div class="col-12">
                            تفعيل الخانة
                        </div>
                        <div class="col-12 pt-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="settings[fields][shipping_email][enabled]" value="1" role="switch" {{$plugin->settings['fields']['shipping_email']['enabled']??0 == 1 ?'checked':''}} style="outline: none;">
                            </div>
                        </div>
                    </div>
                    <div class="col-6 p-2">
                        <div class="col-12">
                            الخانة مطلوبة
                        </div>
                        <div class="col-12 pt-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="settings[fields][shipping_email][required]" value="1" role="switch" {{$plugin->settings['fields']['shipping_email']['required']??0 == 1 ?'checked':''}} style="outline: none;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 p-0 row">
                    <div class="col-6 p-2">
                        <div class="col-12">
                            المساحة
                        </div>
                        <div class="col-12 pt-3">
                            <select class="form-control" name="settings[fields][shipping_email][class]">
                                <option value="col-12" {{$plugin->settings['fields']['shipping_email']['class']=="col-12"?'selected':''}}>مساحة كاملة</option>
                                <option value="col-6" {{$plugin->settings['fields']['shipping_email']['class']=="col-6"?'selected':''}}>نصف مساحة</option>
                                <option value="col-12 col-lg-6" {{$plugin->settings['fields']['shipping_email']['class']=="col-12 col-lg-6"?'selected':''}}>نصف مساحة على الهاتف ومساحة كاملة على الحاسوب</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6 p-2">
                        <div class="col-12">
                            الترتيب
                        </div>
                        <div class="col-12 pt-3">
                            <input type="number" name="settings[fields][shipping_email][sort]" class="form-control" value="{{$plugin->settings['fields']['shipping_email']['sort']??4}}" min="0" max="8" required>
                        </div>
                    </div>
                </div>



                <div class="col-12 py-3">
                    <div class="hr"></div>
                </div>
                <div class="col-12 pt-4 pb-3">
                    الدولة :

                    <input type="hidden" name="settings[fields][shipping_country][field_key]" value="shipping_country">

                </div>
                <div class="col-12 p-2">
                    <div class="col-12">
                        اسم الخانة
                    </div>
                    <div class="col-12 pt-3">
                        <input type="text" name="settings[fields][shipping_country][field_title]" class="form-control" value="{{$plugin->settings['fields']['shipping_country']['field_title']??''}}">
                    </div>
                </div>
                <div class="col-12 p-0 row">
                    <div class="col-12 p-2">
                        <div class="col-12">
                            الرسالة المساعدة
                        </div>
                        <div class="col-12 pt-3">
                            <input type="text" name="settings[fields][shipping_country][placeholder]" class="form-control" value="{{$plugin->settings['fields']['shipping_country']['placeholder']??''}}">
                        </div>
                    </div>
                    
                </div>
                <div class="col-12 p-0 row">
                    <div class="col-6 p-2">
                        <div class="col-12">
                            تفعيل الخانة
                        </div>
                        <div class="col-12 pt-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="settings[fields][shipping_country][enabled]" value="1" role="switch" {{$plugin->settings['fields']['shipping_country']['enabled']??0 == 1 ?'checked':''}} style="outline: none;">
                            </div>
                        </div>
                    </div>
                    <div class="col-6 p-2">
                        <div class="col-12">
                            الخانة مطلوبة
                        </div>
                        <div class="col-12 pt-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="settings[fields][shipping_country][required]" value="1" role="switch" {{$plugin->settings['fields']['shipping_country']['required']??0 == 1 ?'checked':''}} style="outline: none;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 p-0 row">
                    <div class="col-6 p-2">
                        <div class="col-12">
                            المساحة
                        </div>
                        <div class="col-12 pt-3">
                            <select class="form-control" name="settings[fields][shipping_country][class]">
                                <option value="col-12" {{$plugin->settings['fields']['shipping_country']['class']=="col-12"?'selected':''}}>مساحة كاملة</option>
                                <option value="col-6" {{$plugin->settings['fields']['shipping_country']['class']=="col-6"?'selected':''}}>نصف مساحة</option>
                                <option value="col-12 col-lg-6" {{$plugin->settings['fields']['shipping_country']['class']=="col-12 col-lg-6"?'selected':''}}>نصف مساحة على الهاتف ومساحة كاملة على الحاسوب</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6 p-2">
                        <div class="col-12">
                            الترتيب
                        </div>
                        <div class="col-12 pt-3">
                            <input type="number" name="settings[fields][shipping_country][sort]" class="form-control" value="{{$plugin->settings['fields']['shipping_country']['sort']??5}}" min="0" max="8" required>
                        </div>
                    </div>
                </div>

                <div class="col-12 py-3">
                    <div class="hr"></div>
                </div>
                <div class="col-12 pt-4 pb-3">
                    المحافظة :

                    <input type="hidden" name="settings[fields][shipping_city][field_key]" value="shipping_city">

                </div>
                <div class="col-12 p-2">
                    <div class="col-12">
                        اسم الخانة
                    </div>
                    <div class="col-12 pt-3">
                        <input type="text" name="settings[fields][shipping_city][field_title]" class="form-control" value="{{$plugin->settings['fields']['shipping_city']['field_title']??''}}">
                    </div>
                </div>
                <div class="col-12 p-0 row">
                    <div class="col-12 p-2">
                        <div class="col-12">
                            الرسالة المساعدة
                        </div>
                        <div class="col-12 pt-3">
                            <input type="text" name="settings[fields][shipping_city][placeholder]" class="form-control" value="{{$plugin->settings['fields']['shipping_city']['placeholder']??''}}">
                        </div>
                    </div>
                    
                </div>
                <div class="col-12 p-0 row">
                    <div class="col-6 p-2">
                        <div class="col-12">
                            تفعيل الخانة
                        </div>
                        <div class="col-12 pt-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="settings[fields][shipping_city][enabled]" value="1" role="switch" {{$plugin->settings['fields']['shipping_city']['enabled']??0 == 1 ?'checked':''}} style="outline: none;">
                            </div>
                        </div>
                    </div>
                    <div class="col-6 p-2">
                        <div class="col-12">
                            الخانة مطلوبة
                        </div>
                        <div class="col-12 pt-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="settings[fields][shipping_city][required]" value="1" role="switch" {{$plugin->settings['fields']['shipping_city']['required']??0 == 1 ?'checked':''}} style="outline: none;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 p-0 row">
                    <div class="col-6 p-2">
                        <div class="col-12">
                            المساحة
                        </div>
                        <div class="col-12 pt-3">
                            <select class="form-control" name="settings[fields][shipping_city][class]">
                                <option value="col-12" {{$plugin->settings['fields']['shipping_city']['class']=="col-12"?'selected':''}}>مساحة كاملة</option>
                                <option value="col-6" {{$plugin->settings['fields']['shipping_city']['class']=="col-6"?'selected':''}}>نصف مساحة</option>
                                <option value="col-12 col-lg-6" {{$plugin->settings['fields']['shipping_city']['class']=="col-12 col-lg-6"?'selected':''}}>نصف مساحة على الهاتف ومساحة كاملة على الحاسوب</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6 p-2">
                        <div class="col-12">
                            الترتيب
                        </div>
                        <div class="col-12 pt-3">
                            <input type="number" name="settings[fields][shipping_city][sort]" class="form-control" value="{{$plugin->settings['fields']['shipping_city']['sort']??6}}" min="0" max="8" required>
                        </div>
                    </div>
                </div>
 




                <div class="col-12 py-3">
                    <div class="hr"></div>
                </div>
                <div class="col-12 pt-4 pb-3">
                    العنوان :

                    <input type="hidden" name="settings[fields][shipping_address][field_key]" value="shipping_address">

                </div>
                <div class="col-12 p-2">
                    <div class="col-12">
                        اسم الخانة
                    </div>
                    <div class="col-12 pt-3">
                        <input type="text" name="settings[fields][shipping_address][field_title]" class="form-control" value="{{$plugin->settings['fields']['shipping_address']['field_title']??''}}">
                    </div>
                </div>
                <div class="col-12 p-0 row">
                    <div class="col-12 p-2">
                        <div class="col-12">
                            الرسالة المساعدة
                        </div>
                        <div class="col-12 pt-3">
                            <input type="text" name="settings[fields][shipping_address][placeholder]" class="form-control" value="{{$plugin->settings['fields']['shipping_address']['placeholder']??''}}">
                        </div>
                    </div>
                    
                </div>
                <div class="col-12 p-0 row">
                    <div class="col-6 p-2">
                        <div class="col-12">
                            تفعيل الخانة
                        </div>
                        <div class="col-12 pt-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="settings[fields][shipping_address][enabled]" value="1" role="switch" {{$plugin->settings['fields']['shipping_address']['enabled']??0 == 1 ?'checked':''}} style="outline: none;">
                            </div>
                        </div>
                    </div>
                    <div class="col-6 p-2">
                        <div class="col-12">
                            الخانة مطلوبة
                        </div>
                        <div class="col-12 pt-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="settings[fields][shipping_address][required]" value="1" role="switch" {{$plugin->settings['fields']['shipping_address']['required']??0 == 1 ?'checked':''}} style="outline: none;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 p-0 row">
                    <div class="col-6 p-2">
                        <div class="col-12">
                            المساحة
                        </div>
                        <div class="col-12 pt-3">
                            <select class="form-control" name="settings[fields][shipping_address][class]">
                                <option value="col-12" {{$plugin->settings['fields']['shipping_address']['class']=="col-12"?'selected':''}}>مساحة كاملة</option>
                                <option value="col-6" {{$plugin->settings['fields']['shipping_address']['class']=="col-6"?'selected':''}}>نصف مساحة</option>
                                <option value="col-12 col-lg-6" {{$plugin->settings['fields']['shipping_address']['class']=="col-12 col-lg-6"?'selected':''}}>نصف مساحة على الهاتف ومساحة كاملة على الحاسوب</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6 p-2">
                        <div class="col-12">
                            الترتيب
                        </div>
                        <div class="col-12 pt-3">
                            <input type="number" name="settings[fields][shipping_address][sort]" class="form-control" value="{{$plugin->settings['fields']['shipping_address']['sort']??7}}" min="0" max="8" required>
                        </div>
                    </div>
                </div>




                <div class="col-12 py-3">
                    <div class="hr"></div>
                </div>
                <div class="col-12 pt-4 pb-3">
                    ملاحظات :
                    <input type="hidden" name="settings[fields][notes_from_client][field_key]" value="notes_from_client">

                </div>
                <div class="col-12 p-2">
                    <div class="col-12">
                        اسم الخانة
                    </div>
                    <div class="col-12 pt-3">
                        <input type="text" name="settings[fields][notes_from_client][field_title]" class="form-control" value="{{$plugin->settings['fields']['notes_from_client']['field_title']??''}}">
                    </div>
                </div>
                <div class="col-12 p-0 row">
                    <div class="col-12 p-2">
                        <div class="col-12">
                            الرسالة المساعدة
                        </div>
                        <div class="col-12 pt-3">
                            <input type="text" name="settings[fields][notes_from_client][placeholder]" class="form-control" value="{{$plugin->settings['fields']['notes_from_client']['placeholder']??''}}">
                        </div>
                    </div>
                    
                </div>
                <div class="col-12 p-0 row">
                    <div class="col-6 p-2">
                        <div class="col-12">
                            تفعيل الخانة
                        </div>
                        <div class="col-12 pt-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="settings[fields][notes_from_client][enabled]" value="1" role="switch" {{$plugin->settings['fields']['notes_from_client']['enabled']??0 == 1 ?'checked':''}} style="outline: none;">
                            </div>
                        </div>
                    </div>
                    <div class="col-6 p-2">
                        <div class="col-12">
                            الخانة مطلوبة
                        </div>
                        <div class="col-12 pt-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="settings[fields][notes_from_client][required]" value="1" role="switch" {{$plugin->settings['fields']['notes_from_client']['required']??0 == 1 ?'checked':''}} style="outline: none;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 p-0 row">
                    <div class="col-6 p-2">
                        <div class="col-12">
                            المساحة
                        </div>
                        <div class="col-12 pt-3">
                            <select class="form-control" name="settings[fields][notes_from_client][class]">
                                <option value="col-12" {{$plugin->settings['fields']['notes_from_client']['class']=="col-12"?'selected':''}}>مساحة كاملة</option>
                                <option value="col-6" {{$plugin->settings['fields']['notes_from_client']['class']=="col-6"?'selected':''}}>نصف مساحة</option>
                                <option value="col-12 col-lg-6" {{$plugin->settings['fields']['notes_from_client']['class']=="col-12 col-lg-6"?'selected':''}}>نصف مساحة على الهاتف ومساحة كاملة على الحاسوب</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6 p-2">
                        <div class="col-12">
                            الترتيب
                        </div>
                        <div class="col-12 pt-3">
                            <input type="number" name="settings[fields][notes_from_client][sort]" class="form-control" value="{{$plugin->settings['fields']['notes_from_client']['sort']??8}}" min="0" max="8" required>
                        </div>
                    </div>
                </div>





            </div>
            <div class="col-12 col-lg-12 p-2">
                <button class="btn btn-success rounded-0">حفظ التعديلات</button>
            </div>
        </div>
    </form>
</div>
