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
            <div class="col-12 col-lg-6 p-2">
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
                    محتوى أعلى Navbar
                </div>
                <div class="col-12 pt-3">
                   <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="settings[top_navbar_enable]" value="1" role="switch" {{$plugin->settings['top_navbar_enable']??0 == 1 ?'checked':''}} style="outline: none;">

                        &nbsp;
                        <textarea class="d-none" name="settings[top_navbar_code]">{{$plugin->settings['top_navbar_code']??''}}</textarea>
                        <a target="_blank" href="{{route('admin.plugins.builder-edit',['website_plugin'=>$plugin,'input_parameter'=>'top_navbar_code'])}}" class="btn btn-outline-primary font-1 px-3 pt-0 pb-1 rounded-0" >تعديل</a>


                    </div>
                </div>
            </div>

            <div class="col-12 p-2">
                <div class="col-12">
                    محتوى اسفل Navbar
                </div>
                <div class="col-12 pt-3">
                   <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="settings[bottom_navbar_enable]" value="1" role="switch" {{$plugin->settings['bottom_navbar_enable']??0 == 1 ?'checked':''}} style="outline: none;">

                        &nbsp;
                        <textarea class="d-none" name="settings[bottom_navbar_code]">{{$plugin->settings['bottom_navbar_code']??''}}</textarea>
                        <a target="_blank" href="{{route('admin.plugins.builder-edit',['website_plugin'=>$plugin,'input_parameter'=>'bottom_navbar_code'])}}" class="btn btn-outline-primary font-1 px-3 pt-0 pb-1 rounded-0" >تعديل</a>


                    </div>
                </div>
            </div>




            <div class="col-12 p-2">
                <div class="col-12">
                    محتوى أعلى Footer
                </div>
                <div class="col-12 pt-3">
                   <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="settings[top_footer_enable]" value="1" role="switch" {{$plugin->settings['top_footer_enable']??0 == 1 ?'checked':''}} style="outline: none;">

                        &nbsp;
                        <textarea class="d-none" name="settings[top_footer_code]" >{{$plugin->settings['top_footer_code']??''}}</textarea>
                        <a target="_blank" href="{{route('admin.plugins.builder-edit',['website_plugin'=>$plugin,'input_parameter'=>'top_footer_code'])}}" class="btn btn-outline-primary font-1 px-3 pt-0 pb-1 rounded-0" >تعديل</a>


                    </div>
                </div>
            </div>

            <div class="col-12 p-2">
                <div class="col-12">
                    محتوى اسفل Footer
                </div>
                <div class="col-12 pt-3">
                   <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="settings[bottom_footer_enable]" value="1" role="switch" {{$plugin->settings['bottom_footer_enable']??0 == 1 ?'checked':''}} style="outline: none;">

                        &nbsp;
                        <textarea class="d-none" name="settings[bottom_footer_code]" >{{$plugin->settings['bottom_footer_code']??''}}</textarea>
                        <a target="_blank" href="{{route('admin.plugins.builder-edit',['website_plugin'=>$plugin,'input_parameter'=>'bottom_footer_code'])}}" class="btn btn-outline-primary font-1 px-3 pt-0 pb-1 rounded-0" >تعديل</a>


                    </div>
                </div>
            </div>


 



 



            <div class="col-12 col-lg-12 p-2">
                <button class="btn btn-success rounded-0">حفظ التعديلات</button>
            </div>
        </div>
    </form>
</div>
