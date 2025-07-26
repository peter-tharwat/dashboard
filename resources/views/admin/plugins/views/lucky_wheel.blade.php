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
                        عنوان عجلة الحظ
                    </div>
                    <div class="col-12 pt-3">
                        <input type="text" name="settings[title]" class="form-control" value="{{$plugin->settings['title']??''}}">
                    </div>
                </div>
                <div class="col-12 p-2">
                    <div class="col-12">
                        كود عجلة الحظ (ضع لكل عجلة كود مختلف)
                    </div>
                    <div class="col-12 pt-3">
                        <input type="text" name="settings[id]" class="form-control" value="{{$plugin->settings['id']??''}}">
                    </div>
                </div>

                <div class="col-12 p-2">
                    <div class="col-12">
                        اخفائها بعد استخدامها لمدة كم ساعة؟
                    </div>
                    <div class="col-12 pt-3">
                        <input type="number" step="0.00001" name="settings[hide_in_browser_for_hours]" class="form-control" value="{{$plugin->settings['hide_in_browser_for_hours']??''}}">
                    </div>
                </div>
                <div class="col-12 p-2">
                    <div class="col-12">
                        لون العجلة
                    </div>
                    <div class="col-12 pt-3">
                        <input type="color"  name="settings[wheel_color]" class="form-control" value="{{$plugin->settings['wheel_color']??''}}">
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
                <div class="col-12 p-0" style="overflow: auto;">
                    
                
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>كود</th>
                            <th>العنوان</th>
                            <th>كوبون الخصم</th>
                            <th>نسبة الظهور</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @for($i=0;$i<10;$i++)
                        <tr>
                            <td>{{$plugin->settings['fields'][$i]['id']??$i+1}} <input style="padding-right: 0px;padding-left: 0px;width: 30px;text-align: center;" type="hidden"  class="form-control" name="settings[fields][{{$i}}][id]" value="{{$plugin->settings['fields'][$i]['id']??$i+1}}"></td>
                            <td><input type="text" class="form-control" name="settings[fields][{{$i}}][title]" value="{{$plugin->settings['fields'][$i]['title']??''}}"></td>
                            <td><input type="text"  class="form-control" name="settings[fields][{{$i}}][coupon]" value="{{$plugin->settings['fields'][$i]['coupon']??''}}"></td>
                            <td><input style="width: 100px" type="number" step="0.0000001" class="form-control" name="settings[fields][{{$i}}][percentage]" value="{{$plugin->settings['fields'][$i]['percentage']??''}}"></td>
                            
                        </tr>
                        @endfor
                    </tbody>
                </table>
                </div>


                
           
                    

               






            </div>
            <div class="col-12 col-lg-12 p-2">
                <button class="btn btn-success rounded-0">حفظ التعديلات</button>
            </div>
        </div>
    </form>
</div>
