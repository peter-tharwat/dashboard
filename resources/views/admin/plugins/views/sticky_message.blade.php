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
                        الرسالة
                    </div>
                    <div class="col-12 pt-3">
                        <input type="text" name="settings[message]" class="form-control" value="{{$plugin->settings['message']??''}}">
                    </div>
                </div>
           
                    <div class="col-12 p-2">
                        <div class="col-12">
                            رابط الرسالة
                        </div>
                        <div class="col-12 pt-3">
                            <input type="url" name="settings[url]" class="form-control" value="{{$plugin->settings['url']??''}}">
                        </div>
                    </div>
                    <div class="col-12 p-2">
                        <div class="col-12">
                            فتح في صفحة جديدة
                        </div>
                        <div class="col-12 pt-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="settings[url_in_new_tab]" value="1" role="switch" {{$plugin->settings['url_in_new_tab']??0 == 1 ?'checked':''}} style="outline: none;">
                            </div>
                        </div>
                    </div>
             

            
                    <div class="col-12 p-2">
                        <div class="col-12">
                            اخفاء تلقائي بعد
                        </div>
                        <div class="col-12 pt-3">
                            <input type="datetime-local" name="settings[available_to]" class="form-control" value="{{$plugin->settings['available_to']??''}}">
                        </div>
                    </div>
            



             
                    <div class="col-12 p-2">
                        <div class="col-12">
                            لون الخلفية
                        </div>
                        <div class="col-12 pt-3">
                            <input type="color" name="settings[background_color]" class="form-control" value="{{$plugin->settings['background_color']??'#7b60fb'}}">
                        </div>
                    </div>
                    <div class="col-12 p-2">
                        <div class="col-12">
                            لون النص
                        </div>
                        <div class="col-12 pt-3">
                            <input type="color" name="settings[text_color]" class="form-control" value="{{$plugin->settings['text_color']??'#ffffff'}}">
                        </div>
                    </div>
               
 
                    <div class="col-12 p-2">
                        <div class="col-12">
                            نوع التأثير
                        </div>
                        <div class="col-12 pt-3">
                            <select class="form-control" name="settings[animate_type]">
                                <option value selected >بدون</option>

                                
                                <option value="animate__animated animate__headShake animate__infinite" {{($plugin->settings['animate_type']??"") == "animate__animated animate__headShake animate__infinite" ? 'selected' : ''}} >حركة يمين يسار</option>


                                <option value="animate__animated animate__slideInDown animate__infinite" {{($plugin->settings['animate_type']??"") == "animate__animated animate__slideInDown animate__infinite" ? 'selected' : ''}} >هبوط من أعلى</option>

                                <option value="animate__animated animate__slideInUp animate__infinite" {{($plugin->settings['animate_type']??"") == "animate__animated animate__slideInUp animate__infinite" ? 'selected' : ''}} >خروج من أسفل</option>

                                <option value="animate__animated animate__zoomIn animate__infinite" {{($plugin->settings['animate_type']??"") == "animate__animated animate__zoomIn animate__infinite" ? 'selected' : ''}} >تكبير</option>

                                <option value="animate__animated animate__fadeIn animate__infinite" {{($plugin->settings['animate_type']??"") == "animate__animated animate__fadeIn animate__infinite" ? 'selected' : ''}} >وميض</option>


                            </select>
                        </div>
                    </div>


                    <div class="col-12 p-2">
                        <div class="col-12">
                            نص في المنتصف
                        </div>
                        <div class="col-12 pt-3">
                           <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="settings[text_align_center]" value="1" role="switch" {{$plugin->settings['text_align_center']??0 == 1 ?'checked':''}} style="outline: none;">
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
