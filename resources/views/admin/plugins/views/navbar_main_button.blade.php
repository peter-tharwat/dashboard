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
                        نص الزر للزوار
                    </div>
                    <div class="col-12 pt-3">
                        <input type="text" name="settings[btn_text_guest]" class="form-control" value="{{$plugin->settings['btn_text_guest']??''}}">
                    </div>
                </div>
                <div class="col-12 p-2">
                    <div class="col-12">
                        رابط الزر للزوار
                    </div>
                    <div class="col-12 pt-3">
                        <input type="text" name="settings[btn_url_guest]" class="form-control" value="{{$plugin->settings['btn_url_guest']??''}}">
                    </div>
                </div>

                <div class="col-12 p-2">
                    <div class="col-12">
                        فتح في صفحة جديدة
                    </div>
                    <div class="col-12 pt-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="settings[url_in_new_tab_guest]" value="1" role="switch" {{$plugin->settings['url_in_new_tab_guest']??0 == 1 ?'checked':''}} style="outline: none;">
                        </div>
                    </div>
                </div>

                <div>
                    <div class="hr my-5"></div>
                </div>

                <div class="col-12 p-2">
                    <div class="col-12">
                        نص الزر للمستخدمين
                    </div>
                    <div class="col-12 pt-3">
                        <input type="text" name="settings[btn_text_auth]" class="form-control" value="{{$plugin->settings['btn_text_auth']??''}}">
                    </div>
                </div>
                <div class="col-12 p-2">
                    <div class="col-12">
                        رابط الزر للمستخدمين
                    </div>
                    <div class="col-12 pt-3">
                        <input type="text" name="settings[btn_url_auth]" class="form-control" value="{{$plugin->settings['btn_url_auth']??''}}">
                    </div>
                </div>

                <div class="col-12 p-2">
                    <div class="col-12">
                        فتح في صفحة جديدة
                    </div>
                    <div class="col-12 pt-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="settings[url_in_new_tab_auth]" value="1" role="switch" {{$plugin->settings['url_in_new_tab_auth']??0 == 1 ?'checked':''}} style="outline: none;">
                        </div>
                    </div>
                </div>

                <div>
                    <div class="hr my-5"></div>
                </div>

                
             
                <div class="col-12 p-2">
                        <div class="col-12">
                            شكل الزر
                        </div>
                        <div class="col-12 pt-3">
                            <select class="form-control" name="settings[btn_class]">

                                
                                <option value="btn btn-success" {{($plugin->settings['btn_class']??"") == "btn btn-success" ? 'selected' : ''}} >ناجح</option>


                                <option value="btn btn-primary" {{($plugin->settings['btn_class']??"") == "btn btn-primary" ? 'selected' : ''}} >معلومة</option>


                                 <option value="btn btn-light" {{($plugin->settings['btn_class']??"") == "btn btn-light" ? 'selected' : ''}} >خفيف</option>

                                <option value="btn btn-outline-success" {{($plugin->settings['btn_class']??"") == "btn btn-outline-success" ? 'selected' : ''}} >ناجح خارجي</option>

                                <option value="btn btn-outline-primary" {{($plugin->settings['btn_class']??"") == "btn btn-outline-primary" ? 'selected' : ''}} >معلومة خارجي</option>

                               <option value="btn btn-outline-light" {{($plugin->settings['btn_class']??"") == "btn btn-outline-light" ? 'selected' : ''}} >خفيف خارجي</option>


                            </select>
                        </div>
                    </div>

            
 
                    <div class="col-12 p-2">
                        <div class="col-12">
                            نوع التأثير
                        </div>
                        <div class="col-12 pt-3">
                            <select class="form-control" name="settings[animate_type]">
                                <option value selected >بدون</option>

                                
                                <option value="animate__animated animate__headShake" {{($plugin->settings['animate_type']??"") == "animate__animated animate__headShake" ? 'selected' : ''}} >حركة يمين يسار</option>


                                <option value="animate__animated animate__slideInDown" {{($plugin->settings['animate_type']??"") == "animate__animated animate__slideInDown" ? 'selected' : ''}} >هبوط من أعلى</option>

                                <option value="animate__animated animate__slideInUp" {{($plugin->settings['animate_type']??"") == "animate__animated animate__slideInUp" ? 'selected' : ''}} >خروج من أسفل</option>

                                <option value="animate__animated animate__zoomIn" {{($plugin->settings['animate_type']??"") == "animate__animated animate__zoomIn" ? 'selected' : ''}} >تكبير</option>

                                <option value="animate__animated animate__fadeIn" {{($plugin->settings['animate_type']??"") == "animate__animated animate__fadeIn" ? 'selected' : ''}} >وميض</option>


                            </select>
                        </div>
                    </div>
 

                    <div class="col-12 p-2">
                        <div class="col-12">
                            نوع الظهور
                        </div>
                        <div class="col-12 pt-3">
                            <select class="form-control" name="settings[visibility_type]">
                                <option value="ALL" {{($plugin->settings['visibility_type']??"") == "ALL" ? 'selected' : ''}} >للمستخدمين والزوار</option>

                                <option value="AUTH" {{($plugin->settings['visibility_type']??"") == "AUTH" ? 'selected' : ''}} >للمستخدمين</option>


                                <option value="GUEST" {{($plugin->settings['visibility_type']??"") == "GUEST" ? 'selected' : ''}} >للزوار</option>
                            </select>
                        </div>
                    </div>


            </div>
            <div class="col-12 col-lg-12 p-2">
                <button class="btn btn-success rounded-0">حفظ التعديلات</button>
            </div>
        </div>
    </form>
</div>
