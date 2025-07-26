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
                       <textarea class="d-none" name="settings[html_content]">{{$plugin->settings['html_content']??''}}</textarea>
                        <a target="_blank" href="{{route('admin.plugins.builder-edit',['plugin'=>$plugin,'input_parameter'=>'html_content'])}}" class="btn btn-outline-primary font-1 px-3 pt-0 pb-1 rounded-0" >تعديل</a>
                    </div>
                </div>



                
                <div class="col-12 p-2">
                    <div class="col-12">
                        كود النافذة (ضع لكل نافذة كود مختلف)
                    </div>
                    <div class="col-12 pt-3">
                        <input type="text" name="settings[popup_id]" class="form-control" value="{{$plugin->settings['popup_id']??''}}">
                    </div>
                </div>

                <div class="col-12 p-2">
                    <div class="col-12">
                        عنوان النافذة
                    </div>
                    <div class="col-12 pt-3">
                        <input type="text" name="settings[title]" class="form-control" value="{{$plugin->settings['title']??''}}">
                    </div>
                </div>
                <div class="col-12 p-2">
                    <div class="col-12">
                        محتوى النافذة
                    </div>
                    <div class="col-12 pt-3">
                        <textarea name="settings[description]" class="form-control" >{{$plugin->settings['description']??''}}</textarea>
                    </div>
                </div>
                


                <div class="col-12 p-2">
                    <div class="col-12">
                        رابط الزر
                    </div>
                    <div class="col-12 pt-3">
                        <input type="text" name="settings[btn_url]" class="form-control" value="{{$plugin->settings['btn_url']??''}}">
                    </div>
                </div>
                <div class="col-12 p-2">
                    <div class="col-12">
                        نص الزر
                    </div>
                    <div class="col-12 pt-3">
                        <input type="text" name="settings[btn_text]" class="form-control" value="{{$plugin->settings['btn_text']??''}}">
                    </div>
                </div>
                <div class="col-12 p-2">
                    <div class="col-12">
                        فتح في صفحة جديدة
                    </div>
                    <div class="col-12 pt-3">
                       <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="settings[btn_url_in_new_tab]" value="1" role="switch" {{$plugin->settings['btn_url_in_new_tab']??0 == 1 ?'checked':''}} style="outline: none;">
                        </div>
                    </div>
                </div>

                <div class="col-12 p-2">
                    <div class="col-12">
                        تأخر الظهور (بالميللي ثانية)
                    </div>
                    <div class="col-12 pt-3">
                        <input type="text" name="settings[delay_to_show]" class="form-control" value="{{$plugin->settings['delay_to_show']??''}}">
                    </div>
                </div>

                <div class="col-12 p-2">
                    <div class="col-12">
                        يعاد الفتح تلقائياً بعد (بالساعات)
                    </div>
                    <div class="col-12 pt-3">
                        <input type="text" name="settings[reopen_after_hours]" class="form-control" value="{{$plugin->settings['reopen_after_hours']??''}}">
                    </div>
                </div>

                

            </div>
        </div>
        <div class="col-12 col-lg-12 p-2">
            <button class="btn btn-success rounded-0" id="submit-plugin">حفظ التعديلات</button>
        </div>
    </form>
</div>
